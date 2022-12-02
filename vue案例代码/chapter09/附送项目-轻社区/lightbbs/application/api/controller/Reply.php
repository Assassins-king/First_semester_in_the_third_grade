<?php
namespace app\api\controller;

use app\api\validate\Reply as ReplyValidate;
use app\api\model\Reply as ReplyModel;

class Reply extends Common
{
    protected $checkActive = ['save', 'del'];

    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'topic_id' => $this->request->post('topic_id/d', 0),
            'content' => $this->request->post('content/s', '')
        ];
        $validate = new ReplyValidate();
        if (!$validate->check($data)) {
            $this->error('操作失败，' . $validate->getError() . '。');
        }
        if ($id) {
            if (!$reply = ReplyModel::get($id)) {
                $this->error('修改失败，记录不存在。');
            }
            if ($this->user->role !== 'admin' && $this->user->id !== $reply->user_id) {
                $this->error('修改失败，您没有权限修改此内容。');
            }
            $reply->save($data);
            $this->success('修改成功。', null, ['id' => $id]);
        } else {
            $data['is_show'] = true;
            $data['user_id'] = $this->user->id;
            $reply = ReplyModel::create($data);
            $this->success('添加成功。', null, ['id' => $reply->id]);
        }
    }

    public function index()
    {
        $topic_id = $this->request->get('topic_id/d', 0);
        $page = max($this->request->get('page/d', 1), 1);
        $size = max(min($this->request->get('size/d', 10), 50), 1);
        $where = ['is_show' => 1, 'topic_id' => $topic_id];
        $total = ReplyModel::where($where)->count();
        $data = ReplyModel::with(['user' => function ($query) {
            $query->field('id,name,img_url');
        }])->where($where)->order('id', 'desc')->limit(($page - 1) * $size, $size)->select();
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

    public function del()
    {
        $id = $this->request->post('id/d', 0);
        $reply = ReplyModel::where([
            'is_show' => true
        ])->get($id);
        if (!$reply) {
            $this->error('删除失败，记录不存在。');
        }
        if ($this->user->role !== 'admin' && $reply->user_id !== $this->user->id) {
            $this->error('删除失败，您没有权限执行此操作。');
        }
        $reply->is_show = false;
        $reply->save();
        $this->success('删除成功。', null, []);
    }
}
