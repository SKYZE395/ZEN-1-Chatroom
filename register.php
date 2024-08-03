<?php
    session_start();
    $_SESSION['username']="";
    $_SESSION['error'] = "";

    // if(isset($_SESSION['loginflag'])){
    //     if($_SESSION['loginflag']==0){
    //         echo "<script>window.location='index.php';</script>";
    //     }
    //     else if($_SESSION['loginflag']==2){
    //         echo "<script>window.location='index.php';</script>";
    //     }
    //     else{
    //         echo "";
    //     }
    // }
    // else{
    //     $_SESSION['loginflag']=0;
    //     echo "<script>window.location='index.php';</script>";
    // }
?>
<html>
    <title>
        ZEN(1) REGISTER
    </title>
    <head>
        <link href="assets/register_style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Unbounded&display=swap" rel="stylesheet">
    </head>
    <body>
        <img src="assets/logo-removebg.png" alt="LOGO">
        <div class='time1'></div>
        <div class="container">
            <div class="head"><b>REGISTER</b></div>
            <div class="form">
                <form action="adduser.php" method="POST">
                    <div style="margin-top:10px"> USERNAME <input type="text" id="username" name="username" placeholder="USERNAME"><br></div>
                    <div style="margin-top:10px"> NAME <input type="text" style="margin-left:20px; margin-top:5px;" id="name" name="name"><br></div>
                    <div style="margin-top:10px"> PASSWORD <input type="password" id="password" name="password"><br></div>
                    <button type="SUBMIT">SUBMIT</button>
                </form>
            </div>
            <div id='msg'></div>
            <?php
            if(isset($_SESSION['regflag'])){
                if($_SESSION['regflag']==0){
                    echo "<script>var msg = document.getElementById('msg'); msg.innerHTML='ENTER ALL THE FIELDS'; setTimeout(() => { msg.innerHTML = ''; }, 2000);</script>";
                    $_SESSION['regflag'] = 4;
                }
                else if($_SESSION['regflag']==1){
                    echo "<script>var msg = document.getElementById('msg'); msg.innerHTML='USER REGISTERED';setTimeout(() => { msg.innerHTML = ''; }, 2000);</script>";
                    $_SESSION['regflag'] = 4;
                }
                else if($_SESSION['regflag']==2){
                    echo "<script>var msg = document.getElementById('msg'); msg.innerHTML='ERROR';setTimeout(() => { msg.innerHTML = ''; }, 2000);</script>";
                    $_SESSION['regflag'] = 4;
                }
                else if($_SESSION['regflag']==3){
                    echo "<script>var msg = document.getElementById('msg'); msg.innerHTML='USERNAME ALREADY EXISTS';setTimeout(() => { msg.innerHTML = ''; }, 2000);</script>";
                    $_SESSION['regflag'] = 4;
                }
                else{
                    echo"START REGISTRATION";
                    $_SESSION['regflag'] = 4;
                }
            }
            else if(!isset($_SESSION['regflag'])||$_SESSION['regflag']==4){
                echo "<script>var msg = document.getElementById('msg'); msg.innerHTML='START REGISTRATION';setTimeout(() => { msg.innerHTML = ''; }, 2000);</script>";
            }
            ?>
        </div>
        <script>
            function updateTime() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                if(seconds<=9 && seconds>=0){
                  seconds = "0"+seconds;
                }
                if(minutes<=9 && minutes>=0){
                  minutes = "0"+minutes;
                }
                if(hours<=9 && hours>=0){
                  hours = "0"+hours;
                }
                var formattedTime = `${hours}:${minutes}:${seconds}`;
              document.getElementsByClassName("time1")[0].textContent = formattedTime;
            }
            setInterval(() => {
                updateTime();
            }, 1000);  
    </script>
    </body>
</html>
