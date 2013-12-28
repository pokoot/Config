<?php

namespace Goldfinger;

use Symfony\Component\Yaml\Yaml;

class Config extends Singleton
{

    protected static $instance = null;

    protected static $file;

    protected $values = array();

    public function __construct()
    {
        $file = self::$file;

        $yml = Yaml::parse($file);

        $this->values = &$yml;
    }

    public static function setFile($file)
    {
        if (self::$instance !== null) {
            throw new \Exception("You need to set the path before calling ". __CLASS__ ."::getInstance() method.");
        } else if (!file_exists($file)) {
            throw new \Exception("The configuration file does not exist.");
        } else {
            self::$file = $file;
        }
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function __get($key)
    {
        if (!array_key_exists($key, $this->values)){
            throw new \Exception("Invalid configuration key - ($key)");
        }
        return $this->values[$key];
    }

}
