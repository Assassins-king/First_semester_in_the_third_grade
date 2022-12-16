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





