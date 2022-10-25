# 3. 动态传参


def eat(zhushi, cai, tang, tiandian):
    print(zhushi, cai, tang, tiandian)


eat('米饭', '红烧肉', '番茄紫菜汤', '甜筒')
# eat('米饭', '红烧肉', '番茄紫菜汤')
eat('米饭', '红烧肉', '番茄紫菜汤', '')
eat('米饭', '红烧肉', '', '')


def eat2(*args):  # *  在形参中表示不定长参数，接收的是位置参数   注意：参数名是args，不是*args
    print(args)


eat2('米饭', '红烧肉', '番茄紫菜汤', '甜筒')
eat2('米饭', '红烧肉', '番茄紫菜汤')
eat2('米饭', '红烧肉')
eat2('米饭')

# * 在形参这里把传递来的实参进行了聚合，形成了元组

print("--------------------")


def student_info(name, telphone, *args):
    print('姓名：%s，手机：%d，其他：%s' % (name, telphone, args))

student_info('张三', 13012345678, 20, '男', '计算机')


# 思考：形参的顺序有没有要求呢？
# def student_info2(name, *args, telphone ):
#     print('姓名：%s，手机：%d，其他：%s' %(name, telphone, args))
#
# student_info2('张三', 13012345678, 20, '男', '计算机')

def student_info3(name, telphone, *args, country = '中国'):
    print('姓名：%s，手机：%d，国籍：%s，其他：%s' % (name, telphone, country,args))

student_info3('张三', 13012345678,  20,  '男', '计算机', country = '美国')
# #
# ######
#  ** 在形参中表示不定长参数，接收的是关键字参数
#  ** 在形参中，表示聚合，聚合成字典
def func1(**kwargs):  # 形参的变量名是什么？
    print(kwargs)

# func1(1, 3, 5, 7)
func1(a=1, b=3, c=5, d=7)


# ###总结
# #   *   聚合   接收位置参数的动态传参
# #   **   聚合，  接收关键字参数的动态传参
#
# # 思考：形参中如果同时存在 位置参数、默认值参数、*args、 **kwargs，顺序是什么样的？
#
# # 参数列表顺序：
# #   位置   *args   默认值   **kwargs
#
def student_info3(name, telphone,  *args, country='中国', **kwargs):
    print('姓名：%s，手机：%d，国籍：%s，其他：%s, kw:%s' % (name, telphone, country, args, kwargs))

student_info3('张三', 13012345678, 20, '男', '计算机', count='美国', one=1, two=2)


# ############python中常见的无敌函数
def func(*args, **kwargs):  # 参数没有限制，随便传参
    print(args)
    print(kwargs)

func()
func(1)
func(1, 3, a='one', b='two')

# #############################################################################

# * ** 除了出现在形参中，还可以出现在实参中
# *   打散    把列表、字符串、元组打散成位置参数
lst = ['米饭', '红烧肉', '番茄紫菜汤', '甜筒']
t = ('米饭', '红烧肉', '番茄紫菜汤')
str = '番茄紫菜汤'
eat2(*lst)  # *lst ===  '米饭', '红烧肉', '番茄紫菜汤', '甜筒'
# eat2('米饭', '红烧肉', '番茄紫菜汤', '甜筒')
eat2(*t)
# eat2('米饭', '红烧肉', '番茄紫菜汤')
eat2(*str)

#   **  打散，   把字典打散成关键字参数

def student_info4(name, telphone, coutry):
    print('姓名：%s，手机：%d，国籍：%s' % (name, telphone, coutry))

d = {'name':'Alex', 'telphone':13112345678, 'coutry':'美国'}
student_info4(**d)
# student_info4(name='Alex', telphone=13112345678, coutry='美国')

def func2(**kwargs):
    print(kwargs)  #kwargs  字典  {'name':'Alex', 'telphone':13112345678, 'coutry':'美国'}

func2(**d)
func2(name='Alex', telphone=13112345678, coutry='美国')




###总结：
# 形参：
#     1.位置参数
#     2.默认值参数
#     3.动态传参
#       *   聚合   接收位置参数的动态传参   聚合为元祖
#       **   聚合，  接收关键字参数的动态传参  聚合为字典
#形参顺序：
#   位置   *args   默认值   **kwargs

#实参：
# 1.位置参数
# 2.关键字参数
# 3.动态传参：
#     *   打散    把列表、字符串、元组打散成位置参数
#     **  打散，   把字典打散成关键字参数
#实参顺序：
#   位置 > 关键字
