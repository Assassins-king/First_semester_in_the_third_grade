# -*- coding: utf-8 -*-
# @Time    : 2022/12/7 16:33
# @Author  : 崔文帅
# @File    : ndarray.py
import numpy

ndarray = numpy.array([[1, 2, 3], [4, 5, 6], [7, 8, 9]])
print(ndarray)
slice_arr1 = ndarray[0: 2, 1:]
print(slice_arr1)
slice_arr2 = ndarray[1:2, 0:2]
print(slice_arr2)
slice_arr3 = ndarray[2:, 0:1]
print(slice_arr3)
slice_arr4 = ndarray[:, 0:1]
print(slice_arr4)

# 将数组中每个元素乘2后，按行和列的方式计算最大值，并打印输出
ndarray = ndarray * 2
# 找到行和列主要是看axio属性
# 求出列的最大值
print(numpy.max(ndarray, axis=0))
# 求处行的最大值
print(numpy.max(ndarray, axis=1))
