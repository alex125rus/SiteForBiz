<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" href="http://f96414jz.beget.tech/favicon.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(
            function(){
                "use strict"
                $("input[name=password]").blur(
                    function(){
                        if($(this).val().length < 6 || $(this).val().length > 20)
                        {
                            $('#error_password_message').text('Минимальная длина пароля 6 символов.Максимальная длина пароля 20 символов.');
                            $('input[type=submit]').attr('disabled',true);
                        }else
                        {
                            $('#error_password_message').empty();
                            $('input[type=submit]').attr('disabled',false);
                        }
                    }
                )
            }
        );

    </script>
</head>

<body>
    <header>
        <h1 class="center">Сервис по выбору детективов</h1>
    </header>
    <div class="center">
    <?php
    if(isset($_SESSION["error_messages"]))
    {
        echo $_SESSION["error_messages"];

        unset($_SESSION["error_messages"]);
    }
    ?>
    </div>
    <div class="center">
        <h2>Форма авторизации</h2>
        <form action="author.php" method="POST" name="Form_author">
            <div class="center">
                <?php
                if(isset($_COOKIE["login"]) && !empty(trim($_COOKIE["login"])))
                {
                    echo "<input type='text' name='login' minlength='2' , maxlength='20' require placeholder='Логин' value='".trim($_COOKIE["login"]). "' />";
                }else
                {
                    echo "<input type='text' name='login' minlength='2' , maxlength='20' require placeholder='Логин' />";
                }
                echo "<br>";
                echo "<br>";
                if(isset($_COOKIE["password"]) && !empty(trim($_COOKIE["password"])))
                {
                    echo "<input type='password' name='password' minlength='6' , maxlength='20' require placeholder='Пароль'  value='".trim($_COOKIE["password"]). "' />";
                }else
                {
                    echo "<input type='password' name='password' minlength='6' , maxlength='20' require placeholder='Пароль' />";
                }
                echo "<br>";
                echo "<br>";               
                ?>
                <img src="captcha.php" alt="капча"/><br>
                <input type="text" name = "captcha" require/>
                <br>
                <br>
                <input type="submit" name="btn_submit_register" value="Авторизироваться">
                <br>
                <br>
                <a href="registration.php">Зарегестрироваться?</a>
            </div>
        </form>
        
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!--<div class="center">Copyright © 2022 Дуванова Анастасия</div> -->
    <div class="center">
        <!-- Yandex.Metrika informer -->
        <a href="https://metrika.yandex.ru/stat/?id=91098061&amp;from=informer" target="_blank" rel="nofollow"><img
                src="https://informer.yandex.ru/informer/91098061/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"
                title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"
                class="ym-advanced-informer" data-cid="91098061" data-lang="ru" /></a>
        <!-- /Yandex.Metrika informer -->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode
                .insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(91098061, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
        </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/91098061" style="position:absolute; left:-9999px;" alt="" /></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->
    </div>
</body>