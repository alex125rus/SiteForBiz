<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
    require_once("header.html");
?>
<head>
<title>Контакты</title>
</head>

<body>
    <?php
    require_once("menu.html");
    ?>
    <div class="top" class="center">
        <div class="center">
            <table border="1" style="display: inline-block;">
                <tr>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Email</th>
                </tr>
                <?php
            $host = 'localhost';
            $data = 'f96414jz_deteciv';
            $user = 'f96414jz_deteciv';
            $pass = 'R5hXcP0n';
            $connection = new mysqli($host,$user,$pass,$data);
            if($connection->connect_error)die($connection->connect_error);
            //запрос
            $query = 'SELECT * FROM admins';
            $result = $connection->query($query);
            if(!$result)die('Error result');
            $rows = $result->num_rows;
            $cat = mysqli_fetch_all($result,MYSQLI_ASSOC);
            for($i =0;$i<$rows;++$i)
            {
                echo '<tr>';
                echo '<td>' .$cat[0]['fullname'].'</td>';
                echo '<td>' .$cat[0]['phone'].'</td>';
                echo '<td>' .$cat[0]['email'].'</td>';
                echo '</tr>';
            }
            ?>
            </table>
        </div>
    </div>
    <?php
    require_once("down.html");
    ?>
</body>