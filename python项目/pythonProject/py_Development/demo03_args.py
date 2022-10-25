
############
#实参
# 1.位置参数
# 2.关键字参数
# 3.混合参数：   位置 > 关键字
#     *   打散    把列表、字符串、元祖打散成位置参数
#     **  打散，   把字典打散成关键字参数

def cuboid_volume(a, b, c):
    v = a * b * c
    print('长为%.2f,宽为%.2f，高为%.2f的长方形面积为%.2f' % (a, b, c, v))

# 1. 位置参数

cuboid_volume(3, 4, 5)

# 2.关键字参数
cuboid_volume(b=10, a=20, c=30)

# 3.混合参数     先 位置   再  关键字
cuboid_volume(10, c = 30, b = 20)
# cuboid_volume(c = 30, b = 20, 10)
# cuboid_volume(c = 30, 10,  b = 20)

############
#形参
#def 函数名(形参):

#1. 位置参数
def rect_area(a, b):
    s = a * b
    print('边长为%.2f和%.2f的长方形面积为%.2f' %(a,b,s))

#2. 默认值参数
def student_info(name, age, country='中国'):
    print('姓名：%s，age：%d，国籍：%s' %(name, age, country))

student_info('张三', 20)
student_info('Alex', 20, '美国')

#思考：如果默认值参数和位置参数同时存在，参数的顺序有没有要求呢？


#课堂作业：请分别使用实参中的位置参数、关键字参数、混合参数三种形式调用student_info函数

#3. 动态传参
#   *   聚合   接收位置参数的动态传参
#   **   聚合，  接收关键字参数的动态传参
#形参顺序：
#   位置   *args   默认值   **kwargs









