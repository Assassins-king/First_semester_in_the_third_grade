# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 15:49
# @Author  : 崔文帅
# @File    : return_max.py
from math import *


def return_max(m,n):
    if m > n:
        return m

    else:
        return n

m = eval(input("请输入第一个数："))
n = eval(input("请输入第二个数："))
res = return_max(m,n)
print("比较大的数字是：{}".format(res))