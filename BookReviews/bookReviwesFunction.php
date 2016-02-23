<?php

function addNewUser() {
    if (isset($_POST['enterRegister'])) {
        //  открыл файл с массивами зарегестрированых юзеров
        $f = fopen("registerUser.txt", 'a+');
        // заполняем массив $newUser с полученого запроса $_POST
        $newUser['userNameRegister'] = htmlspecialchars($_POST['userNameRegister']);
        $newUser['userPasswordRegister'] = htmlspecialchars($_POST['userPasswordRegister']);
        $newUser['userMailRegister'] = htmlspecialchars($_POST['userMailRegister']);
        $arrUserRegister[] = $newUser;
        $massageDB = serialize($arrUserRegister);
        // добавляю пробел для того что бы массив можно было разбить на массивы
        $massageDB .= " ";
        fwrite($f, $massageDB);
        fclose($f);

        return $arrUserRegister;
    }
    return false;
}

function enterUser(){
    if (isset($_POST['enterEnter'])) {
        //  данные из файла достаю и кидаю в массив состоящий из массивов уже зарегестрированых пользователей
        //  получаю массив с массивов что хранят в себе значения пароля и имени в связке. поле для email не обезательно
        $stringArrayUser = file_get_contents("registerUser.txt");
        $arrUserRegister = explode(" ", $stringArrayUser);
        foreach ($arrUserRegister as $index => $item) {
            $arrUserRegister[$index] = unserialize($item);
        }

        //  сравниваю данные о заригестрированых пользователей с данными что получил
        foreach ($arrUserRegister as $index => $item) {
            if (($item[0]['userNameRegister'] == $_POST['userNameEnter'])&&($item[0]['userPasswordRegister'] == $_POST['userPasswordEnter'])){
                // в результате вывожу конец формы, поскольку будет новая textarea для ввода матерных слов с своей кнопкой для ввода
                echo "</form>";

                echo "<form action=\"comment.php\" method=\"post\">";
                echo "<div class=\"row\">";
                    echo "<p>";
                        echo "<div class=\"col-lg-12\">";
                            echo "<textarea class='form-control center-block' rows='5' name='addFoulWords' placeholder='Add censorship....'></textarea>";
                        echo "</div>";
                    echo "</p>";
                echo "</div>";
                echo "<div class='col-lg-2'>";
                echo "<button type='submit' name='sendFoulWords' class='btn btn-danger btn-block'>Send Foul Words</button>";
                echo "</div>";
                echo "</form>";
                //  заканчиваю функцию поскольку пользоватеть найден
                return true;
            }
        }
    }
    //  заканчиваю функцию поскольку пользователя не вводили
    return false;
}

// закомментировал функцию "ляйк/нелайк комментария, поскольку пока не знаю как можно вывести значение PHP скрипта
// о определенном месте HTML
/*
function getLikeComment(){
    $likeUp = 0;
    $likeDown = 0;
    if (isset($_POST['like'])) {
        $newLike['like'] = $likeUp++;
        $message[] = $newLike;
        $massageDB = serialize($message);
        file_put_contents("text.txt", $massageDB);
        return $message;
    } elseif (isset($_POST['unlike'])) {
        $newLike['unlike'] = $likeDown++;
        $message[] = $newLike;
        $massageDB = serialize($message);
        file_put_contents("text.txt", $massageDB);
        return $message;
    }
    return $message;
}
*/

function getComment(){
    // проверяеи и зачитываем файл, возвращяю массив unserialize строки из файла
    if (is_readable("text.txt")) {
        $message = file_get_contents("text.txt");
        $message = unserialize($message);
        return $message;
    }
    return [];
}

function addComment($message){
    // проверяем отселал ли пользователь запрос
    if (isset($_POST['send'])) {
        // заношу в массив данные если пользователь отсылал запрос
        $newPost['userName'] = htmlspecialchars($_POST['userName']);
        $newPost['userMessage'] = htmlspecialchars($_POST['userMessage']);
        $message[] = $newPost;
        $massageDB = serialize($message);
        file_put_contents("text.txt", $massageDB);
    }
    return $message;
}

function showComment($message)
{
    // открываю файл и матерными словами
    $f = fopen("FoulWords.txt", 'a+');
    // получаю строку из файла. розбиваю строку на елементы массива по значению "пробела"
    $stringFoulWords = file_get_contents("FoulWords.txt");
    $cens = explode(" ", $stringFoulWords);
    $message = array_reverse($message);
    // иду мо "массиву комментария" (вбитого пользователем) и проверяю на наличее матерных слов
    foreach ($message as $key => $post) {
        foreach ($cens as $world) {
            $post['userName'] = str_ireplace($world, "CENSORED", $post['userName']);
            $post['userMessage'] = str_ireplace($world, "CENSORED", $post['userMessage']);
        }
        // создаю два елемента для вывода комментариев взависимости от четности меняю стиль
        if ($key % 2 == 0) {
            echo "<div class='pull-left col-lg-11 leftComment bg-warning'>";
            echo "<b>  {$post['userName']}</b>";
            echo "<p class='myText'> {$post['userMessage']} </p>";
            echo "<div class='row'>";
            echo "<div class='btn-group col-lg-offset-11'>";
            echo "<button type='button' name='like' class='btn btn-warning btn-xs'>
                                    <i class=\"fa fa-thumbs-o-up\"></i> 1</button>";
            echo "<button type='button' name='unlike' class='btn btn-danger btn-xs'>
                                    <i class=\"fa fa-thumbs-o-down\"></i> 1</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='pull-right col-lg-11  rightComment bg-danger'>";
            echo "<b>  {$post['userName']}</b>";
            echo "<p class='myText'> {$post['userMessage']} </p>";
            echo "<div class='row'>";
            echo "<div class='btn-group col-lg-offset-11'>";
            echo "<button type='button' name='like' class='btn btn-warning btn-xs'>
                                                <i class=\"fa fa-thumbs-o-up\"></i> 1</button>";
            echo "<button type='button' name='unlike' class='btn btn-danger btn-xs'>
                                                <i class=\"fa fa-thumbs-o-down\"></i> 1</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    fclose($f);
}

function addFoulWords() {
    // если пользователь отправлял запрос с новыми словами "матерные слова" записываю их в файл
    if (isset($_POST['addFoulWords'])) {

        $f = fopen("FoulWords.txt", 'a+');

        $stringFoulWords = file_get_contents("FoulWords.txt");
        $stringFoulWords .= " ";

        $newWords = htmlspecialchars($_POST['addFoulWords']);
        $stringFoulWords = $stringFoulWords . " " . $newWords . " ";

        fwrite($f, $stringFoulWords);
        fclose($f);
    }
}