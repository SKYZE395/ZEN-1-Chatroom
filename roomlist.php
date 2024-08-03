<?php
    session_start();
    include "dbcon.php";
    $mysql = opencon();

    $qry = "SELECT roomname,password FROM rooms;";

    $res="";
    
    $result = mysqli_query($mysql,$qry);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $res = $res.'<div class="container">Name:  ^';
            $res = $res.$row['roomname']."^ &emsp;Password: ^";
            $res = $res.$row['password']."^";
            $res = $res.'</div>';
        }
    }
    else{

    }
    echo $res;