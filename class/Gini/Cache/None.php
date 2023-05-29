<?php

namespace Gini\Cache;

class None implements \Gini\Cache\Driver
{
    public function __construct($name, array $options)
    {}

    public function set($key, $value, $ttl) { }
    public function ttl($key) { }

    public function get($key) { return false; }

    public function remove($key) { }

    public function rename($fromKey, $toKey) {}

    public function flush() { }

}
