<?php

namespace Goldfinger;

/**
 * In software engineering, the singleton pattern is a design pattern that
 * restricts the instantiation of a class to one object.
 *
 * @package
 * @version $id$
 * @author Harold Kim
 * @license http://pokoot.com/license.txt
 */
class Singleton
{

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct()
    {
    }

     /**
     * Returns the *Singleton* instance of this class.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }


    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}
