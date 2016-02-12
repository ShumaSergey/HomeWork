<?php
// 19. Составьте массив дней недели. С помощью цикла foreach выведите
// все дни недели, а текущий день выведите курсивом. Текущий день должен
// храниться в переменной $day.
$arr = array('Monday', 'Tuesday', 'Wednesday', 'Tuesday', 'Friday', 'Saturday', 'Sunday');
foreach($arr as $key => $item){
    if (date("l") == $item) {
        echo " ";
        echo '<i>';
        echo '<b>';
        echo $item;
        echo '</b>';
        echo '</i>';
    }else{
        echo " ";
        echo $item;
    }
}