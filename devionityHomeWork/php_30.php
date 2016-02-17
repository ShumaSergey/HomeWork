<?php
/*
Создать форму с полями username, email, message. Сериализовать данные, полученные при отправке формы и вывести
полученную строку на экран.
 */
echo "<form action=\"\" name=\"myform\" method=\"get\">";
echo "<input type=\"text\" name=\"Name\" size=\"50\">";
echo "<input type=\"email\" name=\"email\" size=\"50\">";
echo "<textarea name=\"msg\" cols=\"20\" rows=\"10\" ></textarea>";
echo "<input name=\"Submit\" type=submit value=\"Отправить данные\">";
echo "</form>";

$userName = $_GET["Name"];
$userEmail = $_GET['email'];
$userMsg = $_GET['msg'];

echo $userName."<br>";
echo $userEmail."<br>";
echo $userMsg."<br>";

echo serialize($_GET);
