<?php
//5. Дан массив $arr с ключами 'Коля', 'Вася', 'Петя' с элементами '200', '300', '400'. С помощью цикла foreach
// выведите на экран столбец строк такого формата: 'Коля — зарплата 200 долларов.'.
    $arr = array('Коля' => '200', 'Вася' => '300', 'Петя' => '400');
    foreach ($arr as $key => $item)
    {
        echo "{$key} - зарплата {$item} долларов.";
        echo '<br>';
    }
?>