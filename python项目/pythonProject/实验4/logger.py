# -*- coding: utf-8 -*-
# @Time    : 2022/10/26 15:23
# @Author  : 崔文帅
# @File    : logger.py

import time

def logger(fn):
     def inner(*args, **kwargs):
         # fn.__name__ # 函数名字
         f = open("log", mode="a", encoding="utf-8")
         f.write("在%s, 访问了%s函数\n" % (time.strftime("%Y-%m-%d %H:%M:%S"), fn.__name__))
         ret = fn(*args, **kwargs)
         return ret
     return inner


@logger
def logger_print1():
    print("1")
@logger
def logger_print2():
    print("2")


logger_print1()
logger_print2()

