<?php

include_once ("../src/Autoloader.php");

Autoloader::config(
    Array(
        "app/",
        "app/sub/"
    )
)->register();

new Hello();
new SubHello();