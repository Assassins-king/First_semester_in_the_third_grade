# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 19:03
# @Author  : 崔文帅
# @File    : salary.py

n=int(input("请输入销售额："))
if n<=3000 :
    print("总工资是：%d"%2000)
elif 3000<n<=7000:
    print("总工资是：%d" % (n*0.1 + 2000))
elif 7000<n<10000:
    print("总工资是：%d" % (n*0.15 + 2000))
elif n>10000:
    print("总工资是：%d" % (n*0.2 + 2000))