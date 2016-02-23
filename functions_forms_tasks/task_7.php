<?php
/**
 * 7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 */

$fileDir = 'commentTask7.txt';

}$style = "margin: 0 20% 0 20%; border: 1px solid red;";
echo "<body>";


if ($_POST['msg'] != "") {
    $string = $_POST['msg'];
    writeCommentToFile($fileDir, $string);
    getOldComment($fileDir);
}
//  header('Location: http://localhost/HomeWork/functions_forms_tasks/task_7.php');
// создаю табличку в ней форму.
echo "<div style = \"$style\">";
echo "<table>";
echo "<form action=\"\" name=\"myform\" method=\"post\">";
echo "<tr>";
echo "<textarea name=\"msg\" autofocus cols=\"110\" rows =\"10\" placeholder = \"Введите свой коментарий ..... \"></textarea>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "<input name=\"Submit\" type=submit value=\"Отправить отзыв!\">";
echo "</td>";
echo "</table>";
echo "</form>";
echo "</div>";
echo "</body>";


function writeCommentToFile($fileDir, $comment){
    $endOfComment = "THE_END";
    $comment = $comment . $endOfComment;
    $f = fopen($fileDir, 'a+');
    fwrite($f, $comment);
    fclose($f);
}

function getOldComment($fileDir){
    $stringComment = file_get_contents($fileDir);
    $arrOldComment = explode("THE_END", $stringComment);

    foreach ($arrOldComment as $index => $item) {
        $style = "margin: 0 20% 0 20%; border: 1px solid red;";
        echo "<div style = \"$style\">";
        echo "<p>";
        $str = $item;
        echo $str;
        echo "</p>";
        echo "</div>";
    }
}

