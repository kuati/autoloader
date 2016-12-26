<?php

include_once ("../src/Autoloader.php");

// namespace => source code location
Autoloader::config([
    "" => "",
    "App" => "app/",
    "App\Sub" => "app/sub/"
])->register();

use Hello as Hello;
use App\Hello as HelloApp;
use App\Sub\Hello as SubHelloApp;

new Hello();
new HelloApp();
new SubHelloApp();