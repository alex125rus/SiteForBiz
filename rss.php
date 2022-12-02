<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
    require_once("header.html");
?>
<head>
<title>RSS</title>
</head>

<body>
    <?php
    require_once("menu.html");
    ?>
    <div class="top" class="center">
        <br>
        <div class="center">
            <h3>
                <?php
                if(isset($_SESSION["server_messages"]))
                {
                    echo $_SESSION["server_messages"];

                    unset($_SESSION["server_messages"]);
                }
            ?>
            </h3>
        </div class="center">
        <div class="row">
            <div class="column_left">
                <h2>Каналы</h2>
                <?php
                if(isset($_SESSION["aut_id"]) && !empty($_SESSION["aut_id"]))
                {
                    $result_query_select_form_link = $mysqli->query("SELECT `linck`, `id` FROM `linkNews` WHERE `idUser` ='" . $_SESSION["aut_id"]."'");
                    if(!$result_query_select_form_link)
                    {
                        exit("EROR");
                    }else
                    {
                        $rows = $result_query_select_form_link->num_rows;
                        $cat = mysqli_fetch_all($result_query_select_form_link,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            $url = $cat[$i]['linck'];
                            $dom=new DOMDocument;
                            $dom->load( $url );
                            $xp=new DOMXPath( $dom );
                            $col=$xp->query( '//channel' );
                            $col1 = $xp->query( '//channel/image' );
                            echo "<div class='row'>";
                            echo "<div class='column_left_sub'>";
                            foreach($col1 as $node)
                            {
                                echo "<img src='".$xp->query('url',$node)->item(0)->textContent."' alt='Картинка' style='width:30px;'>";
                            }
                            echo "</div>";
                            echo "<div class='column_center_sub'>";
                            foreach($col as $node)
                            {
                                echo "<a class = 'black_color' href = '".$xp->query('link',$node)->item(0)->textContent."'>". $xp->query('title',$node)->item(0)->textContent."</a>";
                            }
                            echo "</div>";
                            echo "<div class='column_center_right'>";
                            echo "<form action='delet.php' method='POST'>";
                            echo "<input type='hidden' name = 'chanel' value = '".$cat[$i]['id']."'>";
                            echo "<input type='image' src='pngwing.com.png' alt='удалить'>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                }
                ?>
            </div>
            <div class="column_right">
                <div style="background-color: white;">
                    <form action="rssforming.php" method="POST">
                        <input type="text" name="headline" placeholder="Заголовок новости" require />
                        <br>
                        <b>
                            <br>
                            <textarea name="description" s cols="50" rows="10" placeholder="Описание новости"
                                style="width: 389px;"></textarea>
                        </b>
                        <input type="submit" name="button" value="Добавить">
                    </form>
                    <br>
                    <form action="addRssChanel.php" method="POST">
                        <input size="51px" class="input" name="rssurl" type="text"
                            placeholder="Ссылка на RSS ленту в формате https://example.ru" required=""
                            pattern="http(s?)://.*">
                        <input type="submit" name="button" value="Добавить">
                    </form>
                    <br>
                    <br>
                </div>
                <?php
                $dom = new DOMDocument;
                $dom->load("rss.xml");
                $xp=new DOMXPath( $dom );
                $col=$xp->query( '//channel/item' ); 
                if( $col->length > 0 ){
                    foreach( $col as $node ){
                        echo "<div class = 'newsbox'>";
                        printf( 
                            "<h3><a href = '%s'>%s</a></h3>",
                            $xp->query('link',$node)->item(0)->textContent, 
                            $xp->query('title',$node)->item(0)->textContent
                        );
                        printf( 
                            '<p>%s<br><br>%s</p>',
                            $xp->query('description',$node)->item(0)->textContent,
                            $xp->query('pubDate',$node)->item(0)->textContent
                        );
                        echo "</div>";
                    }
                }
                if(isset($_SESSION["aut_id"]) && !empty($_SESSION["aut_id"]))
                {
                    $result_query_select_form_link = $mysqli->query("SELECT `linck` FROM `linkNews` WHERE `idUser` ='" . $_SESSION["aut_id"]."'");
                    if(!$result_query_select_form_link)
                    {
                        exit("EROR");
                    }else
                    {
                        $rows = $result_query_select_form_link->num_rows;
                        $cat = mysqli_fetch_all($result_query_select_form_link,MYSQLI_ASSOC);
                        for($i =0;$i<$rows;++$i)
                        {
                            $url = $cat[$i]['linck'];
                            $dom=new DOMDocument;
                            $dom->load( $url );
                            $xp=new DOMXPath( $dom );
                            $chanel = $xp->query('//channel');
                            $sch="";
                            $lin = "";
                            foreach($chanel as $node)
                            {
                                $sch .= $xp->query('title',$node)->item(0)->textContent;
                                $lin .= $xp->query('link',$node)->item(0)->textContent;
                            }
                            $col=$xp->query( '//channel/item' );
                            if( $col->length > 0 ){
                                foreach( $col as $node ){
                                    echo "<div class = 'newsbox'>";
                                    printf( 
                                        "<h3><a href = '%s'>%s</a></h3>",
                                        $xp->query('link',$node)->item(0)->textContent, 
                                        $xp->query('title',$node)->item(0)->textContent
                                    );
                                    printf( 
                                        "<p>%s<br><br><h5><a href='%s'>%s</a><br><br>%s</p>",
                                        $xp->query('description',$node)->item(0)->textContent,
                                        $lin,
                                        $sch,
                                        $xp->query('pubDate',$node)->item(0)->textContent
                                    );
                                    echo "</div>";
                                }
                            }
                        }
                    }
                }           
            ?>
            </div>
        </div>
        <br>
        <br>
    </div>
    <?php
    require_once("down.html");
    ?>
</body>