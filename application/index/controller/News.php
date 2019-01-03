<?php
/**
 * 资讯详情类
 */

namespace app\index\controller;

use think\Controller;
use think\Db;

class News extends Controller
{
    public function index()
    {
        //获取资讯id
        $id = input('id');
        if (!$id) {
            $this->error('参数错误');
        }
        //在数据库中查询资讯信息
        $map = [];
        $map['id'] = $id;
        $info = Db::name('news')->where($map)->find();
        if (!$info) {
            $this->error('数据库查询为空');
        }
        //模板变量赋值
        $this->assign('info', $info);
        $this->assign('shorturl', shorturl($this->request->url(true)));
        return $this->fetch();
    }
}
