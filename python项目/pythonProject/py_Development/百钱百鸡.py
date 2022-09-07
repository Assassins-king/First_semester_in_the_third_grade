# -*- coding: utf-8 -*-
# @Time    : 2022/8/31 16:09
# @Author  : 崔文帅
# @File    : 百钱百鸡.py


for cock in range(1,21):
    for hen in range(1,34):
        for chicken in range(1,101):
            price=5*cock+3*hen+chicken/3
            num=cock+hen+chicken
            if num==100 and price==100 :
                print("有%d只公鸡，%d只母鸡，%d只小鸡" %(cock,hen,chicken))