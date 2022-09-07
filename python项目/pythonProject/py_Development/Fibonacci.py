# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 16:16
# @Author  : 崔文帅
# @File    : Fibonacci.py

i=2
sum=0
while 1:
    num1 = eval(input("输入的第一个数字为："))
    num2 = eval(input("输入的第二个数字为："))
    if num1 < 0 or num2 < 0 :
        print("输入范围超出限制，请重新输入!")
        continue
    else:
        break
n=int(input("请输入需要的斐波那契数列的显示个数："))
ls=[0]*n
ls[0]=num1
ls[1]=num2
while i<n:
    ls[i]=ls[i-1]+ls[i-2]
    i+=1
print(ls)


