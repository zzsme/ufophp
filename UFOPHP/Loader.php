<?php
namespace UFOPHP;
class Loader {
    static function autoload($class) {
        $classFile =  str_replace('\\', '/', $class) . '.php';
        try {
            if (file_exists($classFile)) {
                require($classFile);
            } else {
                throw new \Exception("<h1>[{$classFile}] not exists!</h1>");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}