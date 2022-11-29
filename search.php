<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
    require_once("header.html");
?>

<body>
    <?php
    require_once("menu.html");
    ?>

    <form action="sear.php" method="POST">
        <div class="row">
            <div class="leftConteiner">
                <?php
                    $result_select_author = $mysqli->query("SELECT `Author` FROM `title` GROUP BY `Author`");
                    if(!$result_select_author)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_author->num_rows;
                        $cat = mysqli_fetch_all($result_select_author,MYSQLI_ASSOC);
                        echo "<p>Автор:  ";
                        echo "<select name='author'>";
                        echo "<option elected>Выберете автора</option>";
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Author']."</option>";
                        }
                        echo "</select>";
                        echo "</p>";
                    }
                ?>
            </div>
            <div class="leftConteiner">
                <?php
                    $result_select_date = $mysqli->query("SELECT `Date` FROM `title` GROUP BY `Date`");
                    if(!$result_select_date)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_date->num_rows;
                        $cat = mysqli_fetch_all($result_select_date,MYSQLI_ASSOC);
                        echo "<p>Год:  ";
                        echo "<select name='year'>";
                        echo "<option selected>Выберете год</option>";
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Date']."</option>";
                        }
                        echo "</select>";
                        echo "</p>";
                    }
                ?>
            </div>
            <div class="leftConteiner">
                <?php
                    $result_select_count = $mysqli->query("SELECT `Count` FROM `title` GROUP BY `Count`");
                    if(!$result_select_count)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_count->num_rows;
                        $cat = mysqli_fetch_all($result_select_count,MYSQLI_ASSOC);
                        echo "<p>Количество страниц:  ";
                        echo "<select name='count'>";
                        echo "<option selected>Выберете количество страниц</option>";
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Count']."</option>";
                        }
                        echo "</select>";
                        echo "</p>";
                    }
                ?>
            </div>
            <div class="leftConteiner">
                <?php
                    $result_select_Country = $mysqli->query("SELECT `Country` FROM `title` GROUP BY `Country`");
                    if(!$result_select_Country)
                    {
                        exit("ERROR");
                    }else
                    {
                        $rows = $result_select_Country->num_rows;
                        $cat = mysqli_fetch_all($result_select_Country,MYSQLI_ASSOC);
                        echo "<p>Страна:  ";
                        echo "<select name='country'>";
                        echo "<option selected>Выберете страну</option>";
                        for($i =0;$i<$rows;++$i)
                        {
                            echo "<option>".$cat[$i]['Country']."</option>";
                        }
                        echo "</select>";
                        echo "</p>";
                    }
                ?>
            </div>
        </div>
        <div class="leftConteiner">
            <input type="submit" name="button" value="Найти">
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
</body>