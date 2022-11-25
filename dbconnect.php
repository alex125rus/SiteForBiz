<?php
    header('Content-Type: text/html; charset= utf-8');
    $host = 'localhost';
    $data = 'f96414jz_deteciv';
    $user = 'f96414jz_deteciv';
    $pass = 'R5hXcP0n';
    $mysqli = new mysqli($host,$user,$pass,$data);
    if(!$mysqli)
    {
        die("<p>Ошибка подключения к БД</p><p>Код ошибки :" .mysqli_connect_errno()."</p>"."<p>Описание ошибки: ".mysqli_connect_error()."</p>");
    }
    $mysqli->set_charset('utf8');
    $address_site = "http://f96414jz.beget.tech";
?>