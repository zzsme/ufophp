<?php

namespace UFOPHP;

class Application {

    public $base_dir;
    protected static $instance;
    public $config;
    public $route;

    protected function __construct($base_dir) {
        $this->base_dir = $base_dir;
        $this->config = new Config($base_dir . '/config');
        $this->route = new Route();
    }

    static function getInstance($base_dir = '') {
        if (empty(self::$instance)) {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }

    function dispatch() {
        $controller = ucwords($this->route->getController());
        $class = '\\App\\Controller\\' . $controller;
        $action = $this->route->getAction();
        try {
            if (class_exists($class)) {
                $obj = new $class($controller, $action);
                $this->decorator($obj);
            } else {
                throw new \Exception("class [ {$class} ] not exists!");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    function decorator($obj) {
        $action = $this->route->getAction();
        $controller_low = strtolower($this->route->getController());
        $controller_config = $this->config['controller'];
        $decorators = array();
        if (isset($controller_config[$controller_low]['decorator'])) {
            $conf_decorator = $controller_config[$controller_low]['decorator'];
            foreach ($conf_decorator as $class) {
                $decorators[] = new $class;
            }
        }

        //开启装饰器模式
        foreach ($decorators as $decorator) {
            $decorator->beforeRequest($obj);
        }
        $return_value = $obj->$action();
        foreach ($decorators as $decorator) {
            $decorator->afterRequest($return_value);
        }
    }

}
