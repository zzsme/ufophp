<?php
namespace UFOPHP;

class Database {
    protected $db;

    //将构造方法私有，防止在外层直接new
    private function __construct() {

    }

    static function getInstance() {
        if (self::$db) {
            return self::$db;
        } else {
            self::$db = new self();
            return self::$db;
        }
    }

    function where() {
        return $this;
    }

    function order() {
        return $this;
    }

    function limit() {
        return $this;
    }
}