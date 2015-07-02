<?php

namespace UFOPHP;

class Controller {

    protected $data;
    protected $controller_name;
    protected $view_name;
    protected $template_dir;

    function __construct($controller_name, $view_name) {
        $this->controller_name = $controller_name;
        $this->view_name = $view_name;
        $this->template_dir = Application::getInstance()->base_dir . '/template';
    }

    function assign($k, $v) {
        $this->data[$k] = $v;
    }

    function display($file = '') {
        if (empty($file)) {
            $file = strtolower($this->controller_name) . '/' . $this->view_name . '.php';
        }
        $path = $this->template_dir . '/' . $file;
        extract($this->data);//将数组array(a=>b)的键值设置成变量和值 $a = b
        include $path;
    }

    function __call($method, $param) {
        echo "<h1>method: [{$method} :: {$param}] not exists!<h1>";
    }

}
