from types import MethodType,FunctionType

class Student:
    def func1(self):
        print("func1")
    def func2(self):
        print("func2")
    @classmethod
    def func3(cls):
        print("func3")
    @staticmethod
    def func4():
        print("func4")



def statistic(*args):
    method_flag=0
    func_flag=0
    Student_flag=0
    for n in args:
        if isinstance(n,MethodType):
            method_flag+=1
        elif isinstance(n,FunctionType):
             func_flag+=1
        elif type(n)==Student:
            Student_flag+=1
        else:
            print("没有")
    print("方法个数，%d，函数个数，%d，对象个数，%d" %(method_flag,func_flag,Student_flag))
i=Student()
j=Student()
statistic(i,j,i,j,i,j,i.func4,j.func3,i.func1)





