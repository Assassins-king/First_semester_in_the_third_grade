# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 18:14
# @Author  : 崔文帅
# @File    : reverse_string.py


list1=eval(input("输入第一组向量列表:"))
list2=eval(input("输入第二组向量列表:"))
print("内积为:",sum(map(lambda x,y:x*y,list1,list2)))

