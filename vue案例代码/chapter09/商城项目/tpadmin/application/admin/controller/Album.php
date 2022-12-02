<?php
namespace app\admin\controller;

use app\admin\controller\Common;
use app\admin\model\Album as AlbumModel;
use app\admin\model\AlbumImage as ImageModel;
use think\facade\Config;

class Album extends Common
{
    protected $savePath = '';
    protected $imageExt = '';
    protected $thumb = [];

    protected function initialize()
    {
        parent::initialize();
        $this->savePath = Config::get('tpadmin.album.save_path');
        $this->imageExt = Config::get('tpadmin.album.image_ext');
        $this->thumb = Config::get('tpadmin.album_thumb');
    }

    public function index()
    {
        $album = AlbumModel::tree()->getTreeList();
        $this->assign('album', $album);
        return $this->fetch();
    }

    public function show()
    {
        $album_id = $this->request->param('album_id/d', 0);
        if (!$album = AlbumModel::get($album_id)) {
            $this->error('相册不存在。');
        }
        $image = ImageModel::where('album_id', $album_id)->order('id', 'desc');
        $image = $image->paginate(12, false, ['type' => 'bootstrap', 'var_page' => 'page']);
        $this->assign('album', $album);
        $this->assign('image', $image);
        $this->assign('upload_ext', $this->imageExt);
        return $this->fetch();
    }

    public function upload()
    {
        $album_id = $this->request->param('album_id/d', 0);
        if (!$album = AlbumModel::get($album_id)) {
            $this->error('上传失败，相册不存在。');
        }
        $albumPath = $album->path;
        $savePath = $this->savePath .  '/' . $albumPath;
        if (!$file = $this->request->file('image')) {
            $this->error('上传失败，没有文件上传。');
        }
        $info = $file->validate(['ext' => $this->imageExt])->rule(function () {
            return date('Y/m/d/') . md5(microtime(true));
        })->move($savePath);
        if (!$info) {
            $this->error('上传失败，' . $file->getError());
        }
        // 缩略图的代码
        if (isset($this->thumb[$albumPath])) {
            $filePath = $savePath . '/' . $info->getSaveName();
            list($class, $method) = $this->thumb[$albumPath];
            (new $class)->$method($filePath, $filePath);
        }
        ImageModel::create([
            'album_id' => $album_id,
            'admin_user_id' => $this->auth->getLoginUser('id'),
            'path' => $info->getSaveName()
        ]);
    }
    public function deleteImage()
    {
        $ids = $this->request->post('ids/a', [], 'intval');
        $path = ImageModel::where('id', 'in', $ids)->select();
        foreach ($path as $v) {
            $savePath = $this->savePath . '/' . $v->album->path . '/' . $v->path;
            if (is_file($savePath)) {
                unlink($savePath);
            }
        }
        ImageModel::where('id', 'in', $ids)->delete();
        $this->success('删除成功。');
    }
}
