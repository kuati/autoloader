<?php

/**
 * @todo Autoloader class
 * @author: kuati <brunokuati@gmail.com>
 * @license: MIT 
 * @version 1.0
 */
class AutoLoader {

   private  static $directorys = Array();

    /**
     * @todo Autoloader config funtion
     * @param $directorys as array of directorys
     */
    public static function config(Array $directorys) : AutoLoader {
        self::$directorys = $directorys;
        return new static;
    }

    /**
     * @todo Autoload register function
     */
    public static function register() {

        spl_autoload_register(function ($class) {
            
            if (strrchr($class, '\\')) {
                $class = substr(strrchr(ltrim($class), '\\'), 1);
            }
            
            foreach (self::$directorys as $directory) {
                $file = $directory.$class.'.php';
                if (file_exists($file)) {
                    include_once($file);
                }
            }
        });
    }
    
}
