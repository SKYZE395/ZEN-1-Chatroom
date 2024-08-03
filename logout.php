<?php
    session_start();

    include "dbcon.php";
    if(isset($_POST['username'])&&isset($_POST['password'])){
        if($_POST['username']=="" || $_POST['password']==""){
            $_SESSION['loginflag']=0;
            $_SESSION['name']="";
            session_destroy();
            echo "<script>window.location='index.php';</script>";
        }
        else{
            $_SESSION['loginflag']=0;
            $_SESSION['name']="";
            session_destroy();
            echo "<script>window.location='index.php';</script>";
        }
    }else{
        $_SESSION['loginflag']=0;
        $_SESSION['name']="";
        session_destroy();
        echo "<script>window.location='index.php';</script>";
    }

?>