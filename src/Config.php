<?php

namespace Goldfinger;

class Config extends Singleton implements \Countable //, \ArrayAccess
{

    protected static $instance = null;

    protected static $file;

    protected $values = array();

    public function __construct()
    {
        print "contructor called";

        $temp = array(
            "config1" => "test 1",
            "config2" => "test 2"
        );

        $this->values = &$temp;
    }

    public static function setFile($file)
    {
        if (self::$instance !== null) {
            throw new Exception('You need to set the path before calling '. __CLASS__ .'::getInstance() method', 0);
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
            throw new \Exception("Invalid configuration key.");
        }
        return $this->values[$key];
    }


    public function count()
    {
        //return sizeof($this->_values);
    }



}
