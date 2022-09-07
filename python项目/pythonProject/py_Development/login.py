# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 15:51
# @Author  : 崔文帅
# @File    : login.py


str1="admin"
str2="123"
n=3

for i in range(1,4):
    account = input("请输入用户名：")
    pwd = input("请输入密码：")
    if account != str1 or pwd != str2:
        print("登录失败，你还有"+str(n-1)+"次机会")
        n = n - 1
        if n == 0:
            print("登录超限，请明天再登录")
        continue
    else:
        print("登录成功，欢迎"+account)
        break

