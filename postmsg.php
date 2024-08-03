<?php
    session_start();
    include "dbcon.php";
    $mysql = opencon();

    $msg = $_POST['text'];
    $room = $_POST['room'];
    $ip = $_POST['ip'];
    $n = $_SESSION['name'];

    $qry = "INSERT INTO msgs(msg,room,ip,name,stime) VALUES ('$msg','$room','$ip','$n',CURRENT_TIMESTAMP)";
    mysqli_query($mysql,$qry);

    mysqli_close($mysql);
?>