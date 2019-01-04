<?php
/*
    Author:Barley
    Createby:PhpStorm
    Createtime:2019/1/4 17:24
    Description:Index.php
*/
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}