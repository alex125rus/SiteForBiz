<?php
    session_start();
    require_once("dbconnect.php");
    require_once("header.html");
?>
<head>
<title>Главная</title>
</head>

<body>
    <?php
    require_once("menu.html");
    ?>
    <div class="top" class="center">
        <br>
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
    <?php
    require_once("down.html");
    ?>
</body>