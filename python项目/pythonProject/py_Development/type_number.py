# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 16:27
# @Author  : 崔文帅
# @File    : type_number.py
import math
number = input("输入一个不超过五位的数字：")
a = 1

list1 = ['零','壹','贰','叁','肆','伍','陆','柒','捌','玖']
list2 = ['圆','拾','佰','仟','萬']
list3 = []

for i in range(0,len(number)):
    list3.append(int((int(number)/math.pow(10,i))%10))
    result = ''

for x in range(len(number)-1,-1,-1):
    result+=(list1[list3[x]]+list2[x])

print("转换结果为："+result+"整")