<?php
session_start();
require_once("dbconnect.php");
function redirect_to($address_page = "rss.php",$site = "http://f96414jz.beget.tech")
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
if(isset($_POST["chanel"]) && !empty($_POST["chanel"]))
{
    $result_delete = $mysqli->query("DELETE FROM `linkNews` WHERE `id` ='" . $_POST["chanel"]."'");
    if(!$result_delete)
    {
        exit("ERROR");
    }else
    {
        redirect_to();
    }
}
?>