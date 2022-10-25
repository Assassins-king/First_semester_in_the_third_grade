#函数嵌套

def out():
    def inner():
        print('inner')
    print('outer')
    inner()

out()
# inner()  #在全局不能找到局部内容

#嵌套练习

# def func1():
#     print('1')
#     def func2():
#         print('2')
#         def func3():
#             print('3')
#         print('4')
#         func3()
#         print('5')
#     print('6')
#     func2()
#     print('7')
#
# func1()

print("-----------------------------------")

#全局变量一般不能随意修改
# x = 10
# def func():
#     # x = 100
#     global x   #global表示把全局变量引入到局部，声明在该函数中使用的是全局变量， but 慎用
#     x += 100
#     print("局部x=",x)
#
# func()
# print("全局x=",x)
#
# print("-----------------------------------")


# test全局变量练习
# x = 10
# def func():
#     def inner():
#         global x
#         x += 100
#         print("局部x=",x)
#     inner()
#
# func()
# print("全局x=",x)

print("-----------------------------------")

#nonlocal  在局部，寻找离他最近的外层的变量
# x = 100
# def outer():
#     x = 10
#     def inner():
#         nonlocal x
#         x = 20
#         print("inner中的x=", x)
#     inner()
#     print("outer中的x=", x)
#
# outer()
# print(x)
#
# print("-----------------------------------")
#
#
# #test局部变量练习
# def func0():
#     a = 10
#     def func1():
#         a = 100
#         def func2():
#             nonlocal a   #如果换成global
#             a = 1000
#             print("func2中的a=", a)
#         func2()
#         print("func1中的a=", a)
#
#     func1()
#     print(a)
#
# func0()

print('=============================')
#
# # 局部全局变量练习
a = 1
def func1():
    a = 2
    def func2():
        nonlocal a
        a = 3
        def func3():
            a = 4
            print(a)    #  4
        print(a)      #  3
        func3()
        print(a)    #  3

    print(a)   # 2
    func2()
    print(a)   #  3

print(a)   #  1
func1()
print(a)   #   1



###总结
#global   在局部引入全局作用域中的内容
#nonlocal  在局部，在内层函数中引入离他最近的那一层的变量