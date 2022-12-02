<?php
namespace app\api\controller\goods;

use app\api\controller\Common;

class Photo extends Common
{
    protected $checkLoginExclude = ['getimgcategory', 'getimages', 'getimageinfo', 'getthumimages'];

    public function getimgcategory()
    {
        $data = '{"status":0,"message":[{"title":"空间设计","id":17},{"title":"摄影设计","id":15},{"title":"明星美女","id":16},{"title":"家居生活","id":14},{"title":"户型装饰","id":18},{"title":"广告摄影","id":19},{"title":"摄影学习","id":20},{"title":"摄影器材","id":21},{"title":"明星写真","id":22},{"title":"清纯甜美","id":23},{"title":"古典美女","id":24}]}';
        $data = json_decode($data, true);
        return json($data);
    }

    public function getimages()
    {
        $id = $this->request->get('id/d', 0);
        $url = $this->request->domain() . '/static/api/goods/photo/';
        $data = [
            0 => '{"status":0,"message":[]}',
            17 => '{"status":0,"message":[{"id":37,"title":"现代简约 明亮的外表卧室卧室背景墙、吊顶黄色","img_url":"thumb_201504181230434303.jpg","zhaiyao":"不要简朴不要素雅洋气卧室我做主，高低床榻榻米式靓丽卧室装扮，现代油画壁画帆布画卧室餐厅仟象映画，现代中式卧室装修图欣赏，温馨浪漫，而且很时尚的卧室设计，欧式卧室飘窗装修效果图。"},{"id":38,"title":"很美的落地大书柜 可以放超多的图书的吧","img_url":"thumb_201504181237019134.jpg","zhaiyao":"很美的落地大书柜 可以放超多的图书的吧，转角的书柜以及书桌，这里可以收纳超多的东西，书柜,书桌这些是&quot;七彩人生&quot;品，双层书柜组合书柜儿童书柜。"},{"id":39,"title":"西班牙阿拉尔孔郊区的80平米一室一厅的公寓","img_url":"thumb_201504181241259978.jpg","zhaiyao":"这是一套在西班牙阿拉尔孔郊区的80平米一室一厅的公寓，用一道墙分隔出了客厅与厨房，虽然整体来看室内设计有些混搭风，但似乎某些空间和角度去看又会有着自己的主题。"}]}'
        ];
        if ($id == 0) {
            $id = 17;
        }
        $data = isset($data[$id]) ? $data[$id] : $data[0];
        $data = json_decode($data, true);
        $data['message'] = array_map(function ($v) use ($url) {
            $v['img_url'] = $url . $v['img_url'];
            return $v;
        }, $data['message']);
        return json($data);
    }

    public function getimageInfo()
    {
        $id = $this->request->get('id/d', 0);
        $data = [
            37 => '{"status":0,"message":[{"id":37,"title":"现代简约 明亮的外表卧室卧室背景墙、吊顶黄色","click":0,"add_time":"2015-04-18 04:30:50","content":"不要简朴不要素雅洋气卧室我做主，高低床榻榻米式靓丽卧室装扮，现代油画壁画帆布画卧室餐厅仟象映画，现代中式卧室装修图欣赏，温馨浪漫，而且很时尚的卧室设计<span id=\"__kindeditor_bookmark_start_8__\">，欧式卧室飘窗装修效果图。</span>"}]}'
        ];
        $data = isset($data[$id]) ? $data[$id] : null;
        if (!$data) {
            $this->error('查询失败');
        }
        return json(json_decode($data, true));
    }

    public function getthumimages()
    {
        $id = $this->request->get('id/d', 0);
        $url = $this->request->domain() . '/static/api/goods/photo/';
        $data = [
            37 => '{"status":0,"message":[{"src":"thumb_201504181230434303.jpg"},{"src":"thumb_201504181230437111.jpg"},{"src":"thumb_201504181230439139.jpg"},{"src":"thumb_201504181230440387.jpg"},{"src":"thumb_201504181230444755.jpg"}]}'
        ];
        $data = isset($data[$id]) ? $data[$id] : null;
        if (!$data) {
            $this->error('查询失败。');
        }
        $data = json_decode($data, true);
        $data['message'] = array_map(function ($v) use ($url) {
            $v['src'] = $url . $v['src'];
            return $v;
        }, $data['message']);
        return json($data);
    }
}
