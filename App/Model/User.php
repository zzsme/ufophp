<?php
namespace App\Model;
use UFOPHP\Factory;
use UFOPHP\Model;

class User extends Model{
    function getInfo(){
        $result = Factory::getDatabase('slave')->query("select * from user where id=1");
        if($result){
            while ($row = mysql_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    function create($user){
        $model = strtolower(str_replace(__NAMESPACE__.'\\', '', get_class($this)));
        $sql = "insert into `{$model}`(`name`, `mobile`, `regtime`) values('{$user['name']}', '{$user['mobile']}', '" .date('Y-m-d H:i:s')."')";
        echo $sql;
        $id = Factory::getDatabase()->query($sql);
        $this->notify($user);
        return $id;
    }
}