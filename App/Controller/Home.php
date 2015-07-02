<?php
namespace App\Controller;
use \UFOPHP\Controller;
use \UFOPHP\Factory;

class Home extends Controller{
    function index(){
        //var_dump(__METHOD__);
        $this->assign('hello', 'hello zhengjinhao');
        return array('name'=>'lbb', 'age' => 28, 'hello'=> 'hello zhengjinhao');
    }
    
    function user() {
        $model = Factory::getModel('User');
        $model->create(array('name' => 'zhengzs', 'mobile' => '18612439061'));
        return array('userid' => 1, 'name' => 'zhengzs');
    }
}