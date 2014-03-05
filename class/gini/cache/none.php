<?php

namespace Gini\Cache;

class None implements \Gini\Cache\Driver
{
    public function __construct($name, array $options)
    {}

    public function set($key, $value) { }

    public function get($key) { }

    public function remove($key) { }

    public function flush() { }

}
