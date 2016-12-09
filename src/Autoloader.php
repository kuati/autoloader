<?php

class AutoLoader {

   private  static $directorys = Array();

    public static function config(Array $directorys) : AutoLoader {
        self::$directorys = $directorys;
        return new static;
    }

    public static function register() {
        spl_autoload_register(function ($class) {
            foreach(self::$directorys as $directory) {
                $file = $directory.$class . '.php';
                if(file_exists($file)) {
                    return include_once($file);
                }
            }
        });
    }
}
