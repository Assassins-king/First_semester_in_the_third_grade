# -*- coding: utf-8 -*-
# @Time    : 2022/12/3 22:35
# @Author  : 崔文帅
# @File    : read_csv.py

import csv



with open('user.csv', 'r', encoding='utf8') as f:
    read_dict = csv.DictReader(f)
    header = read_dict.fieldnames
    csv_list = []
    for row in read_dict:
        csv_list.append(list(row.values()))
for i in range(0,len(csv_list)):
    print(csv_list[i])
with open('usercopy.csv', 'w', encoding='utf8') as file:
    write = csv.writer(file)
    write.writerows(csv_list)

import csv

# 打开yq.csv文件，设置写入模式
with open('yq.csv', 'w', newline='') as csvfile:
    # 创建csv写入器
    writer = csv.writer(csvfile)

    # 循环遍历数据列表
    for data in data_list:
        # 使用writerow()函数将数据写入到yq.csv文件中
        writer.writerow(data)

import csv

# 创建一个空列表，用于存储读取的数据
data_list = []

# 打开yq.csv文件，设置读取模式
with open('yq.csv', 'r') as csvfile:
    # 创建csv读取器
    reader = csv.reader(csvfile)

    # 循环遍历读取器
    for row in reader:
        # 将读取到的每一行数据添加到列表中
        data_list.append(row)

