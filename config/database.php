<?php
$config = array(
    'master' => array(
        'type' => 'MySQL',
        'host' => '192.168.146.185',
        'user' => 'admin',
        'password' => 'admin888',
        'dbname' => 'test'
    ),
    'slave' => array(
        'slave1' => array(
            'type' => 'MySQL',
            'host' => '192.168.146.185',
            'user' => 'admin',
            'password' => 'admin888',
            'dbname' => 'test'
        ),
        'slave2' => array(
            'type' => 'MySQL',
            'host' => '192.168.146.185',
            'user' => 'admin',
            'password' => 'admin888',
            'dbname' => 'test'
        ),
    ),
);

return $config;