#编写递归函数计算n的阶乘。

# def fac(n):
#     if n == 1:
#         return 1
#     return n * fac(n-1)
#
# print(fac(5))


# #高阶函数是指把函数作为参数的一种函数。
#
# def fun_add(f, x, y):
#     return f(x) + f(y)
#
# def square(x):
#     return x ** 2
#
# def cube(x):
#     return x ** 3
#
# def func3():
#     print('我是func3')
#
# print(square)
# print(cube)
# fx = cube  #函数名可以进行赋值
# print(fx)
# print(fx(3))


#
# #函数可以作为参数进行传递
# print(fun_add(square, 3, -5))
# print(fun_add(cube, 3, -5))


################
#匿名函数lambda

def func(a, b):
    return a + b

ret = func(3, 4)
print(ret)

fn = lambda a, b : a + b  #定义一个简单的函数，复杂的函数不用lambda

print(fn) #<function <lambda> at 0x0000011C5E747E50>
ret = fn(3, 4)
print(ret)

#课堂作业：P79 3-30


#使用场景：配合sorted, map, filter等一起使用

#1，sorted 可以对所有可迭代的对象进行排序操作。
# sorted(iterable, cmp=None, key=None, reverse=False)
# iterable -- 可迭代对象。
# cmp -- 比较的函数，这个具有两个参数，参数的值都是从可迭代对象中取出，此函数必须遵守的规则为，大于则返回1，小于则返回-1，等于则返回0。
# key -- 主要是用来进行比较的元素，只有一个参数，具体的函数的参数就是取自于可迭代对象中，指定可迭代对象中的一个元素来进行排序。
# reverse -- 排序规则，reverse = True 降序 ， reverse = False 升序（默认）。
# 按照字符串长度排序
#         4           6         2
lst = ['使用场景', 'lambda', '排序']
# lst = ('使用场景', 'lambda', '排序')
ret = sorted(lst, key=lambda el:len(el))
print(ret)
print(lst)

#2. filter() 函数用于过滤序列，过滤掉不符合条件的元素，返回一个迭代器对象.
# filter(function, iterable)
# function -- 判断函数。
# iterable -- 可迭代对象。
# 该接收两个参数，第一个为函数，第二个为序列，序列的每个元素作为参数传递给函数进行判，
# 然后返回 True 或 False，最后将返回 True 的元素放到新列表中。

lst = ['张三','李斯', '王五', '张明']
f = filter(lambda el: not el.startswith('张'), lst)
print(f)
for el in f:
    print(el)

#3. map() 会根据提供的函数对指定序列做映射。
# 第一个参数 function 以参数序列中的每一个元素调用 function 函数，返回一个迭代器，包含每次 function 函数返回值。
# map(function, iterable, ...)
# function -- 函数
# iterable -- 一个或多个序列
#       3  10  14
lst1 = [1, 4, 5]
lst2 = [2, 6, 9]
f = map(lambda x, y : x + y, lst1, lst2)
print(f)
for el in f:
    print(el)
