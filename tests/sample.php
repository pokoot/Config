<?php

$loader = require __DIR__ . "/../vendor/autoload.php";

use Goldfinger\Config;

$whoops = new Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
//$whoops->pushHandler(new Whoops\Handler\JsonResponseHandler());
$whoops->register();

Config::setFile("./config/config.yml");

$config = Config::getInstance();

$config->siteKey = "abcde";

print "<Br> name = " . $config->name;
print "<Br> server = " . $config->server;
print "<Br> username = " . $config->username;
print "<Br> password = " . $config->password;
print "<Br> database = " . $config->database;
print "<Br> siteKey = " . $config->siteKey;
