<?php

namespace Gini\Cache;

interface Driver
{
    public function __construct($name, array $options);
    public function get($key);
    public function set($key, $value, $ttl);
    public function remove($key);
    public function flush();
}
