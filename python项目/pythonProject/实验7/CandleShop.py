# -*- coding: utf-8 -*-
# @Time    : 2022/12/3 22:45
# @Author  : 崔文帅
# @File    : CandleShop.py
class CandleShop:
    name = "Here's a Hot Tip: Buy Drip Candles"

    def __init__(self, stock):
        self.stock = stock

    def buy(self, color):
        self.stock[color] = self.stock[color] - 1


class OutOfStack(Exception):
    pass


def new_buy(self, color):
    if self.stock[color] > 0:
        self.stock[color] = self.stock[color] - 1
        print("购买%s蜡烛1根" % color)
    else:
        raise OutOfStack("购买%s蜡烛的量超出库存!" % color)


try:
    candle_shop = CandleShop({'white': 88, 'red': 2, 'pink': 0})
    CandleShop.buy = new_buy
    candle_shop.buy('red')
    candle_shop.buy('pink')
except OutOfStack as e:
    print(e)
else:
    print("蜡烛还有库存！")
