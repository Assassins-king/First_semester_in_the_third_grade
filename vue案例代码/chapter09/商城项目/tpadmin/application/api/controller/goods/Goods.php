<?php
namespace app\api\controller\goods;

use app\api\model\GoodsGoods as GoodsModel;
use app\api\controller\Common;

class Goods extends Common
{
    protected $checkLoginExclude = ['index', 'show', 'shopcart'];

    public function index()
    {
        $last_id = $this->request->get('last_id/d', 0);
        $category_id = $this->request->get('category_id/d', 0);
        $goods = GoodsModel::where('status', 1)->order('id', 'desc')->limit(10);
        if ($last_id > 0) {
            $goods->where('id', '<', $last_id);
        }
        if ($category_id > 0) {
            $goods->where('goods_category_id', $category_id);
        }
        $data = $goods->where('status', 1)->select()->toArray();
        $data = array_map(function ($v) {
            $v['image'] = $this->imgUrl($v['image']);
            return $v;
        }, $data);
        $this->success('', null, $data);
    }

    public function show()
    {
        $id = $this->request->get('id/d', 0);
        $domain = $this->request->domain();
        $goods = GoodsModel::get($id)->toArray();
        if (!$goods) {
            $this->error('商品不存在');
        }
        if ($goods['status'] === 0) {
            $this->error('商品已下架');
        }
        $album = $goods['album'];
        $goods['album'] = [];
        if ($album) {
            foreach (explode('|', $album) as $k => $v) {
                $goods['album'][] = [
                    'id' => $k,
                    'img' => $this->imgUrl($v)
                ];
            }
        }
        $pattern = '/<img src="(\\/static\\/.*?)"\\/>/';
        $replacement = '<img src="' . $domain . '\\1">';
        $goods['content'] = preg_replace($pattern, $replacement, $goods['content']);
        $this->success('', null, $goods);
    }

    public function shopcart()
    {
        $ids = $this->request->get('ids/a', [], 'intval');
        $goods = GoodsModel::where('id', 'in', $ids)->where('status', 1)->order('id', 'desc');
        $data = $goods->select()->toArray();
        $data = array_map(function ($v) {
            $v['image'] = $this->imgUrl($v['image']);
            return $v;
        }, $data);
        $this->success('', null, $data);
    }
}
