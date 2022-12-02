<?php
namespace app\api\controller;

use app\api\validate\Topic as TopicValidate;
use app\api\model\Topic as TopicModel;
use app\api\model\Reply as ReplyModel;

class Topic extends Common
{
    protected $checkActive = ['save', 'del'];

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'category_id' => $this->request->post('category_id/d', 0),
            'title' => $this->request->post('title/s', ''),
            'content' => $this->request->post('content/s', '')
        ];
        $validate = new TopicValidate();
        if (!$validate->check($data)) {
            $this->error('操作失败，' . $validate->getError() . '。');
        }
        if ($id) {
            if (!$topic = TopicModel::get($id)) {
                $this->error('修改失败，记录不存在。');
            }
            if ($this->user->role !== 'admin' && $this->user->id !== $topic->user_id) {
                $this->error('修改失败，您没有权限修改此内容。');
            }
            $topic->save($data);
            $this->success('修改成功。', null, ['id' => $id]);
        } else {
            $data['is_show'] = true;
            $data['user_id'] = $this->user->id;
            $topic = TopicModel::create($data);
            $this->success('添加成功。', null, ['id' => $topic->id]);
        }
    }

    public function index()
    {
        $category_id = $this->request->get('category_id/d', 0);
        $page = max($this->request->get('page/d', 1), 1);
        $size = max(min($this->request->get('size/d', 10), 50), 1);
        $where = ['is_show' => 1];
        if ($category_id) {
            $where['category_id'] = $category_id;
        }
        $total = TopicModel::where($where)->count();
        $data = TopicModel::with(['user' => function ($query) {
            $query->field('id,name,img_url');
        }])->field('id,user_id,title,category_id,hits,likenum,update_time')
        ->where($where)->order('id', 'desc')->limit(($page - 1) * $size, $size)->select();
        $data = array_map(function ($v) {
            $v['user']['img_url'] = $this->avatarUrl($v['user']['img_url']);
            return $v;
        }, $data->toArray());
        $this->success('', null, [
            'data' => $data,
            'total' => $total,
            'page' => $page
        ]);
    }

    public function show()
    {
        $id = $this->request->get('id/d', 0);
        $topic = TopicModel::with(['user' => function ($query) {
            $query->field('id,name,img_url');
        }])->where('is_show', 1)->get($id);
        if (!$topic) {
            $this->error('获取话题失败。');
        }
        $topic['user']['img_url'] = $this->avatarUrl($topic['user']['img_url']);
        $topic->setInc('hits');
        $this->success('', false, $topic);
    }

    public function del()
    {
        $id = $this->request->post('id/d', 0);
        $topic = TopicModel::where([
            'is_show' => true
        ])->get($id);
        if ($this->user->role !== 'admin' && $topic->user_id !== $this->user->id) {
            $this->error('删除失败，您没有权限进行此操作。', null, []);
        }
        $topic->is_show = false;
        $topic->save();
        ReplyModel::where(['topic_id' => $id, 'is_show' => true])->update(['is_show' => false]);
        $this->success('删除成功。', null, []);
    }

    public function best()
    {
        $size = max(min($this->request->get('size/d', 10), 20), 1);
        $data = TopicModel::where(['is_show' => 1])->field('id,title')->order('hits', 'desc')->limit($size)->select();
        $this->success('', null, $data);
    }

    public function newest()
    {
        $size = max(min($this->request->get('size/d', 10), 20), 1);
        $data = TopicModel::where(['is_show' => 1])->field('id,title')->order('id', 'desc')->limit($size)->select();
        $this->success('', null, $data);
    }
}
