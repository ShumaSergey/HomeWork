<?php
//13. Заданы две переменные: s - длина участка, который проехал автомобиль; t - время движения в часах. Вывести скорость автомобиля на заданном участке в км/час и в м/сек.
    $s = 100;
    $t = 2;
    $vKM = $s / $t;
    $vM = ($s * 1000) / ($t * 3600);
    printf("Скорость = %.2f км/час", $vKM);
    echo '<br>';
    printf("Скорость = %.2f м/с", $vM);
?>