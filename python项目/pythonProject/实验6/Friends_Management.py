# -*- coding: utf-8 -*-
# @Time    : 2022/11/23 14:42
# @Author  : 崔文帅
# @File    : Friends_Management.py


MyFriends = []
print("好友管理系统")
print("1.添加好友")
print("2.删除好友")
print("3.备注好友")
print("4.展示好友")
print("5.退出")

while True:
    selector = int(input("请输入您的选项:"))
    if selector == 1:
        f = input("请输入要添加的好友：")
        MyFriends.append(f)
        print("好友添加成功")
    elif selector == 2:
        f = input("请输入删除好友姓名：")
        MyFriends.remove(f)
        print("删除成功")
    elif selector == 3:
        OddName = input("请输入要修改的好友姓名：")
        NewName = input("请输入修改后的好友姓名：")
        i = MyFriends.index(OddName)
        MyFriends[i] = NewName
        print("备注成功")
    elif selector == 4:
        if len(MyFriends) == 0:
            print("好友列表为空")
        else:
            for i in MyFriends:
                print(i)
    elif selector == 5:
        break
print("关闭好友系统")
