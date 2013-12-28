<?php

namespace Goldfinger;

use Symfony\Component\Yaml\Yaml;

/**
 * This provides to retrieve configuration preferences from a default .yml
 * configuration file and translates the results to an associative array
 *
 * @uses Singleton
 * @package
 * @version $id$
 * @author Harold Kim
 * @license http://pokoot.com/license.txt
 */
class Config extends Singleton
{

    /**
     * The only one instance of the class.
     *
     * @var mixed
     * @access protected
     */
    protected static $instance = null;

    /**
     * The configuration file in .yml file extension.
     *
     * @var array
     * @access protected
     */
    protected static $file;

    /**
     * The transformed configuration file.
     *
     * @var array
     * @access private
     */
    private $values = array();

    /**
     * Config class constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $file = self::$file;

        $yml = Yaml::parse($file);

        $this->values = &$yml;
    }

    /**
     * Points the .yml file location
     *
     * @access public
     * @param mixed $file
     * @static
     * @return void
     */
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

    /**
     * Property magic methods setters
     *
     * @access public
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * Property magic methods getters
     *
     * @access public
     * @param mixed $key
     * @return void
     */
    public function __get($key)
    {
        if (!array_key_exists($key, $this->values)){
            throw new \Exception("Invalid configuration key - ($key)");
        }
        return $this->values[$key];
    }

}
