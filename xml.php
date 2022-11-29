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
                    <th>Id</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Год издания</th>
                    <th>Количество страниц</th>
                    <th>Страна</th>
                    <th>Герои</th>
                </tr>
                <?php
            /*$host = 'localhost';
            $data = 'f96414jz_deteciv';
            $user = 'f96414jz_deteciv';
            $pass = 'R5hXcP0n';
            $connection = new mysqli($host,$user,$pass,$data);*/
            if($mysqli->connect_error)die($$mysqli->connect_error);
            //запрос
            $query = 'SELECT * FROM title';
            $result = $mysqli->query($query);
            if(!$result)die('Error result');
            $rows = $result->num_rows;
            $cat = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $dom = new DOMDocument();
            $dom->encoding = 'utf-8';
            $dom->xmlVersion = '1.0';
            $dom->formatOutput = true;
            $xml_file_name = 'books_list.xml';
            $root = $dom->createElement('books');
            for($i =0;$i<$rows;++$i)
            {
                echo '<tr>';
                echo '<td>' .$cat[$i]['id'].'</td>';
                echo '<td>' .$cat[$i]['Name'].'</td>';
                echo '<td>' .$cat[$i]['Author'].'</td>';
                echo '<td>' .$cat[$i]['Date'].'</td>';
                echo '<td>' .$cat[$i]['Count'].'</td>';
                echo '<td>' .$cat[$i]['Country'].'</td>';
                echo '<td>' .$cat[$i]['Hero'].'</td>';
                echo '</tr>';
                $book_node = $dom->createElement('book');
                $child_node_id = $dom->createElement('id',$cat[$i]['id']);
                $book_node->appendChild($child_node_id);
                $child_node_name = $dom->createElement('name',$cat[$i]['Name']);
                $book_node->appendChild($child_node_name);
                $child_node_author = $dom->createElement('author',$cat[$i]['Author']);
                $book_node->appendChild($child_node_author);
                $child_node_date = $dom->createElement('date',$cat[$i]['Date']);
                $book_node->appendChild($child_node_date);
                $child_node_count = $dom->createElement('count',$cat[$i]['Count']);
                $book_node->appendChild($child_node_count);
                $child_node_country = $dom->createElement('country',$cat[$i]['Country']);
                $book_node->appendChild($child_node_country);
                $child_node_hero = $dom->createElement('hero',$cat[$i]['Hero']);
                $book_node->appendChild($child_node_hero);
                $root->appendChild($book_node);
            }
            $dom->appendChild($root);
            $dom->save($xml_file_name);
            echo '</table>';
            echo "<a href = \"$xml_file_name\">XML</a>";
            ?>
        </div>
    </div>
    <?php
    require_once("down.html");
    ?>
</body>