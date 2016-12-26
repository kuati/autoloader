<?php

/**
 * @todo Autoloader simple class
 * @author: kuati <brunokuati@gmail.com>
 * @license: MIT
 * @version 1.0.1
 */
class AutoLoader {

    /**
     * @todo array of directorys and namespaces
     */
    private static $dirs = [];

    /**
     * @todo Autoloader config funtion
     * @param $directorys as array of directorys
     */
    public function config(Array $directorys) : AutoLoader {
        self::$dirs = $directorys;
        return $this;
    }

    /**
     * @todo Autoload register function
     */
    public static function register() {
        spl_autoload_register(function ($class) {
            $namespace = "";
            $class = ltrim($class);
            if ($pos = strrpos($class, '\\')) {
                $namespace = substr($class, 0, $pos);
                $class = substr($class, $pos+1);
            }
            foreach (self::$dirs as $src => $npc) {
                $file = $src.$class.'.php';
                if (file_exists($file) && $npc === $namespace) {
                    return include ($file);
                }
            }
        });
    }
}