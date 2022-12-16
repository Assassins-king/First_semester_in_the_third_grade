#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <signal.h>
#include <sys/time.h>

#define CHILD_NUM 6 // 子进程个数
#define TIME_SLICE 5 // 时间片长度（秒）

struct PCB
{
    pid_t pid; // 进程ID
    int state; // 状态，1表示正在运行，0表示暂停，-1表示结束
    unsigned long runned_time; // 已运行时间
    unsigned long need_running_time; // 剩余运行时间
};

// PCB集合
struct PCB pcb[CHILD_NUM];

// 定时器
struct itimerval timer;
// 定义当前运行的子进程编号
int i = 0;

// 分派函数
void Dispatch()
{
    // 暂停当前正在运行的子进程
    kill(pcb[i].pid, SIGSTOP);

    // 更新该子进程的运行时间和剩余时间
    pcb[i].runned_time += TIME_SLICE;
    pcb[i].need_running_time -= TIME_SLICE;

    if (pcb[i].need_running_time <= 0)
    {
        // 如果该子进程的剩余时间小于等于0，说明该子进程已经执行完毕
        // 更新PCB状态为-1并结束该子进程
        pcb[i].state = -1;
        kill(pcb[i].pid, SIGKILL);
    }

    // 重新选择下一个子进程
    int next_child = (i + 1) % CHILD_NUM;
    while (pcb[next_child].state == -1)
    {
        // 如果该子进程已经结束，就选择下一个子进程
        next_child = (next_child + 1) % CHILD_NUM;
}
// 更新下一个子进程的PCB状态为1，输出该子进程的运行时间和剩余时间，并使该子进程恢复运行
pcb[next_child].state = 1;
printf("子进程 %d 正在运行, 运行时间 = %ld, 剩余运行时间 = %ld\n", pcb[next_child].pid, pcb[next_child].runned_time, pcb[next_child].need_running_time);
kill(pcb[next_child].pid, SIGCONT);

// 更新i为下一个子进程的下标
i = next_child;
}

// 信号处理函数
void SignalHandler(int signo)
{
// 如果收到的信号为SIGALRM，说明时间片到，需要重新选派子进程
if (signo == SIGALRM)
{
Dispatch();
}
}

int main()
{
int i;
// 创建子进程
for (i = 0; i < CHILD_NUM; i++)
{
    pcb[i].pid = fork();
    if (pcb[i].pid == 0)
    {
        // 子进程
        while (1)
        {
            pause(); // 子进程一直处于暂停状态，直到被Dispatch函数选中并调用SIGCONT信号
        }
    }
}

// 对每个子进程的PCB进行初始化
for (i = 0; i < CHILD_NUM; i++)
{
    pcb[i].state = 0; // 初始化状态为0（暂停）
    pcb[i].runned_time = 0; // 初始化已运行时间为0
    pcb[i].need_running_time = rand() % 100 + 1; // 初始化剩余运行时间为1~100之间的随机数
}

// 为每个子进程设置信号处理函数
for (i = 0; i < CHILD_NUM; i++)
{
signal(SIGALRM, SignalHandler);
}

// 设置定时器，时间片到达时触发SIGALRM信号
timer.it_value.tv_sec = TIME_SLICE;
timer.it_value.tv_usec = 0;
timer.it_interval.tv_sec = TIME_SLICE;
timer.it_interval.tv_usec = 0;
setitimer(ITIMER_REAL, &timer, NULL);

// 选择第一个子进程开始运行
i = 0;
pcb[i].state = 1;
printf("子进程 %d 正在运行, 运行时间 = %ld, 剩余运行时间 = %ld\n", pcb[i].pid, pcb[i].runned_time, pcb[i].need_running_time);
kill(pcb[i].pid, SIGCONT);

while (1)
{
    // 父进程一直循环检查是否所有的子进程都已经执行完毕
    int finished = 1;
    for (i = 0; i < CHILD_NUM; i++)
    {
        if (pcb[i].state != -1)
        {
            // 如果有任何一个子进程的状态不为-1，说明还有子进程没有执行完毕
            finished = 0;
            break;
        }
    }

    if (finished)
    {
        // 如果所有的子进程都已经执行完毕，就结束父进程
        break;
    }
}

return 0;
}


