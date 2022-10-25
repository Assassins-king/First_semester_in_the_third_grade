# -*- coding: utf-8 -*-
# @Time    : 2022/10/19 15:20
# @Author  : 崔文帅
# @File    : rather_than_six.py


def rather_than_six(n):
    print("Determine whether the length of the incoming object is greater than six:")
    if len(n) > 6:
        return True
    else:
        return False


obj = input("Please enter an Object:")
print(rather_than_six(obj))
