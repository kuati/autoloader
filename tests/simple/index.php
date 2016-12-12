<?php

include_once ("../../src/Autoloader.php");

$directorys = Array("app/","app/sub/");

Autoloader::config(
    $directorys
)->register();

new Hello();
new SubHello();