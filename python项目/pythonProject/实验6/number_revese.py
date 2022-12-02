# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 14:54
# @Author  : 崔文帅
# @File    : number_revese.py

characters = ['零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖']
result = ''
number = input('输入一个数字：')
for i in range(len(number)):
    num = int(number[i])
    result += characters[num]

print('转换结果为：', result)
