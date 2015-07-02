<?php
/**
 * 数据库操作约束接口
 */
namespace UFOPHP;

interface IDatabase {
    function connect($host, $user, $passwd, $dbname);

    function query($sql);

    function close();
}