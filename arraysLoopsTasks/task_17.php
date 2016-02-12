<?php
// 17.Сосктавьте массив месяцев. С помощью цикла foreach выведите все
// месяцы, а текущий месяц выведите жирным. Текущий месяц должен
// храниться в переменной $month.
$arr = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
foreach($arr as $key => $item){
    if (date("F") == $item) {
        echo " ";
        echo '<b>';
        echo $item;
        echo '</b>';
    }else{
        echo " ";
        echo $item;
    }
}