<?php
/**
 * 5. Написать функцию, которая выводит список файлов в заданной
 * директории, которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */

function listOfFile($dir, $searchWord){
    $arrayList = scandir($dir);
    $searchWord = mb_strtolower($searchWord);
    foreach ($arrayList as $index => $item) {
        $arrayList[$index] = mb_strtolower($item);
    }
    foreach ($arrayList as $item) {
       $find = strpos($item, $searchWord);
        if ($find !== false){
            echo $item . "<br>";
        }
    }
}

$dir = 'C:';
$searchWord = 'boot';

listOfFile($dir, $searchWord);
