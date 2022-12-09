<?php 
require_once("dbconnect.php");
$res = $mysqli->query("SELECT `views`, `hosts` FROM `visits` WHERE `date`='$date'");
$row = mysqli_fetch_assoc($res);
echo "<div class = 'box'>";
echo "<p>Поситителей: " .$row['hosts'] ."<br>Просмотров: " .$row['views'] . "</p>";
//echo '<p>Просмотров: ' .$row['views'] .'</p>';
echo "</div>";
?>