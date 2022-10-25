# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 18:38
# @Author  : 崔文帅
# @File    : return_filite.py


list=[1,2,'a',False,None,'']
list=eval(input('输入包含若干任意数据的列表:'))
print('列表中等价于True的元素组成的列表为:',list(filter(None,list)))
list1=eval(input('输入包含若干整数的列表:'))
print('输出列表中偶数组成的列表为:',list(filter(lambda x:x%2==0,list1)))
