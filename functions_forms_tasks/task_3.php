<?php
/**
 * 3. Есть текстовый файл. Необходимо удалить из него все слова,
 * длина которых превыщает N символов. Значение N задавать через форму.
 * Проверить работу на кириллических строках - найти ошибку, найти решение.
 */

echo "<form action=\"\" name=\"myform\" method=\"get\">";
echo "<textarea name=\"msg1\" cols=\"25\" placeholder = \"ВВедите длину слова = N символов \"></textarea>";
echo "<input name=\"Submit\" type=submit value=\"Отправить данные\">";
echo "</form>";

function deleteLongerThis($fileText, $lengthWorld) {
    $fileArray = file($fileText, FILE_SKIP_EMPTY_LINES);
    $textString = join(' ', $fileArray);
    $fileArray = explode(' ', $textString);

    foreach ($fileArray as $index => $item) {
        if ($lengthWorld < strlen($item)){
            unset($fileArray[$index]);
        }
    }

    $textString = join(' ', $fileArray);

    $f = fopen($fileText, 'w');
    fwrite($f, $textString);
    fclose($f);

}

if ($_GET){
    $lengthWorld = $_GET['msg1'];
    $fileText = 'text.txt';
    deleteLongerThis($fileText, $lengthWorld);
}
