<?php
namespace App\Model;
use UFOPHP\Factory;
use UFOPHP\Model;

class User extends Model{
    function getInfo(){
        return Factory::getDatabase('slave')->query("select * from user where id=1");
    }

    function create($user){
        $model = str_replace(__NAMESPACE__.'\\', '', get_class($this));
        $sql = "insert into `{$model}`(`name`, `mobile`, `regtime`) values('{$user['name']}', '{$user['name']}', '" .date('Y-m-d H:i:s')."')";
        $id = Factory::getDatabase()->query($sql);
        $this->notify($user);
        return $id;
    }
}