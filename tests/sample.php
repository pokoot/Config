<?php

$loader = require __DIR__ . "/../vendor/autoload.php";


use Goldfinger\Config;

Config::setFile("test.yml");

$config = Config::getInstance();

$config->username = "my_username";

print "<Br> config 1 = " . $config->config_1;
print "<Br> config 2 = " . $config->config_2;
print "<Br> username = " . $config->username;








