<?php

class Info {

    public $npc, $src;

    function __construct($npc, $src) {
        $this->npc = $npc;
        $this->src = $src;
    }
}


class AutoLoader {

    private static $directorys = [];

    public static function config(Array $directorys) : AutoLoader {

        foreach ($directorys as $npc => $src) {
            self::$directorys[] = new Info($npc, $src);
        }
        return new static;
    }

    /**
     * @todo Autoload register function
     */
    public static function register() {

        spl_autoload_register(function ($class) {
            
            $npc = "";
            $class = ltrim($class);

            if ($pos = strrpos($class, '\\')) {
                $npc = substr($class, 0, $pos);
                $class = substr($class, $pos+1);
            }

            foreach (self::$directorys as $info) {
                $file = $info->src.$class.'.php';
                if (file_exists($file) && $npc === $info->npc) {
                    include_once($file);
                    return;
                }
            }
        });
    }
    
}
