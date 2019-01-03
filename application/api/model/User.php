<?php

namespace app\api\model;

use think\Model;

/**
 * 用户表自定义模型
 * Class User
 * @package app\api\model
 */
class User extends Model
{
    //自动写入时间戳
    protected $autoWriteTimestamp = true;
    //数据写入时,状态字段默认为1
    protected $insert = ['status' => 1];
}