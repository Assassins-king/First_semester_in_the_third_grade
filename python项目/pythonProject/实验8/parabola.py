# -*- coding: utf-8 -*-
# @Time    : 2022/12/7 16:46
# @Author  : 崔文帅
# @File    : parabola.py


import matplotlib.pyplot as plt
import numpy as np
plt.rcParams['font.family'] = ['SimHei']
plt.rcParams['axes.unicode_minus'] = False
x = np.linspace(-10, 10, 50)
y = x ** 6
plt.plot(x, y, 'ro-')
plt.title("抛物线示意图")
plt.xlabel("xtick")
plt.ylabel("voltage")
plt.show()
