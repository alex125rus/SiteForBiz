<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" href="http://f96414jz.beget.tech/favicon.svg" type="image/x-icon">
</head>

<body>
    <header>
        <h1 class="center">Сервис по выбору детективов</h1>
    </header>
    <div class="top" class="center">
        <ul class="topmenu center">
            <li>
                <a href="index.php">Главная</a>
            </li>
            <li>
                <a href="contacts.php">Контакты</a>
            </li>
            <li>
                <a href="xml.php">XML</a>
            </li>
            <li>
                <a href="services.php">Сервисы</a>
            </li>
            <li>
                <a href="rss.php">RSS</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Приложение</a>
                <div class="dropdown-content">
                    <a href="#">Поиск</a>
                    <a href="#">Редактировать записи</a>
                    <a href="statistic.php">Статистика</a>
                </div>
            </li>
        </ul>
        <div class="center">
            <table border="1" style="display: inline-block;">
                <tr>
                    <th>Автор</th>
                    <th>Количество книг на сайте</th>
                </tr>
                <?php
            $host = 'localhost';
            $data = 'f96414jz_deteciv';
            $user = 'f96414jz_deteciv';
            $pass = 'R5hXcP0n';
            $connection = new mysqli($host,$user,$pass,$data);
            if($connection->connect_error)die($connection->connect_error);
            $query = 'SELECT MAX(Author) as name, Count(Author) as count FROM title';
            $result = $connection->query($query);
            if(!$result)die('Error result');
            $rows = $result->num_rows;
            $cat = mysqli_fetch_all($result,MYSQLI_ASSOC);
            for($i =0;$i<$rows;++$i)
            {
                echo '<tr>';
                echo '<td>' .$cat[0]['name'].'</td>';
                echo '<td>' .$cat[0]['count'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
            ?>
        </div>
        <br>
        <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="center">Copyright © 2022 Дуванова Анастасия</div>
        <div class="center">
            <label>Добро пожаловать!</label>
            <br>
            <label>Вы находитесь на главной странице.</label>
            <br>
            <label>Данный сайт реализован в рамках лабораторного практикума</label>
            <br>
            <label>По предмету "Web программирование".</label>
            <br>
            <label>Для взаимодествия с БД "Детективы" нажмите на кнопку "Приложение".</label>
        </div>
        <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="center">Copyright © 2022 Дуванова Анастасия</div>
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