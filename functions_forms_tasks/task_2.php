<?php
/*
2. Создать форму с элементом textarea.
При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте.
Реализовать с помощью функции.
 */
echo "<form action=\"\" name=\"myform\" method=\"get\">";
echo "<textarea name=\"msg1\" cols=\"30\" rows=\"10\" ></textarea>";
echo "<input name=\"Submit\" type=submit value=\"Отправить данные\">";
echo "</form>";

$userMsg = $_GET['msg1'];
echo $userMsg . "<br>";

function findLongWorld ($userMsg, $topWorld = 3)
{
    $arrayMsg = explode(' ', $userMsg); // создал массив слов, разбив строку по ' '

    $arrWorld = array();                // создаю ассоциативный массив где в каждый массив это индекс и слово.
    $arrLongWorld = array();               // создаю массив для длины слов, что бы узнать максимальное слово

    foreach ($arrayMsg as $index => $item) {
        $arrWorld[$index] = array($index, $item, strlen($item));
    }

    foreach ($arrWorld as $index => $item) {
        $arrLongWorld[$index] = $item[2];
    }

    rsort($arrLongWorld);
    $size = count($arrLongWorld);

    for ($i = 0; $i < $topWorld; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($arrLongWorld[$i] == $arrWorld[$j][2]) {
                echo $arrWorld[$j][1] . "<br>";                     //  выводит ВСЕ слова с длиной равной
            }                                                       //  первым 3 елемениам массива $arrLenght
        }
    }

}

findLongWorld($userMsg);
