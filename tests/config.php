<?php

include_once ("../src/Autoloader.php");

$autoloader = new Autoloader();

$autoloader->addDirectory("")
           ->addDirectory("outhers/")
           ->addNamespace("app/", "App")
           ->addNamespace("app/sub/", "App\Sub")
           ->register();

// OR
// $autoloader->config([
//     "" => "",
//     "outhers/" => "",
//     "app/" => "App",
//     "app/sub/" => "App\Sub"
// ])->register();