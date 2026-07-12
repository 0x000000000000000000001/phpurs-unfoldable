<?php

$unfoldrArrayImpl = function($isNothing, $fromJust = null, $fst = null, $snd = null, $f = null, $b = null) use (&$unfoldrArrayImpl) {
    if (\func_num_args() < 6) {
        $__args = \func_get_args();
        return function(...$more) use ($__args, &$unfoldrArrayImpl) {
            return $unfoldrArrayImpl(...\array_merge($__args, $more));
        };
    }
    
    $result = [];
    $value = $b;
    while (true) {
        $maybe = $f($value);
        if ($isNothing($maybe)) {
            return $result;
        }
        $tuple = $fromJust($maybe);
        $result[] = $fst($tuple);
        $value = $snd($tuple);
    }
};

$exports['unfoldrArrayImpl'] = $unfoldrArrayImpl;
return $exports;
