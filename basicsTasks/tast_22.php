<?php
//22. Приведите число -20 к типу boolean. Объясните результат.
$a = -20;
$a = (bool)$a;
var_dump($a);
//При преобразовании в логический тип, следующие значения рассматриваются как FALSE:
//Сам булев FALSE
//целое 0 (ноль)
//число с плавающей точкой 0.0 (ноль)
//пустая строка и строка "0"
//массив с нулевыми элементами
//объект с нулевыми переменными-членами
//специальный тип NULL (включая неустановленные переменные)
//Все остальные значения рассматриваются как TRUE (включая любой ресурс).
?>