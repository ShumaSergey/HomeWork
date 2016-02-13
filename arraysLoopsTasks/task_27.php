<style>
    td {
        border: 1px solid black;
    }
</style>
<?php
/*
27. Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в таблице,
$cols - кол-во столбцов в таблице. Есть список цветов, в массиве:
$colors = array('red','yellow','blue','gray','maroon','brown','green').
Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols,
в которой все ячейки будут иметь цвета, выбранные случайным образом из массива $colors.
В каждой ячейке должно находиться случайное число.
 */

$row = 5;
$col = 5;
$colors = array('red','yellow','blue','gray','maroon','brown','green');
$color ="";
$backgroundColor = 0;

echo "<table>";
for ($i = 0; $i < $row; $i++){
    echo "<tr>";
    for ($j = 0; $j < $col; $j++) {
        $backgroundColor = rand(1,7) - 1;
        $color = $colors[$backgroundColor];
        ?>
        <td style="background: <?php echo $color; ?>"
        <?php
        echo "<td>";
        echo rand();
        echo "</td>";?>
        </td><?php
    }
    echo "</tr>";
}
echo "</table>";
?>
