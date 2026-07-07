<?php

$unfoldrArrayImpl = function(...$args) use (&$unfoldrArrayImpl) {
    if (count($args) < 6) {
        return function(...$more) use ($args, &$unfoldrArrayImpl) {
            return $unfoldrArrayImpl(...array_merge($args, $more));
        };
    }
    
    list($isNothing, $fromJust, $fst, $snd, $f, $b) = $args;
    
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
