# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 15:57
# @Author  : 崔文帅
# @File    : randon_numbers.py
import random

num_list = random.sample(range(10, 101), 20)
print('生成的20个随机数列表：')
print(num_list)
temp_list = []

for i in range(len(num_list)):
    if i % 2 == 0:
        temp_list.append(num_list[i])

for j in range(len(num_list)):
    if j % 2 == 0:
        num_list[j] = sorted(temp_list, reverse=True)[j // 2]
print('改变后的20个随机数列表：')
print(num_list)
