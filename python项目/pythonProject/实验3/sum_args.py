# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 16:30
# @Author  : 崔文帅
# @File    : sum_args.py


def sum_args(a,*args):
    for item in args:
        if isinstance(item,int):
            a += item
            return a



print(sum_args(1,35,3.14))