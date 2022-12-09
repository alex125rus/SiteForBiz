<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
    require_once("header.html");
    include "count.php"
?>

<head>
    <title>Новости</title>
</head>
<body>
    <?php
require_once("menu.html");
?>
<div class="center">
    <h1>Новости</h1>
</div>
<div class="center">
    <?php
    $res_query = $mysqli->query("SELECT * FROM `newsforsite`");
    if(!$res_query)
    {
        exit("EROOR");
    }else
    {
        $rows = $res_query->num_rows;
        $cat = mysqli_fetch_all($res_query,MYSQLI_ASSOC);
        for($i =0;$i<$rows;++$i)
        {
            echo "<h4>----------------------------------------------------------</h4>";
            echo "<h2>".$cat[$i]['title']."</h2>";
            echo "<h5>".$cat[$i]['description']."</h5>";
            echo "<h4>----------------------------------------------------------</h4>";
        }
    }
    ?>
</div>
<?php
    require_once("down.php");
    ?>
</body>