<?php
    session_start();
    $uname = $_SESSION['username'];
    if($uname=='admin'){
        echo "REDIRECTING TO T+JOIN $uname<script>window.location='tjoin.php'</script>";
    }
    else{
        echo "REDIRECTING TO JOIN $uname<script>window.location='join.php'</script>";
    }
?>