# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 17:47
# @Author  : 崔文帅
# @File    : daydayup.py

dayday_up = pow(1.001, 365)#一天进步千分之一
dayday_down = pow(0.999, 365)#一天退步千分之一

basic = 1.0
rate= 0.001
for i in range(365):
    if i % 5 in range(1,4):
        dayup = basic*(1-rate)
    else:
        dayup = basic*(1+rate)
print("一天进步千分之一："+str(dayday_up))
print("一天退步千分之一："+str(dayday_down))
print("三天打鱼两天晒网："+str(dayup))

