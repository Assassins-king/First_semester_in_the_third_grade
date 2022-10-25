#函数的返回值
# return：
# 1. 不写return      返回None
# 2. 只写return      返回None
# 3. return 值      返回一个值
# 4. return 值1， 值2， 。。。   返回多个值，并打包成一个元组返回

def func1():
    print('打印1')

def func2():
    print('打印2')
    return

def func3():
    count = 1
    print('打印3')
    return count

def func4():
    print('打印4')
    return [1, 3, 5]

def func5():
    print('打印5')
    return (1, 3, 5)

def func6():
    print('打印6')
    return 1, 3, 5


print(func1())
print(func2())
print(func3())
print(func4())
print(func5())
print(func6())