<?php
//7. Расширьте конструкцию if из п.5-6, выводя фразу: "Вам еще рано работать" при условии, что значение переменной age попадает в диапазон чисел от 0 до 17 (включительно).
    $age = 1;
    if (($age > 18)&&($age < 59)) echo 'Вам еще работать и работать';
    else if ($age > 59) echo 'Вам пора на пенсию';
        else if (($age < 18)&& ($age > 0)) echo 'Вам еще рано работать';
?>