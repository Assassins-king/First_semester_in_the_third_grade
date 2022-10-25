# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 16:00
# @Author  : 崔文帅
# @File    : return_sum.py
n = eval(input("请输入接收的数字数 n:"))
list1 = []
for i in range(n):
    list1.append(eval(input("请输入数字:")))


def sum1(ls):
    res = sum(ls)
    return res


print(sum1(list1))
