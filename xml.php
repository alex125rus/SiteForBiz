<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Главня</title>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <header>
        <h1 class="center">Сервис по выбору детективов</h1>
    </header>
    <div class="top" class="center">
        <ul class="topmenu center">
            <li>
                <a href="index.php">Главная</a>
            </li>
            <li>
                <a href="contacts.php">Контакты</a>
            </li>
            <li>
                <a href="xml.php">XML</a>
            </li>
            <li>
                <a href="services.php">Сервисы</a>
            </li>
            <li>
                <a href="rss.php">RSS</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Приложение</a>
                <div class="dropdown-content">
                    <a href="#">Поиск</a>
                    <a href="#">Редактировать записи</a>
                    <a href="statistic.php">Статистика</a>
                </div>
            </li>
        </ul>
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
        <br>
        <div class="center">
        <label>Вы находитесь на главной странице.</label>
        <br>
        <label>Данный сайт реализован в рамках лабораторного практикума</label>
        <br>
        <label>По предмету "Web программирование".</label>
        <br>
        <label>Для взаимодествия с БД "Детективы" нажмите на кнопку "Приложение".</label>
        </div>
        <br>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="center">Copyright © 2022 Дуванова Анастасия</div>
    <div class="center">
                <!-- Yandex.Metrika informer -->
        <a href="https://metrika.yandex.ru/stat/?id=91098061&amp;from=informer"
        target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/91098061/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
        style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="91098061" data-lang="ru" /></a>
        <!-- /Yandex.Metrika informer -->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(91098061, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
        });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/91098061" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </div>
</body>