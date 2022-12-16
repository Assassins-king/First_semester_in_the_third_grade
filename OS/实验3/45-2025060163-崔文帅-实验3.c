#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <semaphore.h>
#include <fcntl.h>

#define STORE_SIZE 100
#define RESOURCE_COUNT 10

// 定义信号量
sem_t *mutex;  // 互斥信号量
sem_t *full;   // 已满信号量
sem_t *empty;  // 已空信号量

// 定义仓库结构
struct store {
    char buffer[STORE_SIZE];
    int head;
    int tail;
    int count;
};

// 定义仓库
struct store *s;

// 生产者进程
void *producer(void *arg) {
    int i = 0;
    while (1) {
        // 等待仓库不满
        sem_wait(empty);
        // 等待互斥访问
        sem_wait(mutex);
        // 添加一个资源到仓库
        s->buffer[s->tail] = (char)('0' + (i % RESOURCE_COUNT));
        s->tail = (s->tail + 1) % STORE_SIZE;
        s->count++;
        // 打印仓库信息
        printf("生产者生产的资源 %c. ", s->buffer[s->tail - 1]);
        printf("仓库内资源: %d 个, %d 个空位\n", s->count, STORE_SIZE - s->count);
        // 释放互斥信号量
        sem_post(mutex);
        // 释放已满信号量
        sem_post(full);
        // 等待 1 秒
        sleep(1);
        i++;
    }
}

// 消费者进程
void *consumer(void *arg) {
    while (1) {
        // 等待仓库不空
        sem_wait(full);
        // 等待互斥访问
        sem_wait(mutex);
        // 消费一个资源
char c = s->buffer[s->head];
s->head = (s->head + 1) % STORE_SIZE;
s->count--;
// 打印仓库信息
printf("消费者消费过的数量 %c. ", c);
printf("仓库内资源: %d 个, %d 个空位\n", s->count, STORE_SIZE - s->count);
// 释放互斥信号量
sem_post(mutex);
// 释放已空信号量
sem_post(empty);
// 等待 2 秒
sleep(2);
}
}

int main() {
// 创建互斥信号量
mutex = sem_open("/my_mutex", O_CREAT, 0644, 1);
// 创建已满信号量
full = sem_open("/my_full", O_CREAT, 0644, 0);
// 创建已空信号量
empty = sem_open("/my_empty", O_CREAT, 0644, STORE_SIZE);
// 创建仓库
s = (struct store *)malloc(sizeof(struct store));
s->head = 0;
s->tail = 0;
s->count = 0;

// 创建生产者进程
pthread_t producer_thread;
pthread_create(&producer_thread, NULL, producer, NULL);

// 创建消费者进程
pthread_t consumer_thread;
pthread_create(&consumer_thread, NULL, consumer, NULL);

// 等待线程结束
pthread_join(producer_thread, NULL);
pthread_join(consumer_thread, NULL);

// 关闭信号量
sem_close(mutex);
sem_close(full);
sem_close(empty);

// 删除信号量
sem_unlink("/my_mutex");
sem_unlink("/my_full");
sem_unlink("/my_empty");

return 0;
}

