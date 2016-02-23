<?php
/**
 * 9. Написать функцию, которая переворачивает строку.
 * Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
 */
// создаю табличку в ней форму.
echo "<table>";
echo "<form action=\"\" name=\"myform\" method=\"post\">";
echo "<tr>";
echo "<td>";
echo "<textarea name=\"userSTR\" cols=\"35\" rows =\"5\" placeholder = \"Введите текст .... \"></textarea>";
echo "</td>";
echo "<td>";
echo "<input name=\"Submit\" type=submit value=\"!ПЕРЕВЕРНУТЬ!\">";
echo "</td>";
echo "</table>";
echo "</form>";

function explodeString($str){
    $arrStr = str_split($str);
    $sizeArr = count($arrStr);
    for ($i = $sizeArr - 1; $i >= 0; $i--) {
        echo $arrStr[$i];
    }
}

$userString = $_POST['userSTR'];

explodeString($userString);




