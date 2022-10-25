# -*- coding: utf-8 -*-
# @Time    : 2022/10/23 20:49
# @Author  : 崔文帅
# @File    : return_filter.py
def return_true(n):
   if n:
       return n

newlist=list(filter(return_true,[0,-1,1,2,3,4,5]))
print(newlist)