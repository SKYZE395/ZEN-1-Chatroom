<?php
    $room = $_POST['room'];
    $pwd = $_POST['roompwd'];

    if(strlen($room)>20 || strlen($room)<2){
        $message = "PLEASE ENTER A ROOM NAME BETWEEN 2 AND 20 CHARACTERS";
        echo"<script>alert('$message');";
        echo"window.location='join.php';";
        echo"</script>";
    }
    else if(!ctype_alnum($room)){
        $message = "ROOM NAME RESTRICTED TO ALPHANUMERIC TYPE";
        echo"<script>alert('$message');";
        echo"window.location='join.php';";
        echo"</script>";
    }
    else{
        include "dbcon.php";
        $mysql = opencon();
    }
    $qry = "SELECT * FROM rooms WHERE roomname='$room' and password='$pwd'";
    $results = mysqli_query($mysql,$qry);
    if($results){
        if(mysqli_num_rows($results)>0){
            $message = "ROOM CONNECTED YOU CAN PROCEED TO CHAT";
            echo"<script>alert('$message');";
            echo"window.location='room.php?roomname=$room';";
            echo"</script>";
        }
        else{
            $message = "ROOM DOES NOT EXIST OR INCORRECT PASSWORD";
            echo"<script>alert('$message');";
            echo"window.location='join.php';";
            echo"</script>";
            
        }
    }
    else{
        echo"Error :".mysqli_error($mysql);
    }
?>