<?php

namespace Gini\Cache;

class XCache implements \Gini\Cache\Driver {

    function set($key, $value, $ttl) {
        return @xcache_set($key, serialize($value), $ttl);
    }
    
    function get($key) {
        return unserialize(strval(@xcache_get($key)));
    }
    
    function remove($key) {
        return @xcache_unset($key);
    }
    
    function flush() {
    }
    
}

