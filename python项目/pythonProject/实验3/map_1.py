# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 17:48
# @Author  : 崔文帅
# @File    : map_1.py
def sum_1(s):
    sum = 0
    for i in s:
       i=int(i)
       sum += i
    return sum

res=sum(map(sum_1,"123"))
print(res)
