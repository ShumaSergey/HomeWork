<?php
// 14. Дан массив с элементами 4, 2, 5, 19, 13, 0, 10.
// С помощью цикла foreach и оператора if проверьте есть ли в массиве
// элемент со значением $e, равном 2, 3 или 4. Если есть — выведите
// на экран 'Есть!', иначе выведите 'Нет!'.
$arr = array(4, 2, 5, 19, 13, 0, 10);
$searchFlag = false;
$e = 1;
$valueFirst = 2;
$valueSecond = 3;
$valueThree = 4;

foreach($arr as $key => $item) {
    if (($key == $e)&&(($item == $valueFirst)||($item ==  $valueSecond)||($item ==  $valueThree))) {
        $searchFlag = true;
        break;
    }
}
if ($searchFlag){
    echo 'Есть!';
    echo '<br>';
}else{
    echo 'Нет!';
    echo '<br>';
}
