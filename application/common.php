<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
if (!function_exists('code62')) {
    //生成端地址核心类库
    function code62($x)
    {
        $show = '';
        while ($x > 0) {
            $s = $x % 62;
            if ($s > 35) {
                $s = chr($s + 61);
            } elseif ($s > 9 && $s <= 35) {
                $s = chr($s + 55);
            }
            $show .= $s;
            $x = floor($x / 62);
        }
        return $show;
    }
}

//生成url短地址
if (! function_exists('shorturl')){
    function shorturl($url)
    {
        $old_url = $url;
        //转换原始地址为数字
        $url = crc32($url);
        $result = sprintf("%u",$url);
        if ($result){
            //查询当前短地址是否已经生成
            $map = [];
            $map['shorturl'] = code62($result);
            $info = db('shorturl')->where($map)->find();
            if ($info === null){
                //记录原始地址和印射关系
                $data = [];
                $data['shorturl'] = code62($result);
                $data['url'] = $old_url;
                $insertResult = db('shorturl')->insert($data);
                if ($insertResult === false){
                    abort(500,'url信息入库失败');
                }
            }
        }
        return 'http://'.$_SERVER['HTTP_HOST'] . '/min/'.code62($result);
    }
}