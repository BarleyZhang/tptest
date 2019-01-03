<?php
/*
    Author:Barley
    Createby:PhpStorm
    Createtime:2019/1/3 15:21
    Description:Url.php
*/
namespace app\index\controller;
use think\Controller;
use think\Db;

class Url extends Controller
{
    //文档详情页
    public function index()
    {
        $code = request()->param('code');
        if (!$code){
            $this->error('参数错误');
        }
        //查询数据表中的映射关系
        $map['shorturl'] = $code;
        $url = Db::name('shorturl')->where($map)->value('url');
        if (!$url){
            $this->error('原始地址错误');
        }
        //页面重定向
        $this->redirect($url);
    }
}