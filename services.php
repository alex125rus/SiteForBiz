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
    <div class="top" class="center">
        <div class="center clockdiv">
            <a href="https://time.is/Obninsk" id="time_is_link" rel="nofollow"
                style="font-size:64px;color:white;background:black"></a>
            <span id="Obninsk_z71d" style="font-size:64px;color:white;background:black"></span>
            <script src="//widget.time.is/t.js"></script>
            <script>
            time_is_widget.init({
                Obninsk_z71d: {}
            });
            </script>
        </div>
        <br>
        <div class="center">
            <div class="look-calendar" style="color: black;">
                <table id="calendar">
                    <thead>
                        <tr>
                            <td><b>‹</b>
                            <td colspan="5">
                            <td><b>›</b>
                        <tr class="dn">
                            <td>Пн
                            <td>Вт
                            <td>Ср
                            <td>Чт
                            <td>Пт
                            <td>Сб
                            <td>Вс
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="center">
            <div id="225ec3fb3a180a30586fbec3a2aad904" class="ww-informers-box-854753" style="margin-left:42%">
                <p class="ww-informers-box-854754"><a href="https://world-weather.ru/pogoda/russia/moscow/">Погода
                        world-weather.ru</a><br><a href="https://world-weather.ru/">world-weather.ru</a></p>
            </div>
            <script async type="text/javascript" charset="utf-8"
                src="https://world-weather.ru/wwinformer.php?userid=225ec3fb3a180a30586fbec3a2aad904"></script>
            <style>
            .ww-informers-box-854754 {
                -webkit-animation-name: ww-informers54;
                animation-name: ww-informers54;
                -webkit-animation-duration: 1.5s;
                animation-duration: 1.5s;
                white-space: nowrap;
                overflow: hidden;
                -o-text-overflow: ellipsis;
                text-overflow: ellipsis;
                font-size: 12px;
                font-family: Arial;
                line-height: 18px;
                text-align: center
            }

            @-webkit-keyframes ww-informers54 {

                0%,
                80% {
                    opacity: 0
                }

                100% {
                    opacity: 1
                }
            }

            @keyframes ww-informers54 {

                0%,
                80% {
                    opacity: 0
                }

                100% {
                    opacity: 1
                }
            }
            </style>
        </div>
        <script src="js/calendar.js"></script>
    </div>
    <?php
    require_once("down.html");
    ?>
</body>