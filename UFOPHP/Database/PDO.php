<?php
namespace UFOPHP\Database;

use UFOPHP\IDatabase;

class PDO implements IDatabase {
    /**
     * @var  PDO
     */
    protected $conn;

    function connect($host, $user, $passwd, $dbname) {
        $conn = new \PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
        $this->conn = $conn;
    }

    function query($sql) {
        return $this->conn->query($sql);
    }

    function execute($sql) {
        return $this->conn->exec($sql);
    }

    function close() {
        unset($this->conn);
    }

}
