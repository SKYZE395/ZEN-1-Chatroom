<?php   
    include "dbcon.php";
    session_start();
    if(isset($_POST['username'])&&isset($_POST['name'])){
        if(isset($_POST['password'])){
            $_SESSION['regflag']=1;
            $mysql = opencon();
            $u = $_POST['username'];
            $n = $_POST['name'];
            $p = $_POST['password'];
            $qry = "insert into login(username,name,password) values ('$u','$n','$p')";
            if($_POST['username']=="" || $_POST['password']==""||$_POST['name']==""){
                $_SESSION['regflag']=0;
                echo "<script>window.location='register.php'</script>";
            }
            else{
                try{
                    if(mysqli_query($mysql,$qry)){
                        $_SESSION['regflag'] = 1;
                        $_SESSION['name'] = $u;
                        echo"<script>window.location='home.php'</script>";
                    }
                    else{
                        $_SESSION['regflag']=2;
                        echo"<script>ERROR</script>";    
                    }
                }
                catch(Exception $e){
                    $_SESSION['regflag']=3;
                    $_SESSION['error'] = $e;
                    echo"<script>window.location='register.php'</script>";
                }
            }
        }
        else{
            $_SESSION['regflag']=0;
            echo "<script>window.location='register.php'</script>";
        }
    }
    else{
        $_SESSION['regflag']=0;
        echo "<script>window.location='register.php'</script>";
    }
?>