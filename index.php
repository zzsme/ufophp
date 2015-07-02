<?php
/**
 * 框架入口文件
 */
require 'UFOPHP/Loader.php';

spl_autoload_register('\\UFOPHP\\Loader::autoload');

UFOPHP\Application::getInstance(str_replace('\\', '/', __DIR__))->dispatch();

header("Content-type:text/html;charset=utf-8;");