# -*- coding: utf-8 -*-
# @Time    : 2022/8/31 16:08
# @Author  : 崔文帅
# @File    : 乘法表.py


for i in range(1,10):
    for j in range(1,i+1):
        print('{}x{}={}\t'.format(j, i, i*j), end='')
    print( )