<?php
    session_start();  
    $room = $_POST['room'];
    include "dbcon.php";
    $mysql = opencon();
    $qry = "SELECT msg,stime,ip,name FROM msgs WHERE room = '$room'";

    $res = "";

    $result = mysqli_query($mysql,$qry);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $res = $res.'<div class="container">';
            // $res = $res.$row['ip'];
            $res = $res.$row['name']." ";
            // $res = $res.$row['stime'];
            $res = $res.'says <p>'.$row['msg'];
            $res = $res.'</p><span class="time-right">'.$row['stime'].'</span></div>';
        }
    }
    echo $res;
?>