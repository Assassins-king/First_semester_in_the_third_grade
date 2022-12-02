<?php
namespace app\api\controller;

use app\api\model\Like as LikeModel;
use app\api\model\Topic as TopicModel;

class Like extends Common
{
    public function isLike()
    {
        $id = $this->request->get('id/d', 0);
        $like = LikeModel::field('id')->where([
            'topic_id' => $id,
            'user_id' => $this->user->id
        ])->find();
        $this->success('', null, ['isLike' => !empty($like)]);
    }
    
    public function setLike()
    {
        $id = $this->request->post('id/d', 0);
        $setLike = $this->request->post('isLike/b', false);
        $like = LikeModel::field('id')->where([
            'topic_id' => $id,
            'user_id' => $this->user->id
        ])->find();
        if ($like) {
            if (!$setLike) {
                $like->delete();
            }
            if ($topic = TopicModel::where('is_show', 1)->get($id)) {
                $topic->setDec('likenum');
            }
        } else {
            if ($setLike) {
                $like = LikeModel::create([
                    'topic_id' => $id,
                    'user_id' => $this->user->id
                ]);
                if ($topic = TopicModel::where('is_show', 1)->get($id)) {
                    $topic->setInc('likenum');
                }
            }
        }
        $this->success('', null, ['isLike' => $setLike]);
    }
}
