# -*- coding: utf-8 -*-
# @Time    : 2022/10/26 15:36
# @Author  : 崔文帅
# @File    : deco1.py

FLAG=False
def login(func):
    def inner(*args, **kwargs):
        global FLAG
        if FLAG:
            res = func(*args, **kwargs)
            return res
        count = 3
        while count >0:
            username = input("请输入你的用户名:")
            password = input("请输入你的密码:")

            if username == "cuiwenshuai" and password == "2025060163":
                FLAG = True
                res = func(*args, **kwargs)
                return res
            else:
                print("登录失败!")
                count -= 1
    return inner


@login
def func():
    print('2')
def func1():
    print("1")

func()
func1()
