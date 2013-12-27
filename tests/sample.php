<?php

$loader = require __DIR__ . "/../vendor/autoload.php";


use Goldfinger\Config;


//$c = new Config();
//$c->setFile("test.yml");


Config::setFile("test.yml");


$config = Config::getInstance();

$config->username = "Me";


print "<Br> config 1 = " . $config->test1;
print "<Br> config 2 = " . $config->username;


