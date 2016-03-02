<?php

error_reporting(E_ALL);

require_once 'bookReviwesFunction.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="myBackground">
<main>
    <!-- навигация  -->
<!--
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="navbar navbar-fixed-top">
                    <div class="container col-lg-offset-7">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Result</a></li>
                            <li><a href="#">Process</a></li>
                            <li><a href="#">Comment</a></li>
                            <li><a href="#">About us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->

    <div class="container">
        <div class="row">
            <!-- создаю форму ввода через div -->
            <div class="col-lg-10 col-lg-offset-1 myBorder">
                <!-- емблемка страници -->
                <div class="col-lg-1">
                    <i class="fa fa-book fa-5x myColor"></i>
                </div>
                <!-- заголовок страници -->
                <div class="col-lg myHeader">
                    <h1>Hello Friend, here you can leave your comment!</h1>
                </div>
                <!-- создаю ряд с полем ввода Имени Гостя и 3 кнопки -->
                <form action="comment.php" method="post">
                    <div class="row">
                        <p>
                            <!-- поле ввода Имени -->
                            <div class="col-lg-3">
                                <input name="userName" placeholder="Type user name" class="form-control center-block">
                            </div>
                            <!-- Кнопка отправить коммент -->
                            <div class="col-lg-2">
                                <button type="submit" name="send" class="btn btn-danger btn-block">Send comment</button>
                            </div>
                            <!-- Кнопка для вывода спойлера информации (о правилах "Гостевой Книги") -->
                            <div class="col-lg-2 col-lg-offset-1">
                                <button type="button"
                                        name="inform"
                                        class="btn btn-danger btn-block spoiler collapsed"
                                        data-toggle="collapse"
                                        data-target="#information"><i class="fa fa-info-circle"> Info
                                        </i>
                                </button>
                            </div>
                            <!-- КНопка для регистрации -->
                            <div class="col-lg-2">
                                <button type="button"
                                        name="register"
                                        class="btn btn-danger btn-block"
                                        data-toggle="modal"
                                        data-target="#modalSigIn">Sing in
                                        <i class="fa fa-user-plus"></i>
                                </button>
                            </div>
                            <!-- Кнопка уже для зарегестрированых пользователей -->
                            <div class="col-lg-2">
                                <button type="button"
                                        name="enter"
                                        class="btn btn-danger btn-block"
                                        data-toggle="modal"
                                        data-target="#modalEnter">Enter
                                    <i class="fa fa-sign-in"></i>
                                </button>
                            </div>
                        </p>
                    </div>
                    <!-- СПОЙЛЕР для информации (о правилах "Гостевой Книги") -->
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-9">
                            <div class="collapse" id="information">
                                <div class="well">
                                    <h1>Do not use foul language, please!</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Поле для ввода коментария -->
                    <div class="row">
                        <p>
                            <div class="col-lg-12">
                                <textarea class="form-control center-block"
                                          rows="5"
                                          name="userMessage"
                                          placeholder="Type your comment ....."></textarea>
                            </div>
                        </p>
                    </div>
                    <!-- поле ввода матерных слов для бана -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php

                            addNewUser();
                            enterUser();

                            $message = getComment();
                            $message = addComment($message);
                            showComment($message);
                            ?>
                        </div>
                    </div>
                </form>
                <!-- вызов функции для запеси в файл матерных слов -->
                <?php
                    addFoulWords();
                ?>
            </div>
        </div>
    </div>

    <!-- мадельное окно для Регистрации -->
    <div class="modal fade" id="modalSigIn">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title text-info">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <form action="comment.php" method="post">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input type="text"
                                                   name="userNameRegister"
                                                   placeholder="Type your name"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input type="password"
                                                   name="userPasswordRegister"
                                                   placeholder="Type your password"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input type="email"
                                                   name="userMailRegister"
                                                   placeholder="Type your email"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <button type="submit"
                                                    name="enterRegister"
                                                    class="btn btn-success"
                                            >Enter
                                            <i class="fa fa-sign-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- мадельное окно для Входа уже зарегистрированого пользователя -->
    <div class="modal fade" id="modalEnter">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title text-info">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <form action="comment.php" method="post">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input type="text"
                                                   name="userNameEnter"
                                                   placeholder="Type your name"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input type="password"
                                                   name="userPasswordEnter"
                                                   placeholder="Type your password"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <button type="submit"
                                                    name="enterEnter"
                                                    class="btn btn-success"
                                            >Enter
                                                <i class="fa fa-sign-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</main>
</body>
</html>