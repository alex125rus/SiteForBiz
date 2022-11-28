<?php
    session_start();
    require_once("dbconnect.php");
    //require_once("rssforming.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RSS</title>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <header>
        <h1 class="center">Сервис по выбору детективов</h1>
    </header>
    <div class="center">
        <div class="ya-site-form ya-site-form_inited_no"
            data-bem="{&quot;action&quot;:&quot;http://f96414jz.beget.tech/rss.php&quot;,&quot;arrow&quot;:true,&quot;bg&quot;:&quot;#ff00ff&quot;,&quot;fontsize&quot;:12,&quot;fg&quot;:&quot;#000000&quot;,&quot;language&quot;:&quot;ru&quot;,&quot;logo&quot;:&quot;rb&quot;,&quot;publicname&quot;:&quot;Поиск по сайту f96414jz.beget.tech&quot;,&quot;suggest&quot;:true,&quot;target&quot;:&quot;_self&quot;,&quot;tld&quot;:&quot;ru&quot;,&quot;type&quot;:2,&quot;usebigdictionary&quot;:true,&quot;searchid&quot;:2713943,&quot;input_fg&quot;:&quot;#000000&quot;,&quot;input_bg&quot;:&quot;#ffffff&quot;,&quot;input_fontStyle&quot;:&quot;normal&quot;,&quot;input_fontWeight&quot;:&quot;normal&quot;,&quot;input_placeholder&quot;:&quot;Поиск&quot;,&quot;input_placeholderColor&quot;:&quot;#000000&quot;,&quot;input_borderColor&quot;:&quot;#7f9db9&quot;}">
            <form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8"><input
                    type="hidden" name="searchid" value="2713943" /><input type="hidden" name="l10n" value="ru" /><input
                    type="hidden" name="reqenc" value="" /><input type="search" name="text" value="" /><input
                    type="submit" value="Найти" /></form>
        </div>
        <style type="text/css">
        .ya-page_js_yes .ya-site-form_inited_no {
            display: none;
        }
        </style>
        <script type="text/javascript">
        (function(w, d, c) {
            var s = d.createElement('script'),
                h = d.getElementsByTagName('script')[0],
                e = d.documentElement;
            if ((' ' + e.className + ' ').indexOf(' ya-page_js_yes ') === -1) {
                e.className += ' ya-page_js_yes';
            }
            s.type = 'text/javascript';
            s.async = true;
            s.charset = 'utf-8';
            s.src = (d.location.protocol === 'https:' ? 'https:' : 'http:') + '//site.yandex.net/v2.0/js/all.js';
            h.parentNode.insertBefore(s, h);
            (w[c] || (w[c] = [])).push(function() {
                Ya.Site.Form.init()
            })
        })(window, document, 'yandex_site_callbacks');
        </script>
        <div id="ya-site-results"
            data-bem="{&quot;tld&quot;: &quot;ru&quot;,&quot;language&quot;: &quot;ru&quot;,&quot;encoding&quot;: &quot;&quot;,&quot;htmlcss&quot;: &quot;1.x&quot;,&quot;updatehash&quot;: true}">
        </div>
        <script type="text/javascript">
        (function(w, d, c) {
            var s = d.createElement('script'),
                h = d.getElementsByTagName('script')[0];
            s.type = 'text/javascript';
            s.async = true;
            s.charset = 'utf-8';
            s.src = (d.location.protocol === 'https:' ? 'https:' : 'http:') + '//site.yandex.net/v2.0/js/all.js';
            h.parentNode.insertBefore(s, h);
            (w[c] || (w[c] = [])).push(function() {
                Ya.Site.Results.init();
            })
        })(window, document, 'yandex_site_callbacks');
        </script>
    </div>
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
                <a href="auth.php">RSS</a>
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
    <div class="center" style="float: bottom;">
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
        <a href="https://metrika.yandex.ru/stat/?id=91098061&amp;from=informer" target="_blank" rel="nofollow"><img
                src="https://informer.yandex.ru/informer/91098061/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"
                title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"
                class="ym-advanced-informer" data-cid="91098061" data-lang="ru" /></a>
        <!-- /Yandex.Metrika informer -->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode
                .insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(91098061, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
        </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/91098061" style="position:absolute; left:-9999px;" alt="" /></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->
    </div>
</body>