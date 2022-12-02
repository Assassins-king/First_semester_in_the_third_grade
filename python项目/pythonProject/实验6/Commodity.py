# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 15:16
# @Author  : 崔文帅
# @File    : Commodity.py

import copy

origin_prices = [568, 239, 368, 425, 121, 219, 834, 1263, 26]
print('初始的价格：', origin_prices)


def Selector(minprice, maxprice):
    select_list = []

    sum_price = 0
    for i in origin_prices:
        i = int(i)
        if minprice <= i <= maxprice:
            select_list.append(i)
            sum_price += i

    print('在区间中的商品价格：', select_list)

    select_list.sort(reverse=True)
    print('排序后的价格区间：', select_list)

    print(f'{minprice}~{maxprice} 价格区间的平均值为：', sum_price / len(select_list))


print('请输入价格区间的第一个值：')
min_prices = int(input())
print('请输入价格区间的第二个值：')
max_prices = int(input())
Selector(min_prices, max_prices)
