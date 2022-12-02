# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 15:42
# @Author  : 崔文帅
# @File    : verification.py

import random


# randint 包含左右索引，生成一个随机整数;range包含左索引，不包含右索引，生成一个列表。
def Verification():
    code = ''
    for i in range(0, 6):
        num = str(random.randint(0, 9))
        str1 = chr(random.randint(65, 90))
        str2 = chr(random.randint(97, 122))
        ver_list = [num, str1, str2]
        code = code + ver_list[random.randint(0, 2)]
    print("随机生成的验证码为：", code)


Verification()
