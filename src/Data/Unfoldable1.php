<?php

$unfoldr1ArrayImpl = function($isNothing, $fromJust, $fst, $snd, $f, $b) use (&$unfoldr1ArrayImpl) {
    
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
