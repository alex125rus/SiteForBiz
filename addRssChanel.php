<?php
session_start();
require_once("dbconnect.php");

function redirect_to($address_page = "rss.php",$site = "http://f96414jz.beget.tech")
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
if(isset($_POST["rssurl"]) && !empty(trim($_POST["rssurl"])))
{
    $res_insert = $mysqli->query("INSERT INTO `linkNews`(`idUser`, `linck`) VALUES ('".$_SESSION["aut_id"]."','".$_POST["rssurl"]."')");
    if(!$res_insert)
    {
        exit("ERROR");
    }else
    {
        redirect_to("rssforming.php");
    }
}