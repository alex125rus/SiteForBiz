<?php
    session_start();
    require_once("dbconnect.php");
    require_once("header.html");
    include "count.php";
?>
<head>
<title>Дополнительно</title>
</head>
<body>
    <?php
    require_once("menu.html");
    ?>
    <div class="center">
        <h1>Дополнительно</h1>
        <br><br>
    </div class = "center">
    <div class="center">
    <h2>Последняя экранизация</h2><br>
    <img src="orig.jfif" alt="постер" class="center">
    </div>
    <?php
    require_once("down.php");
    ?>
</body>