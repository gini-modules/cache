<?php

namespace Gini\Cache;

class Redis implements \Gini\Cache\Driver
{
    private $_h;

    public function __construct($name, array $options)
    {
        $this->_h = new \Redis();

        if (!isset($options['servers'])) {
            $options['servers'] = ['host'=>'127.0.0.1', 'port'=>6379];
        }

        foreach ((array) $options['servers'] as $server) {
            $this->_h->connect($server['host'], $server['port']);
        }

        if (isset($options['password'])) {
            $this->_h->auth($options['password']);
        }

        $this->_h->select($name);

    }
    
    public function set($key, $value, $ttl)
    {
        return $this->_h->set($key, $value, $ttl);
    }

    public function get($key)
    {
        return $this->_h->get($key);
    }

    public function remove($key)
    {
        return $this->_h->delete($key);
    }

    public function flush()
    {
        return $this->_h->flushDB();
    }

}
