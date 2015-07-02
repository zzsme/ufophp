<?php
namespace UFOPHP;

class Route{
    private $controller;
    private $action;
    private $params = array();
    public function __construct(){
        $this->parseURL();
    }
    public function __get($name){
        return $name;
    }
    //URL解析
    public function parseURL(){
        $str1 = $_SERVER['PHP_SELF'];
        $str2 = $_SERVER['SCRIPT_NAME'];
        $len = strlen($str2);
        $des = substr($str1,$len+1,strlen($str1));
        //分别取出controller,action,id,1
        $arr = explode("/",$des);
        $this->controller = array_shift($arr);
        $this->action = array_shift($arr);
        $this->params = array();   //参数数组params[参数名称]=参数值
        for($i=0;$i<count($arr);$i=$i+2){
            $this->params[$arr[$i]] = $arr[$i+1];
        }
    }
    public function getController(){
        return $this->controller ? $this->controller : 'Index';
    }
    public function getAction(){
        return $this->action ? $this->action : 'index';
    }
    public function getParams(){
        return $this->params;
    }

//    static public function dispatch(){
//        //在这里写调度
//    }
}
