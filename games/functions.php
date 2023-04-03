<?php

function saveRand($rand)
{
    static $data = null;
    if ($rand == null) {
        if ($data == null) {
            echo "getting a null value...";
            return false;
        } else {
            echo "getting the saved num...";
            return $data;
        }
    } else {
        echo "saved the rand num...";
        $data = $rand;
    }
}


function generateRandomLetters()
{
    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomLetters = "";

    for ($i = 0; $i < 6; $i++) {
        $randomLetters .= $letters[rand(0, strlen($letters) - 1)];
        if ($i < 5) {
            $randomLetters .= ',';
        }
    }
    return $randomLetters;
}


function checkLettersAccOrder($input, $randomLetters)
{
    $randomLettersArr = explode(',', $randomLetters);
    sort($randomLettersArr);
    $sortedRandLetters = implode("", $randomLettersArr);
    $flag = true;
    echo $sortedRandLetters;
    $letters = explode(',', $input);

    for ($i = 0; $i < 5; $i++) {
        if ($letters[$i] != $sortedRandLetters[$i]) {
            $flag = false;
        }
    }
    return $flag;
}
