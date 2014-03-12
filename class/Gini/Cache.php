<?php

namespace Gini;

class Cache
{
    private $_driver;
    private static $_CACHE;

    public function set($key, $value, $ttl=null)
    {
        if (!$this->_driver) return false;
        return $this->_driver->set($key, $value, $ttl);
    }
    
    public function get($key)
    {
        if (!$this->_driver) return false;
        return $this->_driver->get($key);
    }

    public function remove($key)
    {
        if (!$this->_driver) return false;
        return $this->_driver->remove($key);
    }

    //清空缓冲
    public function flush()
    {
        if ($this->_driver) $this->_driver->flush();
    }

    public function __construct($name, $_driver, array $options)
    {
        $class = '\Gini\Cache\\'.$_driver;
        $this->_driver = \Gini\IoC::construct($class, $name, $options);
    }

    // \Gini\Cache::of('default', 'redis', $options)->set('a', 'b');
    public static function of($name, $_driver = 'none', array $options = array())
    {
        if (!isset(self::$_CACHE[$_driver])) {
            self::$_CACHE[$_driver] = \Gini\IoC::construct('\Gini\Cache', $name, $_driver, $options);
        }

        return self::$_CACHE[$_driver];
    }

}
