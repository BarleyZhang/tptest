<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use app\api\model\User as UserModel; //为了区分控制器和模型,使命模型别名

/**
 * 用户资源类,命令行创建
 * Class User
 * @package app\api\controller
 */
class User extends Api
{

    public function index()
    {
        $list = UserModel::all();
        return $this->return_msg(200,'',$list);
    }


    /**
     * 保存用户信息
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //根据传入的数据,创建记录
        $request = UserModel::create($request->param());
        $this->return_msg(200,'',$request);
    }

    /**
     * 根据id获取用户信息
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //根据id查询单条记录
        $this->return_msg(200,'',UserModel::get($id));
    }


    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //根据id和数据更新用户数据
        $result = UserModel::update($request->param(),['id'=>$id]);
        return $this->return_msg(200,'',$result);
    }

    /**
     * 根据用户ID删除记录
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //根据id删除一条记录
        return $this->return_msg(200,'',UserModel::destroy($id));
    }
}
