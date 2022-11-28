<?php
session_start();
require_once("dbconnect.php");
function redirect_to_allOK($address_page = "rss.php",$site = "http://f96414jz.beget.tech")
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
function redirect_to($message, $address_page = "rss.php",$site = "http://f96414jz.beget.tech")
{
    $_SESSION["server_messages"] = $message;
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ". $site."/".$address_page);
    exit();
}
if(isset($_POST["button"]) && !empty($_POST["button"]))
{
    if(isset($_POST["headline"]) && !empty(trim($_POST["headline"])))
    {
        $insert_result = $mysqli->query("INSERT INTO `news`(`title`, `description`, `pubDate`) VALUES ('".$_POST['headline']."','".$_POST['description']."','".date("Y-m-d H:i:s")."')");
        if(!$insert_result)
        {
            exit("ERROR! Ошибка добавления новостив БД");
        }else
        {
            $result_query_select = $mysqli->query("SELECT * FROM `news`");
            $out = '<?xml version="1.0"?>';
            $out .= '<rss version="2.0">';
            $out .= '<channel>';
            $out .= '<title>Канал по детективам</title>';
            $out .= '<description>Тест</description>';
            $out .= '<link>http://f96414jz.beget.tech/rss.php</link>';
            if(!$result_query_select)
            {
                exit("ERROR! Ошибка подключения к БД и вывод новостей");
            }else{
                $rows = $result_query_select->num_rows;
                $cat = mysqli_fetch_all($result_query_select,MYSQLI_ASSOC);
                foreach($cat as $row)
                {
                    $out .= '
                <item>
                    <title>' . $row['title'] . '</title>
                    <link>http://f96414jz.beget.tech/rss.php</link>
                    <description><![CDATA[' . $row['description'] . ']]></description>
                    <pubDate>' . date(DATE_RFC822, $row['pubDate']) . '</pubDate>
                </item>';
                }
            }
            $out .= '</channel>';
            $out .= '</rss>';
            $doc = new DOMDocument();
            $doc->load("rss.xml");
            file_put_contents("rss.xml", $out);
            $doc->saveXML();
            redirect_to_allOK("rss.php");
        }
    }else
    {
        $mes = "<p class='mesage_error'><strong>Ошибка!</strong> Введите заголовок </p>";
        redirect_to($mes);
    }
}else
{
    $result_query_select = $mysqli->query("SELECT * FROM `news`");
            $out = '<?xml version="1.0"?>';
            $out .= '<rss version="2.0">';
            $out .= '<channel>';
            $out .= '<title>Канал по детективам</title>';
            $out .= '<description>Тест</description>';
            $out .= '<link>http://f96414jz.beget.tech/rss.php</link>';
            if(!$result_query_select)
            {
                exit("ERROR! Ошибка подключения к БД и вывод новостей");
            }else{
                $rows = $result_query_select->num_rows;
                $cat = mysqli_fetch_all($result_query_select,MYSQLI_ASSOC);
                foreach($cat as $row)
                {
                    $out .= '
                <item>
                    <title>' . $row['title'] . '</title>
                    <link>http://f96414jz.beget.tech/rss.php</link>
                    <description><![CDATA[' . $row['description'] . ']]></description>
                    <pubDate>' . date(DATE_RFC822, $row['pubDate']) . '</pubDate>
                </item>';
                }
            }
            $out .= '</channel>';
            $out .= '</rss>';
            $doc = new DOMDocument();
            $doc->load("rss.xml");
            file_put_contents("rss.xml", $out);
            $doc->saveXML();
            redirect_to_allOK("rss.php");
}
?>