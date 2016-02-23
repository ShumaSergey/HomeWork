<?php

error_reporting(E_ALL);

require_once 'bookReviwesFunction.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="styleLesson8.css">
</head>
<body >
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <table class="borderEnterComment">
                <form action="bookReviwes.php" method="post">
                    <tr >
                        <td>
                            <p>Введите свое имя</p>
                        </td>
                        <td>
                            <input type="text" name="userName">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p> Оставте свой коментарий</p>
                        </td>
                        <td>
                            <textarea name="userMessage" cols="30" rows="6"> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Отправить коментарий!">
                        </td>
                    </tr>
                </form>
            </table>

            <?php
            $message = getComment();
            $message = addComment($message);
            showComment($message);
            ?>
        </div>
    </div>
</div>
</body>
</html>