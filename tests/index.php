<?php

include_once ("../src/Autoloader.php");

// namespace => source code location
(new Autoloader())->config([
    "" => "",
    "outhers/" => "",
    "app/" => "App",
    "app/sub/" => "App\Sub"
])->register();

use Hello as Hello;
use App\Hello as HelloApp;
use App\Sub\Hello as SubHelloApp;
use HelloOuthers as HelloOuthers;

new Hello();
new HelloApp();
new SubHelloApp();
new HelloOuthers();