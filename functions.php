<?php

function numsAscendingOrder($arr)
{
    $flag = true;
    for ($i = 0; $i < count($arr); $i++) {
        if (intval($arr[$i]) > intval($arr[$i + 1])) {
            $flag = false;
            break;
        }
    }

    return $flag;
}

function numsDescendingOrder($arr)
{
    $flag = true;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] < $arr[$i + 1]) {
            $flag = false;
            break;
        }
    }

    return $flag;
}
