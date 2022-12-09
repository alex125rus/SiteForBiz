<?php
session_start();
require_once("dbconnect.php");
if((isset($_SESSION["aut_login"]) && !empty(trim($_SESSION["aut_login"]))) && (isset($_SESSION["aut_password"]) && !empty(trim($_SESSION["aut_password"]))))
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $address_site."/addBookInBd.php");
}else
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $address_site."/authorization1.php");
}
?>