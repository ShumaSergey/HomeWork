<?php
//8. Расширьте конструкцию if из п.5-7, выводя фразу: "Неизвестный возраст" при условии, что значение переменной age является отрицательным числом, или вовсе числом не является.
    $age = 'sss';
    if (($age > 18)&&($age < 59)) echo 'Вам еще работать и работать';
        else if ($age > 59) echo 'Вам пора на пенсию';
            else if (($age < 18)&& ($age > 0)) echo 'Вам еще рано работать';
                else if (($age < 0)||($age == 0)||((bool)$age)) echo 'Неизвестный возраст';
?>