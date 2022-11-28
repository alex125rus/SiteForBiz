<?php
session_start();
require_once("dbconnect.php");
function redirect_to($message, $address_page = "authorization.php",$site = "http://f96414jz.beget.tech")
{
    $_SESSION["server_messages"] = $message;
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
function saveCookisForPage($name)
{
    $_SESSION["aut_$name"] = trim($_POST["$name"]);
    //setcookie($page ."|" . $name , trim($_POST["$name"]),time() + 3600);
}
if(isset($_POST["btn_submit_author"]) && !empty($_POST["btn_submit_author"]))
{
    if(isset($_POST["login"]) && !empty(trim($_POST["login"])))
    {
        if(isset($_POST["password"]) && !empty(trim($_POST["password"])))
        {
            $result_query_select = $mysqli->query("SELECT * FROM `users` WHERE login = '".trim($_POST["login"])."' AND password = '" .trim($_POST["password"])."'" );
            if(!$result_query_select)
            {
                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Ошибка в запросе к БД, при проверке пользователя</p>";
                redirect_to($error_message);
            }
            if($result_query_select->num_rows != 1)
            {
                $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Пользователь с такой комбинаией логина и пароля не найдено</p>";
                redirect_to($error_message);
            }
            $cat = mysqli_fetch_all($result_query_select,MYSQLI_ASSOC);
            saveCookisForPage("login");
            saveCookisForPage("password");
            $_SESSION["aut_id"] = $cat[0]["id"];
            $meas = "Авторизация успешна";
            redirect_to($meas,"rss.php");
            
        }else{
            $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Пароль не введен </p>";
            redirect_to($error_message);
        }
    }else
    {
            $error_message = "<p class='mesage_error'><strong>Ошибка!</strong> Логин не введен </p>";
            redirect_to($error_message);
    }
}else
{
    exit("<div class='center'><p><strong>Ошибка</strong>Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site.">главную страницу</a>.</p></div>");
}
?>