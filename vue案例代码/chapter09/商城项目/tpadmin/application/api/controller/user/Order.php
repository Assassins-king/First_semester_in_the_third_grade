<?php
namespace app\api\controller\user;

use app\api\controller\Common;
use app\api\validate\UserOrder as OrderValidate;
use app\api\model\UserAddress as AddressModel;
use app\api\model\GoodsGoods as GoodsModel;
use app\api\model\UserOrder as OrderModel;
use app\api\model\UserOrderGoods as OrderGoodsModel;
use think\Db;
use Exception;

class Order extends Common
{
    public function create()
    {
        $addressId = $this->request->post('address/d', 0);
        $note = $this->request->post('note/s', '');
        $arr = $this->request->post('goods/a', []);
        // 表单验证
        $validate = new OrderValidate;
        if (!$validate->check(['note' => $note])) {
            $this->error('创建订单失败：' . $validate->getError() . '。');
        }
        // 解析输入的goods数组
        $goods = [];
        foreach ($arr as $v) {
            $id = isset($v['id']) ? max($v['id'], 0) : 0;
            $count = isset($v['count']) ? max($v['count'], 0) : 0;
            if ($id > 0 && $count > 0) {
                $goods[$id] = ['count' => $count];
            } else {
                $this->error('创建订单失败：提交数据有误');
            }
        }
        Db::startTrans();
        try {
            // 获取收货地址
            $address = AddressModel::where('user_user_id', $this->user['id'])->get($addressId);
            if (!$address) {
                $error = '创建订单失败：收货地址不存在';
                throw new Exception();
            }
            // 取出订单里的商品
            $ids = array_keys($goods);
            $data = GoodsModel::field('id,price,num')->whereIn('id', $ids)->where('status', 1)->select();
            // 判断库存是否全部充足，并计算总价格
            $price = 0;
            $orderGoods = [];
            foreach ($data as $v) {
                $v['count'] = $goods[$v['id']]['count'];
                if (!GoodsModel::where('id', $v['id'])->where('num', '>=', $v['count'])->setDec('num', $v['count'])) {
                    $error = '创建订单失败：部分商品库存不足';
                    throw new Exception();
                }
                $price += $v['count'] * $v['price'];
                $orderGoods[] = [
                    'goods_goods_id' => $v['id'],
                    'count' => $v['count'],
                    'price' => $v['price']
                ];
            }
            // 创建订单
            $order = OrderModel::create([
                'user_user_id' => $this->user['id'],
                'address_name' => $address['name'],
                'address_tel' => $address['tel'],
                'address_area' => $address['area'],
                'address_detail' => $address['detail'],
                'note' => $note,
                'price' => $price
            ]);
            // 保存订单里的商品
            foreach ($orderGoods as $k => $v) {
                $orderGoods[$k]['user_order_id'] = $order->id;
            }
            OrderGoodsModel::insertAll($orderGoods);
            Db::commit();
        } catch (Exception $e) {
            Db::rollback();
            if (isset($error) && $error !== '') {
                $this->error($error);
            } else {
                $this->error('创建订单失败：未知错误');
            }
        }
        $this->success('订单创建成功');
    }

    public function index()
    {
        $data = OrderModel::with(['userOrderGoods' => ['goodsGoods' => function ($query) {
            $query->field('id,image');
        }]])->where('user_user_id', $this->user['id'])->order('id', 'desc')->select()->toArray();
        $data = array_map(function ($v) {
            $v['user_order_goods'] = array_map(function ($v) {
                $v['goods_goods']['image'] = $this->imgUrl($v['goods_goods']['image']);
                return $v;
            }, $v['user_order_goods']);
            return $v;
        }, $data);
        $this->success('', null, $data);
    }

    public function show()
    {
        $id = $this->request->get('id/d', 0);
        $data = OrderModel::with(['userOrderGoods' => ['goodsGoods' => function ($query) {
            $query->field('id,name,image');
        }]])->where('user_user_id', $this->user['id'])->order('id', 'desc')->find()->toArray();
        $data['user_order_goods'] = array_map(function ($v) {
            $v['goods_goods']['image'] = $this->imgUrl($v['goods_goods']['image']);
            return $v;
        }, $data['user_order_goods']);
        $this->success('', null, $data);
    }

    public function cancel()
    {
        $id = $this->request->post('id/d', 0);
        Db::startTrans();
        try {
            if (!$order = OrderModel::with('userOrderGoods')->where('user_user_id', $this->user['id'])->get($id)) {
                $error = '取消订单失败：商订单不存在';
                throw new Exception();
            }
            foreach ($order['user_order_goods'] as $v) {
                if (!GoodsModel::where('id', $v['goods_goods_id'])->setInc('num', $v['count'])) {
                    $error = '取消订单失败：商品库存异常';
                    throw new Exception();
                }
            }
            $order->is_cancel = 1;
            $order->save();
            Db::commit();
        } catch (Exception $e) {
            Db::rollback();
            if (isset($error) && $error !== '') {
                $this->error($error);
            } else {
                $this->error('取消订单失败：未知错误');
            }
        }
        $this->success('取消成功');
    }
}
