# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 14:59
# @Author  : 崔文帅
# @File    : Student_Sort.py

StudentList = []


class Student:
    def __init__(self, sno, name, score):
        self.sno = sno
        self.name = name
        self.score = score

    def info(self):
        print(f'学号：{self.sno}, 姓名：{self.name}, 成绩：{self.score}')


s1 = Student('001', 'Lily', 100)
s2 = Student('002', 'Lacks', 95)
s3 = Student('003', 'Mike', 90)
s4 = Student('004', 'Baden', 85)
s5 = Student('005', 'Yip', 80)
s6 = Student('006', 'Chris', 75)

StudentList.append(s1)
StudentList.append(s2)
StudentList.append(s3)
StudentList.append(s4)
StudentList.append(s5)
StudentList.append(s6)

print('学生列表中学生信息为：')
for stu in StudentList:
    stu.info()
print()

print('按成绩升序排序后得到的新的学生列表:')
StudentList1 = sorted(StudentList, key=lambda stu: stu.score)
for stu in StudentList1:
    stu.info()
print()

print('成绩最好的学生信息为：')
StudentList1[len(StudentList1) - 1].info()
print('成绩最低的学生信息：')
StudentList1[0].info()
print()

StudentList.remove(StudentList1[0])
StudentList.remove(StudentList1[len(StudentList1) - 1])
print('移除成绩最高和最低的学生后学生列表中学生信息：')
for stu in StudentList:
    stu.info()
print()

StudentList2 = StudentList.copy()
print('进行拷贝后翻转输出学生信息：')
for i in range(len(StudentList2) - 1, -1, -1):
    StudentList2[i].info()
