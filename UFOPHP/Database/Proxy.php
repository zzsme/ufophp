<?php
namespace UFOPHP\Database;

use UFOPHP\Factory;

class Proxy {
    function query($sql) {
        if (substr($sql, 0, 6) === 'select') {
            echo "读操作:$sql";
            return Factory::getDatabase('slave')->query($sql);
        } else {
            echo "写操作:$sql";
            return Factory::getDatabase('master')->query($sql);
        }
    }
}