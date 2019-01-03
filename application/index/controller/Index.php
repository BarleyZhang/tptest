<?php

namespace app\index\controller;

class Index
{
    public function index()
    {
        $str = date('YmdHis');
        echo code62($str);
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
