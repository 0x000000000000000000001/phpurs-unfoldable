<?php

$unfoldrArrayImpl = function($isNothing, $fromJust, $fst, $snd, $f, $b) use (&$unfoldrArrayImpl) {
    
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
