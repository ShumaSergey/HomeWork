<?php
// 6. Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а русские — в массив $ru. $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
// $en = array('green', 'red','blue'); $ru = array('зеленый', 'красный', 'голубой');
    $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
    $en = array();
    $ru = array();
    foreach($arr as $key => $item)
    {
        array_push($en, $key);
        array_push($ru, $item);
    }
    print_r($en);
    print_r($ru);
?>