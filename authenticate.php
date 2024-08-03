<?php 
    include "dbcon.php";
    session_start();
    if(isset($_POST['username'])&&isset($_POST['password'])){
        if($_POST['username']=="" || $_POST['password']==""){
            $_SESSION['loginflag']=0;
            echo "<script>window.location='index.php';</script>";
            echo "hemlaoma";
        }
        else{
            $mysql = opencon();
            $u = $_POST['username'];
            $p = $_POST['password'];
            $qry = "select * from login where username ='$u'";
            $results = mysqli_query($mysql,$qry);
            $row = mysqli_fetch_assoc($results);
            if($u==$row['username']&&$p==$row['password']){
                $_SESSION['loginflag']=1;
                $_SESSION['username']=$u;
                $_SESSION['password']=$p;
                $_SESSION['name']=$row['name'];
                if($u=="admin"){
                    echo "<script>window.location='thome.php';</script>";
                    echo "success";    
                }
                echo "<script>window.location='home.php';</script>";
                echo "success";
            }
            else{
                $_SESSION['loginflag']=2;
                echo"<script> window.location='index.php';</script>";
                echo "incorrect password";
            }
        }
    }
    else{
        $_SESSION['loginflag']=0;
        echo "<script>window.location='index.php';</script>";
        echo "fields empty";
    }
?>