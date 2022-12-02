# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 16:06
# @Author  : 崔文帅
# @File    : Delete_Odd.py
import random

num_list = random.sample(range(10, 101), 50)
print('随机生成的列表为：\n', num_list)

for i in num_list[::-1]:
    if i % 2 != 0:
        num_list.remove(i)

print('删除后：\n', num_list)