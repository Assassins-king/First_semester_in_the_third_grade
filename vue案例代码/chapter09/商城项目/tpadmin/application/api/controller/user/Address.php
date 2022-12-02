<?php
namespace app\api\controller\user;

use app\api\controller\Common;
use app\api\model\UserAddress as AddressModel;
use app\api\validate\UserAddress as AddressValidate;

class Address extends Common
{
    public function save()
    {
        $id = $this->request->post('id/d', 0);
        $data = [
            'name' => $this->request->post('name/s', '', 'trim'),
            'tel' => $this->request->post('tel/s', '', 'trim'),
            'area' => $this->request->post('area/s', '', 'trim'),
            'detail' => $this->request->post('detail/s', '', 'trim'),
            'user_user_id' => $this->user['id']
        ];
        $validate = new AddressValidate;
        if (!$validate->check($data)) {
            $this->error('操作失败：' . $validate->getError());
        }
        if ($id) {
            if (!$address = AddressModel::where('user_user_id', $this->user['id'])->get($id)) {
                $this->error('记录不存在');
            }
            $address->save($data);
            $this->success('修改成功');
        } else {
            $address = AddressModel::create($data);
            $this->success('添加成功', null, ['id' => $address->id]);
        }
    }

    public function index()
    {
        $id = $this->user['id'];
        $data = AddressModel::where('user_user_id', $id)->select();
        $this->success('', null, $data);
    }

    public function edit()
    {
        $id = $this->request->get('id/d', 0);
        $data = AddressModel::where('user_user_id', $this->user['id'])->get($id);
        $this->success('', null, $data);
    }

    public function del()
    {
        $id = $this->request->post('id/d', 0);
        if (!$address = AddressModel::where('user_user_id', $this->user['id'])->get($id)) {
            $this->error('记录不存在');
        }
        $address->delete();
        $this->success('删除成功');
    }

    public function def()
    {
        $id = $this->request->get('id/d', 0);
        $where = ['user_user_id' => $this->user['id']];
        if ($id) {
            $data = AddressModel::where($where)->get($id);
        } else {
            $data = AddressModel::where($where)->order('id', 'desc')->find();
        }
        $this->success('', null, $data);
    }
}
