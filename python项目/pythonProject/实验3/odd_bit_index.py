# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 15:16
# @Author  : 崔文帅
# @File    : odd_bit_index.py


def odd_bit_index():
    list1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    for i in range(len(list1)):
        if i % 2 == 1:
            print(list1[i])


odd_bit_index()
