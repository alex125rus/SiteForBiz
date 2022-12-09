<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
    require_once("header.html");
    include "count.php";
?>
<head>
<title>Регистрация</title>
</head>

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" href="http://f96414jz.beget.tech/favicon.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(
        function() {
            "use strict"
            $("input[name=password]").blur(
                function() {
                    if ($(this).val().length < 6 || $(this).val().length > 20) {
                        $('#error_password_message').text(
                            'Минимальная длина пароля 6 символов.Максимальная длина пароля 20 символов.');
                        $('input[type=submit]').attr('disabled', true);
                    } else {
                        $('#error_password_message').empty();
                        $('input[type=submit]').attr('disabled', false);
                    }
                }
            )
        }
    );
    </script>
</head>

<body>
    <?php
    require_once("menu.html");
    ?>
    <div class="center">
        <?php
    if(isset($_SESSION["server_messages"]))
    {
        echo $_SESSION["server_messages"];

        unset($_SESSION["server_messages"]);
    }
    ?>
    </div>
    <div class="center">
        <h2>Форма регистрации</h2>
        <form action="register.php" method="POST" name="Form_register">
            <div class="center">
                <?php
                if(isset($_COOKIE["registration_php|login"]) && !empty(trim($_COOKIE["registration_php|login"])))
                {
                    echo "<input type='text' name='login' minlength='2' , maxlength='20' require placeholder='Логин' value='".trim($_COOKIE["registration_php|login"]). "' />";
                }else
                {
                    echo "<input type='text' name='login' minlength='2' , maxlength='20' require placeholder='Логин' />";
                }
                echo "<br>";
                echo "<br>";
                if(isset($_COOKIE["registration_php|password"]) && !empty(trim($_COOKIE["registration_php|password"])))
                {
                    echo "<input type='password' name='password' minlength='6' , maxlength='20' require placeholder='Пароль'  value='".trim($_COOKIE["registration_php|password"]). "' />";
                }else
                {
                    echo "<input type='password' name='password' minlength='6' , maxlength='20' require placeholder='Пароль' />";
                }
                echo "<br>";
                echo "<br>";               
                ?>
                <input type="password" name="passwordCheck" minlength="6" , maxlength="20" require
                    placeholder="Повторите пароль" />
                <br>
                <br>
                <img src="captcha.php" alt="капча" /><br>
                <input type="text" name="captcha" require />
                <br>
                <br>
                <input type="submit" name="btn_submit_register" value="Зарегистрироваться">
                <br>
                <br>
                <a href="authorization.php">Уже зарегестрированы?</a>
            </div>
        </form>

    </div>
    <?php
    require_once("down.php");
    ?>
</body>