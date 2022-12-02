<?php
namespace app\admin\controller\goods;

use app\admin\model\GoodsGoods as GoodsModel;
use app\admin\controller\Common;

class Recycle extends Common
{
    public function index()
    {
        $goods = GoodsModel::onlyTrashed()->with('goodsCategory')->field('content,album', true)->order('id', 'desc');
        $params = [];
        $goods = $goods->paginate(15, false, ['type' => 'bootstrap', 'var_page' => 'page', 'query' => $params]);
        $this->assign('goods', $goods);
        return $this->fetch();
    }

    public function restore()
    {
        $id = $this->request->param('id/d', 0);
        if (!$goods = GoodsModel::onlyTrashed()->find($id)) {
            $this->error('记录不存在。');
        }
        $goods->restore();
        $this->success('恢复成功。');
    }

    public function delete()
    {
        $id = $this->request->param('id/d', 0);
        if (!$goods = GoodsModel::onlyTrashed()->get($id)) {
            $this->error('删除失败，记录不存在。');
        }
        $goods->delete(true);
        $this->success('删除成功。');
    }
}
