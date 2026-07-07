<?php

$unfoldr1ArrayImpl = function($isNothing, $fromJust = null, $fst = null, $snd = null, $f = null, $b = null) use (&$unfoldr1ArrayImpl) {
    if (func_num_args() < 6) {
        $__args = func_get_args();
        return function(...$more) use ($__args, &$unfoldr1ArrayImpl) {
            return $unfoldr1ArrayImpl(...array_merge($__args, $more));
        };
    }
    
    $result = [];
    $value = $b;
    while (true) {
        $tuple = $f($value);
        $result[] = $fst($tuple);
        $maybe = $snd($tuple);
        if ($isNothing($maybe)) {
            return $result;
        }
        $value = $fromJust($maybe);
    }
};

$exports['unfoldr1ArrayImpl'] = $unfoldr1ArrayImpl;
return $exports;
