# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 15:42
# @Author  : 崔文帅
# @File    : market.py

sum1=0
n=int(input("请输入商品数量："))
for i in range(1,n+1):
    thing=float(input("扫描的第"+str(i)+"件商品的价格："))
    sum1+=thing
print("商品总价是（小数点抹零）："+str(int(sum1)))