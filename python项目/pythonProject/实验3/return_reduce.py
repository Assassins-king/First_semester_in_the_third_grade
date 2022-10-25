# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 18:28
# @Author  : 崔文帅
# @File    : return_reduce.py
from functools import reduce


list=eval(input("输入一个包含若干整数的列表："))
sum1 = reduce(lambda x, y: x * y, list)
print(sum1)