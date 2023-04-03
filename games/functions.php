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
    $letters = explode(',', $input);
    $strLetters = implode('', $letters);

    echo $strLetters;
    echo "<br>";
    echo $randomLetters;
    $strLetters = strtoupper($strLetters);
    for ($i = 0; $i < strlen($strLetters); $i++) {
        if ($strLetters[$i] !== $randomLetters[$i]) {
            return false;
        }
    }
    return true;
}



// echo "<br>";
// echo $letters[$i] . "  =   " . $randomLettersArr[$i];
// echo "<br>";
// for ($i = 0; $i < count($randomLettersArr); $i++) {
//     echo $randomLettersArr[$i] . " ";
// }
// echo "<br>";
// echo "<br>";
// for ($i = 0; $i < count($letters); $i++) {
//     echo $letters[$i] . " ";
// }
