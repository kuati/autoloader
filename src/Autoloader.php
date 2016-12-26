<?php

/**
 * @todo Autoloader simple class
 * @author: kuati <brunokuati@gmail.com>
 * @license: MIT
 * @version 1.0.1
 */
class AutoLoader {

    /**
     * @todo Is array of directorys and namespaces
     */
    private static $descriptions = [];

    /**
     * @todo 
     * @param $src as directorys location
     * @return $this
     */
    public function addDirectory($src) {
        self::$descriptions[$src] = "";
        return $this;
    }

    /**
     * @todo 
     * @param $src as directorys location
     * @param $npc as namespace name
     * @return $this
     */
    public function addNamespace($src, $npc) {
        self::$descriptions[$src] = $npc;
        return $this;
    }

    /**
     * @todo Autoloader config funtion
     * @param $directorys as array of directorys
     */
    public function config(Array $descriptions) : AutoLoader {
        self::$descriptions = $descriptions;
        return $this;
    }

    /**
     * @todo Autoload register function
     */
    public function register() {
        spl_autoload_register(function ($class) {
            $namespace = "";
            $class = ltrim($class);
            if ($pos = strrpos($class, '\\')) {
                $namespace = substr($class, 0, $pos);
                $class = substr($class, $pos+1);
            }
            foreach (self::$descriptions as $src => $npc) {
                $file = $src.$class.'.php';
                if (file_exists($file) && $npc === $namespace) {
                    return include ($file);
                }
            }
        });
    }
}