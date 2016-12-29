<?php

include_once ("config.php");

use Hello as Hello;
use App\Hello as HelloApp;
use App\Sub\Hello as SubHelloApp;
use HelloOuthers as HelloOuthers;

new Hello();
new HelloApp();
new SubHelloApp();
new HelloOuthers();