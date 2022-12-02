class Circle:
    _radius=0
    def __init__(self,radius=0):
        self._radius=radius

    def __del__(self):
        print('该数据已经被清空')

    def __str__(self):
        return '该圆面积为' + str(3.14 * self._radius ** 2)

    def __gt__(self, other):
        return self._radius > other._radius

    def SetRadius(self,r):
        self._radius=r
        print('该圆的半径为：%d'%r)

    def Area(self):
        return self._radius**2*3.14

if __name__=='__main__':
    c1=Circle()
    c2=Circle()
    c1.SetRadius(5)
    c2.SetRadius(3)
    print(c1)
    print(c2)
    print(c1>c2)
    del c1
    del c2

