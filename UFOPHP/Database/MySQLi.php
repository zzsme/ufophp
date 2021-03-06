<?php
namespace UFOPHP\Database;

use UFOPHP\IDatabase;

class MySQLi implements IDatabase {
    protected $conn;

    function connect($host, $user, $passwd, $dbname) {
        $conn = mysqli_connect($host, $user, $passwd, $dbname);
        $this->conn = $conn;
    }

    function query($sql) {
        return mysqli_query($this->conn, $sql);
    }

    function execute($sql) {
        return $this->conn->exec($sql);
    }

    function close() {
        mysqli_close($this->conn);
    }
}