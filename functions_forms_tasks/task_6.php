<?php
/**
 * 6. Создать страницу, на которой можно загрузить несколько фотографий в галерею.
 * Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
 */


// указываю путь к папке куда буду прермещать файлы
$uploadsDir = 'gallery';

echo "<table>";
echo "<tr>";
// иду по циклу вложеного массива ФАЙЛ проверяя на наличее ошибок
foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        // присваиваем значение $tmp_name имя нашего файла, что дал сервер файлу в момент загрузки
        $tmpName = $_FILES["pictures"]["tmp_name"][$key];
        $name = $_FILES["pictures"]["name"][$key];
        // КОПИРУЮ (?!) файли в папку functions_forms_tasks\gallery
        move_uploaded_file($tmpName, "$uploadsDir/$name");
    }
}
echo "</tr>";
echo "</table>";

// создаю массив из названий файло в папке, после УДАЛЯЮ . и .. первых два елемента
// массива, после сортирую для того что бы елементы начинались с 0-го индекса
$picturesName = scandir($uploadsDir);
unset($picturesName[0],$picturesName[1]);
sort($picturesName);

// мин и макс итераторы цикла : иду по массиву от мин до макс
$min = 0;
$max = count($picturesName);

// создаю таблицу с одной строчкой и ячейками по количеству фоток загруженых рание
echo "<table>";
echo "<tr>";
for ($i = 0; $i < $max; $i++) {
    // $picturesDir переменная в которую я указываю путь и название файла
    $picturesDir = $uploadsDir . "/" . $picturesName[$i];
    echo "<td>";
    echo "<img src=\"$picturesDir\">";
    echo "</td>";
}
echo "</tr>";
echo "</table>";


