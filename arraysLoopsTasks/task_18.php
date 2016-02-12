<?php
// 18. Составьте массив дней недели. С помощью цикла foreach выведите
// все дни недели, выходные дни следует вывести жирным.
$arr = array('Monday', 'Tuesday', 'Wednesday', 'Tuesday', 'Friday', 'Saturday', 'Sunday');
foreach($arr as $key => $item){
    if (($item == 'Saturday') || ($item == 'Sunday')) {
        echo " ";
        echo '<b>';
        echo $item;
        echo '</b>';
    }else{
        echo " ";
        echo $item;
    }
}