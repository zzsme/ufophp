<?php

$config = array(
    'home' => array(
        'decorator' => array(
            'App\Decorator\Template',
            // 'App\Decorator\Login',
            //'App\Decorator\Json',
        ),
    ),
    'default' => 'hello rango',
);

return $config;