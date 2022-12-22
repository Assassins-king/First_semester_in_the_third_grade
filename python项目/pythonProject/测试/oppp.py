# -*- coding: utf-8 -*-
# @Time    : 2022/12/7 15:05
# @Author  : 崔文帅
# @File    : oppp.py
# 引入必要的库
import csv

# 创建一个空字典，用于存储省份名称和新增确诊数量的对应关系
province_confirmed_dict = {}

# 创建一个空字典，用于存储省份名称和新增无症状数量的对应关系
province_symptomless_dict = {}

# 累计确诊的总数
total_confirmed = 0

# 打开yq.csv文件，设置读取模式
with open('yq.csv', 'r') as csvfile:
    # 创建csv读取器
    reader = csv.reader(csvfile)

    # 跳过标题行
    next(reader)

    # 循环遍历读取器
    for row in reader:
        # 获取省份名称、新增确诊数量和新增无症状数量
        province, confirmed, symptomless = row[0], row[1], row[2]

        # 将新增确诊数量转换为整数
        confirmed = int(confirmed)

        # 将新增无症状数量转换为整数
        symptomless = int(symptomless)

        # 统计省份名称和新增确诊数量的对应关系
        if province in province_confirmed_dict:
            province_confirmed_dict[province] += confirmed
        else:
            province_confirmed_dict[province] = confirmed

        # 统计省份名称和新增无症状数量的对应关系
        if province in province_symptomless_dict:
            province_sym
