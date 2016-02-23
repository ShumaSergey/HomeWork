<?php
/*
1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать
только те слова, которые есть и в первом и во втором поле ввода. Реализацию это логики
необходимо поместить в функцию getCommonWords($a, $b), которая будет возвращать массив
с общими словами.
 */
echo "<form action=\"\" name=\"myform\" method=\"get\">";
echo "<textarea name=\"msg1\" cols=\"20\" rows=\"5\" ></textarea>";
echo "<textarea name=\"msg2\" cols=\"20\" rows=\"5\" ></textarea>";
echo "<input name=\"Submit\" type=submit value=\"Отправить данные\">";
echo "</form>";

$userMsg1 = $_GET['msg1'];
$userMsg2 = $_GET['msg2'];
echo $userMsg1 . "<br>";
echo $userMsg2 . "<br>";

function getCommonWords($userMsg1, $userMsg2){

    $arrayMsg1 = explode(' ', $userMsg1);
    $arrayMsg2 = explode(' ', $userMsg2);

    $commonWord = array_intersect($arrayMsg1, $arrayMsg2);

    if ($commonWord != null) {
        echo "<pre>";
        print_r($commonWord);
        echo "</pre>";
    } else {
        echo "Нет одинаковых слов!";
    }

// Создаю функцию ГДЕ:
//           * беру текст с textarea и росбиваю на слова по пробелам.
//           * забиваю слова в масивы + перевожу в нижний регистер.
//           * массивы сортирую по алфавиту + узнаю какой больше
//           * сравниваю слова проганяя по циклу foreach.
    /*
    $countArrayMsg1 = count($arrayMsg1);
    $countArrayMsg2 = count($arrayMsg2);
    if ($countArrayMsg1 >= $countArrayMsg2){
        for ($i = 0; $i < $countArrayMsg1; $i++) {
            for ($j = 0; $j < $countArrayMsg2; $j++) {
                if ($arrayMsg1[$i] === $arrayMsg2[$j]) {
                    echo $arrayMsg2[$i] . "<br>";
                }
            }
        }
    } else {
        for ($i = 0; $i < $countArrayMsg2; $i++) {
            for ($j = 0; $j < $countArrayMsg1; $j++) {
                if ($arrayMsg2[$i] === $arrayMsg1[$j]) {
                    echo $arrayMsg2[$i] . "<br>";
                }
            }
        }
    }
    */
}

if ($_GET) {
    getCommonWords($userMsg1, $userMsg2);
}


