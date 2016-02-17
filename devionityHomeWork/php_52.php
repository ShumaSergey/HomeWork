<?php
/*
Как можно упростить функцию test() в данном скрипте?\
function test($x, $y)
{
    if ($y == 0) {
        return false;
    }

    return $x / $y;

}

echo test(1, 0) or die('Error');
echo 'Unreached line';

 */

function test($x, $y)
{
    if ($y == 0) {
        return die('Error! It is impossible to divide by 0.');
    }

    return $x / $y;

}

echo test(10, 3);