<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Manager</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- создаю шапку с названием сайта -->
<header>
    <div class="container myHeaderB">
        <div class="row">
            <div class="col-lg-1">
                <i class="fa fa-black-tie fa-5x myIcon"></i>
            </div>
            <div class="col-lg-10 text-center">
                <h1>File Manager</h1>
            </div>
        </div>
    </div>
</header>
<!-- создаю основную часть с выводом кталога файла и папой слева и возможности редактировать справа -->
<arcticle >
    <div class="container ">
        <div class="row">
            <div class="col-lg-5 myArticleB colHeight">
                <div class="row">
                    <div class="col-lg-offset-2">
                        <p>
                            <!-- проверяю есть ли в супермассиве данные по адресу ['filename'],
                            если есть то беру их за основу. Это будет путь к файлу/директории с которым я работаю -->
                            <?php
                                if (isset($_GET['filename'])) {
                                    $dir = $_GET['filename'];
                                } else {
                                    $dir = ".";
                                }
                                folderOrFile($dir);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- вызываю функции для редактирования файла renameFolder($dir) и директории editFile($dir) -->
            <?php
                renameFolder($dir);
                editFile($dir);
            ?>
        </div>
    </div>

</arcticle>
<footer class="footer">
    <div class="container myHeaderB">
        <p><h5><i class="fa fa-copyright"></i>  shumasergey@mail.ru</h5></p>
    </div>
</footer>

</body>
</html>

<?php

// функция что определяет файли или директорю мы имеем
function folderOrFile($dir){
    // переменная $upDir для обозначения директории выше той в которой мы находимся
    $upDir = dirname(realpath($dir));

    // проверка на то что находится в переменной $dir
    // 1. если находится папка, то я вывожу слева все что есть в папке,
    // справа возможность редакрирования папки: ИЗМЕНИТЬ имя папки
    if (is_dir(realpath($dir))) {

        // вывыожу стрелу которая есть сслыкой на директорию выше даной
        echo "<div class=row>";
        echo "<div class=\"col-lg-offset-1 col-lg-11\">";
        echo "<a href=?filename={$upDir} class=\"btn btn-default btn-block myArticleB myTextRight\"><i class=\"fa fa-arrow-left\"></i> {$upDir} </a>";
        echo "</div>";
        echo "</div>";

        // вывожу название папки в которой я нахожусь
        $oldDir = basename(realpath($dir));
        echo "<div class=row>";
        echo "<div class=\"col-lg-offset-1 col-lg-11\">";
        echo "<a href='#' class=\"btn btn-success btn-block myTextRight\"> <i class=\"fa fa-folder\"></i> {$oldDir} </a>";
        echo "</div>";
        echo "</div>";

        // получаю реальный путь к моей папке
        $newDir = realpath($dir);
        // полкчаю массив с елементами = елементы папки
        $dir = scandir($dir);

        // иду по масиву для вывода содержимого
        foreach ($dir as $filename) {
            // перекодировка русских символов
            $filename = iconv("Windows-1252", "UTF-8//TRANSLIT", $filename);
            // полуяаю новый елемент сдвинуты на 1-lg влево от названия папки
            echo "<div class=\"col-lg-offset-1\">";
            if (($filename != ".") && ($filename != "..")) {
                // если папка то вывожу папку
                if (is_dir("{$newDir}/{$filename}")) {
                    haveFolder($newDir, $filename);
                }
                // если файл то вывожу файл
                if (is_file("{$newDir}/{$filename}")) {
                    haveFile($newDir, $filename);
                }
            }
            echo "</div>";
        }

        // проверка на то что находится в переменной $dir
        // 2. если находится файл, то я вывожу слева название файла,
        // справа возможность редакрирования файла
    } elseif (is_file(realpath($dir))) {

        // вывожу стрелку влево для перемищения на каталог выше
        echo "<div class=row>";

        echo "<div class=\"col-lg-offset-1 col-lg-11\">";
        echo "<a href=?filename={$upDir} class=\"btn btn-default btn-block myArticleB myTextRight\"><i class=\"fa fa-arrow-left\"></i>  {$upDir}  </a>";
        echo "</div>";

        echo "</div>";

        // вывожу файл выделеного цвета
        $oldDir = basename(realpath($dir));

        echo "<div class=row>";

        echo "<div class=\"col-lg-offset-1 col-lg-11\">";
        echo "<a href='#' class=\"btn btn-success btn-block myTextRight\"> <i class=\"fa fa-file\"></i> {$oldDir} </a>";
        echo "</div>";

        echo "</div>";
    }
}

// вывожу новую кнопку=ссылку со значком "папки" если е меня в переменной $filename папка. $newDir - путь к папке
function haveFolder($newDir, $filename){
    $realPath = $newDir . '\\' . $filename;
    echo "<div class=\"col-lg-offset-1\">";
    echo "<a href=?filename={$realPath} class=\"btn btn-default btn-block myArticleB myTextRight\"> <i class=\"fa fa-folder\"></i> {$filename} </a>";
    echo "</div>";
}

// вывожу новую кнопку=ссылку со значком "файла" если е меня в переменной $filename файл. $newDir - путь к фалу
function haveFile($newDir, $filename){
    $realPath = $newDir . '\\' . $filename;
    echo "<div class=\"col-lg-offset-1\">";
    echo "<a href=?filename={$realPath} class=\"btn btn-default btn-block myArticleB myTextRight\"> <i class=\"fa fa-file\"></i> {$filename} </a>";
    echo "</div>";
}


// редактирование файла
function editFile($dir){
    // проверка на то что в $_GET['filename'] попал путь по которому расположен файл
    if (is_file(realpath($dir))) {
        // создаю контейнер с формой для редактирования файла
        echo "<div class=\"col-lg-7 myArticleB colHeight\">";
        // проветка на наличие в $_GET['filename'] контента для редактирования файла
            if (isset($_GET['filename'])) {
                // в переменную $strNameDir записываю путь к файла с которым я работаю
                $strNameDir = $_GET['filename'];
                echo "<form action=\"\" method=\"post\">";
                // получаю контент файла с которым я работаю в формате htmlspecialchars
                // и вывоже контент в текс-ери для редактирования
                $content = htmlspecialchars(file_get_contents($strNameDir));
                echo "<textarea name=\"content\" cols=\"90\" rows=\"24\">{$content}</textarea>";
                // в закрытое поле с тем же именем что и у $_GET['filename'] заношу значения
                // в $_POST['filename'] данные переменной $strNameDir (путь к файлу)
                // для того чтобы получить тотже путь к файлу с которым я работаю
                echo "<input type=\"hidden\" name=\"filename\" value=\"{$strNameDir}\">";
                echo "<button type=\"submit\" name=\"edit\" class=\"btn btn-default myArticleB\"> Send <i class=\"fa fa-angle-double-right\"></i></button>";
                echo "</form>";
                // если я нажал на кнопку редактирования файла ТО:
                if (isset($_POST['edit'])) {
                    // в файл что росположен в указаном пути $_POST['filename']
                    // заношу изменения из текст-ерии $_POST['content']
                    file_put_contents($_POST['filename'], $_POST['content']);
                }
            }
        echo "</div>";
    }
}

function renameFolder($dir){

    // проверка на наличие папки по указаному пути с переменной $dir
    if (is_dir(realpath($dir))){
        // фиксирую переменную с реальним путем к папке
        $oldDir = realpath($dir);
        // создаю контейнер с формой для ввода нового названия папки
        echo "<div class=\"col-lg-7 myArticleB colHeight\">";
        echo "<div>";
        echo "<h5 class='text-center'>Если вы хотите изменить имя папки введите его и нажмите отправить!</h5>";
        echo "</div>";
        echo "<div class='col-lg-offset-4'>";
        echo "<form action=\"\" method=\"post\">";
        echo "<input type='text' name=\"content\" >";
        echo "<button type=\"submit\" name=\"edit\" class=\"btn btn-default myArticleB\"> Send <i class=\"fa fa-angle-double-right\"></i></button>";
        echo "</form>";
        echo "<div>";
        // проверка на нажатие кнопки для редактирования (переименования) папки
        if (isset($_POST['edit'])) {
            rename($oldDir, $_POST['content']);  // переименование папки
        }
        echo "</div>";
    }

}

?>

