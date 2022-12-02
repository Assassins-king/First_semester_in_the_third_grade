class Student:
    def __init__(self,name,year):
        self.name=name
        self.year=year
        self.grades=list()
    def add_grade(self,grade):
        # 判断类型是否为Grade
        if type(grade) == Grade:
            self.grades.append(grade.score)
        else:
            print('error')
    def get_average(self):
        average=0
        n=len(self.grades)
        for i in self.grades:
            average+=i/n
        print(f'平均成绩为：{average}')
class Grade:
    passing=60
    def __init__(self,score):
        self.score=score
    def is_passing(self):
        if self.score >= Grade.passing:
            return '及格'
        else:
            return '不及格'

if __name__ =='__main__':
    stu=Student('Jerry','5年级')


    g1=Grade(100)
    g2=Grade(90)
    g3=Grade(85)
    g4=Grade(88)
    g5=Grade(70)


    stu.add_grade(g1)
    stu.add_grade(g2)
    stu.add_grade(g3)
    stu.add_grade(g4)
    stu.add_grade(g5)


    str1=g1.is_passing()
    str2=g2.is_passing()
    str3=g3.is_passing()
    str4=g4.is_passing()
    str5=g5.is_passing()
    print(f'{stu.year}的{stu.name}的成绩及格情况为：\n'+str1,str2,str3,str4,str5)
    stu.get_average()
