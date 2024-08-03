<?php
    $room = $_POST['room'];
    $pwd = $_POST['roompwd'];

    if(strlen($room)>20 || strlen($room)<2){
        $message = "PLEASE ENTER A ROOM NAME BETWEEN 2 AND 20 CHARACTERS";
        echo"<script>alert('$message');";
        echo"window.location='thome.php';";
        echo"</script>";
    }
    else if(!ctype_alnum($room)){
        $message = "ROOM NAME RESTRICTED TO ALPHANUMERIC TYPE";
        echo"<script>alert('$message');";
        echo"window.location='thome.php';";
        echo"</script>";
    }
    else{
        include "dbcon.php";
        $mysql = opencon();
    }
    $qry = "SELECT * FROM rooms WHERE roomname='$room'";
    $results = mysqli_query($mysql,$qry);
    if($results){
        if(mysqli_num_rows($results)>0){
            $message = "PLEASE SELECT SOME OTHER ROOM BECAUSE THIS ROOM NAME IS ALREADY TAKEN";
            echo"<script>alert('$message');";
            echo"window.location='home.php';";
            echo"</script>";
        }
        else{
            $qry = "INSERT INTO rooms(roomname,password,stime) VALUES('$room','$pwd',CURRENT_TIMESTAMP)";
            if(mysqli_query($mysql,$qry)){
                $message = "ROOM CREATED YOU CAN PROCEED TO CHAT";
                echo"<script>alert('$message');";
                echo"window.location='room.php?roomname=$room';";
                echo"</script>";
            }
        }
    }
    else{
        echo"Error :".mysqli_error($mysql);
    }
?>