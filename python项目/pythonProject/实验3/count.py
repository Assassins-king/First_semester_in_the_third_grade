# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 15:42
# @Author  : 崔文帅
# @File    : count.py
def count(str):
    letter, number, space, others = 0, 0, 0, 0
    for i in str:
        if i.isalpha():
            letter += 1
        elif i.isdigit():
            number += 1
        elif i.isspace():
            space += 1
        else:
            others += 1
    print('英文字符数{},数字字符数{},空格字符数{},其他字符数{}'.format(letter, number, space, others))


str=input("请输入一个字符串：")
count(str)