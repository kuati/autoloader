<?php

include_once ("../../src/Autoloader.php");

Autoloader::config([
    "app/",
    "app/sub/"
])->register();

new Hello();
new SubHello();