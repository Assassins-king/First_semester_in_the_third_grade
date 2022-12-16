# -*- coding: utf-8 -*-
# @Time    : 2022/12/3 22:08
# @Author  : 崔文帅
# @File    : read_file.py

with open("StudentInfo.txt", 'r', encoding='utf8') as f:
    file_head = f.readline().strip().split(' ')
    file_list = []
    for line in f:
        line = line.strip().split(' ')
        filedict = {}
        for i in range(len(file_head)):
            filedict[file_head[i]] = line[i]
        file_list.append(filedict)
for i in range(0, len(file_list)):
    print(file_list[i])


