<?php 
require_once("dbconnect.php");
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");
$res = $mysqli->query("SELECT `visit_id` FROM `visits` WHERE `date`='$date'");
if(!$res)
{
    exit("Error");
}else{
    if($res->num_rows == 0)
    {
        $delete = $mysqli->query("DELETE FROM `ips`");
        if(!$delete)
        {
            exit("ERROR1");
        }else
        {
            $insert = $mysqli->query("INSERT INTO `ips` (`ip_address`) VALUES ('$visitor_ip')");
            if(!$delete)
            {
                exit("ERROR2");
            }else
            {
                $res_count = $mysqli->query("INSERT INTO `visits`(`date`, `hosts`, `views`) VALUES ('$date',1,1)");
                if(!$res_count)
                {
                    exit("ERROR3");
                }
            }
            
        }
        
    }else{
        $curent_ip = $mysqli->query("SELECT `ip_id` FROM `ips` WHERE `ip_address`='$visitor_ip'");
        //print_r($_SERVER);
        if(!$curent_ip)
        {
            exit("ERROR4");
        }else
        {
            if($curent_ip->num_rows == 1)
            {
                $up = $mysqli->query("UPDATE `visits` SET `views`=`views`+1 WHERE `date` = '$date'");
                if(!$up)
                {
                    exit("ERROR5"); 
                }
            }else
            {
                $in = $mysqli->query("INSERT INTO `ips` (`ip_address`) VALUES ('$visitor_ip')");
                if(!$in){
                    exit("ERROR6"); 
                }else
                {
                    $up = $mysqli->query("UPDATE `visits` SET `hosts`=`hosts`+1, `views`=`views`+1 WHERE `date` = '$date'");
                    if(!$up)
                    {
                        exit("ERROR7"); 
                    }
                }
            }
        }
    }
}
?>