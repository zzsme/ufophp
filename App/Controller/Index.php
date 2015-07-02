<?php

namespace App\Controller;
use \UFOPHP\Controller;
class Index extends Controller{
    function index(){
        var_dump(__METHOD__);
        $this->assign('hello', 'hello zhengjinhao');
        return array('name'=>'lbb', 'age' => 28, 'hello'=> 'hello zhengjinhao');
    }

    function user(){
        $User = \UFOPHP\Factory::getModel('User');
        //$info = $User->getInfo();

        $array = [
            'name' => 'apple',
            'mobile' => '18612439061'
        ];
        $info = $User->create($array);
        var_dump($info);
    }
}