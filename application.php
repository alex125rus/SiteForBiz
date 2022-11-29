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
    <div class="top" class="center">
        <div class="center">
            <table border="1" style="display: inline-block;">
                <tr>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Год издания</th>
                    <th>Количество страниц</th>
                    <th>Страна</th>
                    <th>Герои</th>
                </tr>
                <?php
            $host = 'localhost';
            $data = 'f96414jz_deteciv';
            $user = 'f96414jz_deteciv';
            $pass = 'R5hXcP0n';
            $connection = new mysqli($host,$user,$pass,$data);
            if($connection->connect_error)die($connection->connect_error);
            //запрос
            $query = 'SELECT * FROM title';
            $result = $connection->query($query);
            if(!$result)die('Error result');
            $rows = $result->num_rows;
            $cat = mysqli_fetch_all($result,MYSQLI_ASSOC);
            for($i =0;$i<$rows;++$i)
            {
                echo '<tr>';
                echo '<td>' .$cat[0]['Name'].'</td>';
                echo '<td>' .$cat[0]['Author'].'</td>';
                echo '<td>' .$cat[0]['Date'].'</td>';
                echo '<td>' .$cat[0]['Count'].'</td>';
                echo '<td>' .$cat[0]['Country'].'</td>';
                echo '<td>' .$cat[0]['Hero'].'</td>';
                echo '</tr>';
                /*//$result->data_seek($i);
                echo '<tr>';
                echo '<td>' .$result->fetch_assoc()['Name'].'</td>';
                //$result->data_seek($i);
                echo '<td>' .$result->fetch_assoc()['Author'].'</td>';
                //$result->data_seek($i);
                echo '<td>' .$result->fetch_assoc()['Date'].'</td>';
                //$result->data_seek($i);
                echo '<td>' .$result->fetch_assoc()['Count'].'</td>';
                //$result->data_seek($i);
                echo '<td>' .$result->fetch_assoc()['Country'].'</td>';
                //$result->data_seek($i);
                echo '<td>' .$result->fetch_assoc()['Hero'].'</td>';
                echo '</tr>';*/
            }
            /*echo '<pre>';
            print_r($result);
            echo '</pre>';*/
            ?>
            </table>
        </div>
    </div>
    <?php
    require_once("down.html");
    ?>
</body>