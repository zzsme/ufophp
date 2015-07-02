<?php
namespace UFOPHP;
/**
 * 工厂模式
 * Class Factory
 * @package 
 */
class Factory {
    protected static $proxy;
    static function createDatabase() {
        $db = Database::getInstance();//工厂加单例
        Register::set('db1', $db);
        return $db;
    }

    static function getDatabase($id = 'master') {
        if($id == 'proxy'){
            if(!self::$proxy) {
                self::$proxy = new \UFOPHP\Database\Proxy;
            }
            return self::$proxy;
        }
        $key = 'database_' . $id;
        if ($id == 'slave') {
            $slaves = Application::getInstance()->config['database']['slave'];
            $db_conf = $slaves[array_rand($slaves)];
        } else {
            $db_conf = Application::getInstance()->config['database'][$id];
        }
        $db = Register::get($key);
        if (!$db) {
            $db = new Database\MySQLi();
            $db->connect($db_conf['host'], $db_conf['user'], $db_conf['password'], $db_conf['dbname']);
            Register::set($key, $db);
        }
        return $db;
    }

    static function getUser($id) {
        $key = 'user_' . $id;
        $user = Register::get($key);
        if (!$user) {
            $user = new User($id);
            //用注册器模式把对象存库
            Register::set($key, $user);
        }
        return $user;
    }

    static function getModel($name){
        $key = 'app_model_'.$name;
        $model = Register::get($key);
        if (!$model) {
            $class = '\\App\\Model\\'.ucwords($name);
            $model = new $class;
            Register::set($key, $model);
        }
        return $model;
    }
}