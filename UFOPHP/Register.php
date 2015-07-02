<?php

namespace UFOPHP;

/**
 * 注册器
 */
class Register {

    protected static $objects;

//    function __construct(){
//        var_dump(self::$objects);
//    }

    static function set($alias, $object) {
        self::$objects[$alias] = $object;
    }

    static function get($name) {
        if (isset(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }

    function _unset($alias) {
        unset(self::$objects[$alias]);
    }

}
