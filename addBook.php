<?php
session_start();
require_once("dbconnect.php");
function redirect_to($message, $address_page = "addBookInBd.php",$site = "http://f96414jz.beget.tech")
{
    $_SESSION["server_messages"] = $message;
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
if(isset($_POST["button_add"]) && !empty($_POST["button_add"]))
{
    if(isset($_POST["name"]) && !empty(trim($_POST["name"])))
    {
        if(isset($_POST["author"]) && !empty(trim($_POST["author"])))
        {
            if(isset($_POST["year"]) && !empty(trim($_POST["year"])))
            {
                if(isset($_POST["count"]) && !empty(trim($_POST["count"])))
                {
                    if(isset($_POST["country"]) && !empty(trim($_POST["country"])))
                    {
                        if(isset($_POST["hero"]) && !empty(trim($_POST["hero"])))
                        {
                            $result_select_add = $mysqli->query("INSERT INTO `title`(`Name`, `Author`, `Date`, `Count`, `Country`, `Hero`) VALUES ('".trim($_POST["name"])."','".trim($_POST["author"])."',".trim($_POST["year"]).",".trim($_POST["count"]).",'".trim($_POST["country"])."','".trim($_POST["country"])."')");
                            if(!$result_select_add)
                            {
                                exit("ERROR");
                            }else
                            {
                                $mes = "<p class='mesage_error'><h3>Запись добавлена</h3></p>";
                                redirect_to($mes);
                            }
                        }else
                        {
                            $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите героя </p>";
                            redirect_to($mes);
                        }
                    }else
                    {
                        $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите страну </p>";
                        redirect_to($mes);
                    }
                }else
                {
                    $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите количество страниц </p>";
                    redirect_to($mes);
                }
            }else
            {
                $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите год </p>";
                redirect_to($mes);
            }
        }else
        {
            $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите автора </p>";
            redirect_to($mes);
        }
    }else
    {
        $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите имя </p>";
        redirect_to($mes);
    }
}
?>