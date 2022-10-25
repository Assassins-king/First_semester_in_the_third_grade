# -*- coding: utf-8 -*-
# @Time    : 2022/9/7 18:12
# @Author  : 崔文帅
# @File    : prime_palindrome.py

from math import *

def prime(n):
    for j in range(2, int(sqrt(n)) + 1):
        if n % j == 0:
            return 0
        else:
            return 1
def parlindrome(n):
    n1 = n[::-1]
    if n1 == n:
        return 1
    else:
        return 0


for n in range(2,1001):
    if (prime(n) and parlindrome(str(n))):
        print(n, end=' ')

