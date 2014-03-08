<?php

namespace Gini\Cache;

class None implements \Gini\Cache\Driver
{
    public function __construct($name, array $options)
    {}

    public function set($key, $value, $ttl) { }

    public function get($key) { return false; }

    public function remove($key) { }

    public function flush() { }

}
