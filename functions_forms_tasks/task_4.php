<?php
/**
 * 4. Написать функцию, которая выводит список файлов в заданной
 * директории. Директория задается как параметр функции.
 */
function listOfFile($dir){
    $arrayList = scandir($dir);
    foreach ($arrayList as $item) {
        echo $item . "<br>";
    }
}

$dir = 'C:';

listOfFile($dir);