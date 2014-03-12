<?php

namespace Gini\Cache;

class YAC implements \Gini\Cache\Driver
{
    private $_h;

    public function __construct($name, array $options)
    {
        $this->_h = new \Yac($name);
    }

    public function set($key, $value, $ttl)
    {
        $key = sha1($key);
        return $this->_h->set($key, $value, $ttl);
    }

    public function get($key)
    {
        $key = sha1($key);
        return $this->_h->get($key);
    }

    public function remove($key)
    {
        $key = sha1($key);
        return $this->_h->delete($key);
    }

    public function flush()
    {
        return $this->_h->flush();
    }

}
