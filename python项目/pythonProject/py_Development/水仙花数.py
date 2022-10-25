# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 19:09
# @Author  : 崔文帅
# @File    : 水仙花数.py

for i in range(100,200):
    num1,num2,num3=i%10,i//10%10,i//100
    if num1**3+num2**3+num3**3==i:
        print(i,end=" ")

