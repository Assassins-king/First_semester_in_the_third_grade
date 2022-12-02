# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 16:18
# @Author  : 崔文帅
# @File    : statics.py


words_list = 'who have an apple apple is free free is money you know'.split(' ')

words_count = {}


for words in words_list:
    if words in words_count:
        words_count[words] = words_count[words] + 1
    else:
        words_count[words] = 1

print('统计单词出现的次数：')
print(words_count)