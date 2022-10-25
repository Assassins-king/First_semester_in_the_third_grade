# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 17:22
# @Author  : 崔文帅
# @File    : func.py
# coding:utf-8

import math


def func(a, b, c):
    d = b ** 2 - 4 * a * c
    if d >= 0:
        num = math.sqrt(d)
        x1 = (-b + num) / (2 * a)
        x2 = (-b - num) / (2 * a)
        return x1, x2
    else:
        return None


print(func(1,4,3))
