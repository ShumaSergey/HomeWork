<?php
//1. Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'.
// С помощью цикла foreach выведите эти слова в столбик.
    $arr = array('html', 'css', 'php', 'js', 'lq');
    foreach($arr as $value)
    {
        echo $value;
        echo '<br>';
    }
?>