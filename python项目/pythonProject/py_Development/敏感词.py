# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 19:17
# @Author  : 崔文帅
# @File    : 敏感词.py

dirtywords=["素质"]

originalwords=str(input("输入语句，检测是否含有敏感词"))

print(originalwords)
for i in range(len(dirtywords)):
    if dirtywords[i] in originalwords:
        originalwords=originalwords.replace(dirtywords[i],len(dirtywords[i])*'*')
    print(originalwords)
