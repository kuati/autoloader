<?php

/**
 * @name Autoloader
 * @todo Autoloader as simple class to automatically load requested classes at runtime
 * @author: kuati <brunokuati@gmail.com>
 * @license: MIT
 * @version 1.0.1
 */
class AutoLoader {

    /**
     * @todo Saves directory information and namespaces for use by autoloader
     */
    private static $descriptions = [];

    /**
     * @todo Add new directory to be loaded by autoloader
     * @param $src as directorys location
     * @return $this
     */
    public function addDirectory($src) : AutoLoader {
        return self::addNamespace($src, "");
    }

    /**
     * @todo Add new namespace and its directory to be loaded by autoloader
     * @param $src as directorys location
     * @param $npc as namespace name
     * @return $this
     */
    public function addNamespace($src, $npc) : AutoLoader {
        self::$descriptions[$src] = $npc;
        return $this;
    }

    /**
     * @todo Autoloader config function
     * @param $descriptions as array of descriptions of namespaces and location
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