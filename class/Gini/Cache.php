<?php

namespace Gini;

class Cache
{
    private $_driver;
    private $_keyPrefix;

    private static $_CACHE;

    public function set($key, $value, $ttl=null)
    {
        if (!$this->_driver) return false;
        return $this->_driver->set($this->_keyPrefix . $key, $value, $ttl);
    }

    public function get($key)
    {
        if (!$this->_driver) return false;
        return $this->_driver->get($this->_keyPrefix . $key);
    }

    public function remove($key)
    {
        if (!$this->_driver) return false;
        return $this->_driver->remove($this->_keyPrefix . $key);
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
        $this->_keyPrefix = isset($options['key_prefix']) ? $options['key_prefix'] : '';
    }

    // \Gini\Cache::of('default')->set('a', 'b');
    public static function of($name)
    {
        $key = \Gini\Config::get("cache.$name") ? $name : 'default';
        $conf = (array) \Gini\Config::get("cache.$key");
        $key = "{$key}-{$conf['driver']}";
        if (!isset(self::$_CACHE[$key])) {
            self::$_CACHE[$key] = \Gini\IoC::construct('\Gini\Cache', $name, $conf['driver'] ?: 'none', (array) $conf['options']);
        }

        return self::$_CACHE[$key];
    }

}
