<?php

namespace Gini\Cache;

class None implements \Gini\Cache\Driver {

    function set($key, $value, $ttl) { }
    
    function get($key) { }
    
    function remove($key) { }
    
    function flush() { }
    
}

