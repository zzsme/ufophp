<?php
namespace UFOPHP\Database;

use UFOPHP\IDatabase;

class MySQL implements IDatabase {
    protected $conn;

    function connect($host, $user, $passwd, $dbname) {
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }

    function query($sql) {
        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    function execute($sql) {
        return $this->query($sql);
    }

    function close() {
        mysql_close($this->conn);
    }
}