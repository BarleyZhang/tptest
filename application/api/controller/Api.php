<?php
/*
    Author:Barley
    Createby:PhpStorm
    Createtime:2019/1/3 15:45
    Description:Api.php
*/

namespace app\api\controller;

use think\Controller;
use think\Db;
use think\facade\Request;

class Api extends Controller
{
    protected $timeout_second = 60;
    protected $sign_key = 'barley';

    public function initialize()
    {
        parent::initialize();
        //获取请求对象
        $this->request = Request::init();
        //是否开启API权限验证(测试用)
        if (config('api_auth')) {
            //验证时间戳是否超时
            $this->check_time($this->request->only(['time']));
            //验证签名是否正确
            $this->check_sign($this->request->param());
        }
    }

    /**
     * @param int $code HTTP CODE
     * @param string $message 返回消息
     * @param array $data 返回数据
     */
    public function return_msg($code = 200, $message = '', $data = [])
    {
        header('Content-type:application/json');   //设置返回类型
        http_response_code($code);                       //设置返回头部
        $return['code'] = $code;
        $return['message'] = $message;
        if (!empty($data)) {
            $return['data'] = $data;
        }
        exit(json_encode($return, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 检测是否超时
     * @param $arr
     */
    public function check_time($arr)
    {
        if (!isset($arr['time']) || intval($arr['time']) <= 1) {
            $this->return_msg(400, '时间戳错误');
        }
        if (time() - intval($arr['time']) > $this->timeout_second) {
            $this->return_msg(400, '请求超时');
        }
    }

    /**
     * 构建请求签名
     * @param $param
     * @return string
     */
    public function buildSign($param)
    {
        unset($param['sign']);
        unset($param['time']);
        ksort($param);
        $str = implode('', $param);
        $sign = md5(md5($str) . $this->sign_key);
        return $sign;
    }

    public function check_sign($param)
    {
        if (!isset($param['sign']) || !$param['sign']) {
            $this->return_msg(400, '签名不能为空');
        }
        if ($param['sign'] !== $this->buildSign($param)) {
            $this->return_msg(400, '签名错误');
        }
    }
}