<?php
$config = array(
    'master' => array(
        'type' => 'MySQL',
        'host' => '127.0.0.1',
        'user' => 'admin',
        'password' => 'admin888',
        'dbname' => 'test'
    ),
    'slave' => array(
        'slave1' => array(
            'type' => 'MySQL',
            'host' => '127.0.0.1',
            'user' => 'admin',
            'password' => 'admin888',
            'dbname' => 'test'
        ),
        'slave2' => array(
            'type' => 'MySQL',
            'host' => '127.0.0.1',
            'user' => 'admin',
            'password' => 'admin888',
            'dbname' => 'test'
        ),
    ),
);

return $config;