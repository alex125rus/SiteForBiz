<?php
session_start();
require_once("dbconnect.php");
$_SESSION["error_messages"] = '';
$_SESSION["success_messages"] = '';

function redirect_to($message, $address_page,$site = "http://f96414jz.beget.tech")
{
    $_SESSION["server_messages"] = $message;
    header("HTTP/1.1 301 Moved Permanently");
        header("Location: ". $site."/".$address_page);
        exit();
}
function saveCookisForPage($name,$page = "registration_php")
{
    setcookie($page ."|" . $name , trim($_POST["$name"]),time() + 3600);
}
if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"]))
{
    if(isset($_POST["login"]) && !empty(trim($_POST["login"])))
    {
        saveCookisForPage("login");
        if(isset($_POST["password"]) && !empty(trim($_POST["password"])))
        {
            saveCookisForPage("password");
            if((isset($_POST["passwordCheck"]) && !empty(trim($_POST["passwordCheck"]))) && trim($_POST["password"]) == trim($_POST["passwordCheck"]) )
            {
                $captcha = trim($_POST["captcha"]);
                if(isset($_POST["captcha"]) && !empty($captcha))
                {
                    if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                    $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Вы ввели неправильную капчу </p>";
                    redirect_to($error_message,"registration.php");
                    }else{
                        //написание добавление строки в бд
                    }
                }else{
                    $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Отсутствует проверечный код, то есть код капчи </p>";
                    redirect_to($error_message,"registration.php");

                }
            }else{
                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Пароли не совпадают </p>";
                redirect_to($error_message,"registration.php");
            }
        }else{
            $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Пароль не введен </p>";
            redirect_to($error_message,"registration.php");
        }
    }else
    {
            $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Логин не введен </p>";
            redirect_to($error_message,"registration.php");
    }
}else
{
    exit("<div class='center'><p><strong>Ошибка</strong>Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site.">главную страницу</a>.</p></div>");
}
?>