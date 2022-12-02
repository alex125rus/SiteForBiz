<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
    require_once("header.html");
?>
<head>
<title>Сервисы</title>
</head>
<body>
<?php
    require_once("menu.html");
    ?>
    <form action="addBook.php" method="POST">
        <div class="row">
            <div>
            <p>Название: 
                <input list = 'character_name'  name='name'>
                <datalist id='character_name'>
                <?php
                    $result_select_Country = $mysqli->query("SELECT `Name` FROM `title` GROUP BY `Name`");
                    if(!$result_select_Country)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_Country->num_rows;
                        $cat = mysqli_fetch_all($result_select_Country,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Name']."</option>";
                        }
                    }
                ?>
                </p>
            </div>
            <br>
            <div>
            <p>Автор: 
                <input list = 'character_author'  name='author'>
                <datalist id='character_author'>
                <?php
                    $result_select_author = $mysqli->query("SELECT `Author` FROM `title` GROUP BY `Author`");
                    if(!$result_select_author)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_author->num_rows;
                        $cat = mysqli_fetch_all($result_select_author,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Author']."</option>";
                        }
                    }
                ?>
                </datalist>
            </p>
            </div>
            <br>
            <div>
            <p>Год: 
                <input type="number" list = 'character_year'  name='year'>
                <datalist id='character_year'>
                <?php
                    $result_select_date = $mysqli->query("SELECT `Date` FROM `title` GROUP BY `Date`");
                    if(!$result_select_date)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_date->num_rows;
                        $cat = mysqli_fetch_all($result_select_date,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Date']."</option>";
                        }
                    }
                ?>
                </p>
            </div>
            <br>
            <div>
            <p>Количество страниц: 
                <input type="number" list = 'character_count'  name='count'>
                <datalist id='character_count'>
                <?php
                    $result_select_count = $mysqli->query("SELECT `Count` FROM `title` GROUP BY `Count`");
                    if(!$result_select_count)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_count->num_rows;
                        $cat = mysqli_fetch_all($result_select_count,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Count']."</option>";
                        }
                    }
                ?>
                </p>
            </div>
            <br>
            <div>
            <p>Страна: 
                <input list = 'character_country'  name='country'>
                <datalist id='character_country'>
                <?php
                    $result_select_Country = $mysqli->query("SELECT `Country` FROM `title` GROUP BY `Country`");
                    if(!$result_select_Country)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_Country->num_rows;
                        $cat = mysqli_fetch_all($result_select_Country,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Country']."</option>";
                        }
                    }
                ?>
                </p>
            </div>
            <div>
            <p>Герой/герои: 
                <input list = 'character_hero'  name='hero'>
                <datalist id='character_hero'>
                <?php
                    $result_select_Country = $mysqli->query("SELECT `Hero` FROM `title` GROUP BY `Hero`");
                    if(!$result_select_Country)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_Country->num_rows;
                        $cat = mysqli_fetch_all($result_select_Country,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Hero']."</option>";
                        }
                    }
                ?>
                </p>
            </div>
        </div>
        <div>
            <input type="submit" name="button" value="Добавить">
        </div>
    </form>
    <br><br><br>
    <div>
        <?php
                if(isset($_SESSION["server_messages"]))
                {
                    echo $_SESSION["server_messages"];

                    unset($_SESSION["server_messages"]);
                }
            ?>
    </div>
<?php
    require_once("down.html");
    ?>
</body>