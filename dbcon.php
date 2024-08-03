<?php   
    function opencon(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "zen";
        $conn = new mysqli($host,$user,$pass,$db);
        if($conn->connect_error){
            die("FAILED TO CONNET TO ".$db." DATABASE");
        }
        return $conn;
    }
    function closecon($conn){
        $conn -> close();
    }
?>