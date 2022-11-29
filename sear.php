<?php
session_start();
require_once("dbconnect.php");
function redirect_to($message, $address_page = "search.php",$site = "http://f96414jz.beget.tech")
{
    $_SESSION["server_messages"] = $message;
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
//print_r($_POST);
if(isset($_POST["button"]) && !empty($_POST["button"]))
{
    $query = "SELECT * FROM `title` where";
    $fl = true;
    if(isset($_POST["author"]) && !empty(trim($_POST["author"])) && trim($_POST["author"]) != "Выберете автора")
    {
        if($fl)
        {
            $query .= " `Author` = '" .$_POST["author"]."'";
            $fl = false;
        }else
        {
            $query .= " AND `Author` = '" .$_POST["author"]."'";
        }
    }
    if(isset($_POST["year"]) && !empty(trim($_POST["year"]))&& trim($_POST["year"]) != "Выберете год")
    {
        if($fl)
        {
            $query .= " `Date` = " .$_POST["year"];
            $fl = false;
        }else
        {
            $query .= " AND `Date` = " .$_POST["year"];
        }
    }
    if(isset($_POST["count"]) && !empty(trim($_POST["count"]))&& trim($_POST["count"]) !="Выберете количество страниц")
    {
        if($fl)
        {
            $query .= " `Count` = '" .$_POST["count"]."'";
            $fl = false;
        }else
        {
            $query .= " AND `Count` = '" .$_POST["count"]."'";
        }
    }
    if(isset($_POST["country"]) && !empty(trim($_POST["country"]))&& trim($_POST["country"]) != "Выберете страну")
    {
        if($fl)
        {
            $query .= " `Country` = '" .$_POST["country"]."'";
            $fl = false;
        }else
        {
            $query .= " AND `Country` = '" .$_POST["country"]."'";
        }
    }
    if($fl)
    {
        $res_sel_serch1 = $mysqli->query("SELECT * FROM `title`");
    if(!$res_sel_serch1)
    {
        exit("ERROR");
    }else
    {
        $mes="";
        $mes.= "<table border='1' style='display: inline-block;'>";
        $mes.= "<tr>";
        $mes.= "<th>Название</th>";
        $mes.= "<th>Автор</th>";
        $mes.= "<th>Год издания</th>";
        $mes.= "<th>Количество страниц</th>";
        $mes.= "<th>Страна</th>";
        $mes.= "<th>Герои</th>";
        $mes.= "</tr>";
        $rows = $res_sel_serch1->num_rows;
        $cat = mysqli_fetch_all($res_sel_serch1,MYSQLI_ASSOC);
        for($i =0;$i<$rows;++$i)
        {
            $mes.='<tr>';
            $mes.= '<td>' .$cat[$i]['Name'].'</td>';
            $mes.= '<td>' .$cat[$i]['Author'].'</td>';
            $mes.= '<td>' .$cat[$i]['Date'].'</td>';
            $mes.= '<td>' .$cat[$i]['Count'].'</td>';
            $mes.= '<td>' .$cat[$i]['Country'].'</td>';
            $mes.= '<td>' .$cat[$i]['Hero'].'</td>';
            $mes.= '</tr>';
        }
        $mes.= '</table>';
        redirect_to($mes);
    }
    }else
    {
        $res_sel_serch = $mysqli->query($query);
        if(!$res_sel_serch)
        {
            exit("ERROR");
        }else
        {
            $mes="";
            $mes.= "<table border='1' style='display: inline-block;'>";
            $mes.= "<tr>";
            $mes.= "<th>Название</th>";
            $mes.= "<th>Автор</th>";
            $mes.= "<th>Год издания</th>";
            $mes.= "<th>Количество страниц</th>";
            $mes.= "<th>Страна</th>";
            $mes.= "<th>Герои</th>";
            $mes.= "</tr>";
            $rows = $res_sel_serch->num_rows;
            $cat = mysqli_fetch_all($res_sel_serch,MYSQLI_ASSOC);
            for($i =0;$i<$rows;++$i)
            {
                $mes.='<tr>';
                $mes.= '<td>' .$cat[$i]['Name'].'</td>';
                $mes.= '<td>' .$cat[$i]['Author'].'</td>';
                $mes.= '<td>' .$cat[$i]['Date'].'</td>';
                $mes.= '<td>' .$cat[$i]['Count'].'</td>';
                $mes.= '<td>' .$cat[$i]['Country'].'</td>';
                $mes.= '<td>' .$cat[$i]['Hero'].'</td>';
                $mes.= '</tr>';
            }
            $mes.= '</table>';
            redirect_to($mes);
        }
    }
}
?>