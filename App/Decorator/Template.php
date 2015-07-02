<?php

namespace App\Decorator;

class Template {

    protected $controller;

    function beforeRequest($controller) {
        $this->controller = $controller;
    }

    function afterRequest($return_value) {
        if (isset($_GET['app']) && $_GET['app'] === 'html') {
            if (!empty($return_value)) {

                foreach ($return_value as $k => $v) {
                    $this->controller->assign($k, $v);
                }
            }
            $this->controller->display();
        }
    }

}
