# -*- coding: utf-8 -*-
# @Time    : 2022/12/7 17:16
# @Author  : 崔文帅
# @File    : goods.py
import csv
import matplotlib.pyplot as plt

# 打开goods.csv文件
with open('goods.csv', 'r', encoding='utf8') as csvfile:
    # 使用csv库读取文件
    goods_reader = csv.reader(csvfile)
    # 遍历每一行
    for row in goods_reader:
        # 打印每一行
        print(row)

# 打开goods.csv文件
with open('goods.csv', 'r', encoding='utf8') as csvfile:
    # 使用csv库读取文件
    goods_reader = csv.reader(csvfile)
    # 存储商品价格的列表
    prices = []
    # 遍历每一行
    for row in goods_reader:
        # 将商品价格存入列表
        prices.append(float(row[2]))
    # 按价格排序
    prices.sort(reverse=True)
    # 计算最高价格
    highest_price = max(prices)
    # 计算最低价格
    lowest_price = min(prices)
    # 计算平均价格
    average_price = sum(prices) / len(prices)
    # 格式化输出
    print(f"商品的最高价格：{highest_price:.2f}，最低价格：{lowest_price:.2f}，平均价格：{average_price:.2f}")

# 打开goods.csv文件
with open('goods.csv', 'r', encoding='utf8') as csvfile:
    # 使用csv库读取文件
    goods_reader = csv.reader(csvfile)
    plt.rcParams['font.family'] = ['SimHei']
    # 存储商品价格的列表
    prices = []
    # 遍历每一行
    for row in goods_reader:
        # 将商品价格存入列表
        prices.append(float(row[2]))
    # 绘制价格分布直方图
    plt.hist(prices, bins=20)
    plt.xlabel('价格')
    # 设置y轴的标签
    plt.ylabel('数量')
    # 设置图表标题
    plt.title('价格分布直方图')
    plt.show()
