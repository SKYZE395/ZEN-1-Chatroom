<?php
    session_start();
    $name = $_SESSION['name'];
    $uname = $_SESSION['username'];
    date_default_timezone_set('Asia/Kolkata');

    if(isset($_SESSION['loginflag'])){
        if($_SESSION['loginflag']==0){
            echo "<script>window.location='index.php';</script>";
        }
        else if($_SESSION['loginflag']==2){
            echo "<script>window.location='index.php';</script>";
        }
        else{
            echo "";
        }
    }   
    else{
        $_SESSION['loginflag'] = 0;
        echo "<script>window.location='index.php';</script>";
    }
?>
<html>
    <title>ZEN(1) HOME</title>
    <head>
        <link href="assets/home_style.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Unbounded&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="welcome" style="color:white;">
            <img src="assets/logo-removebg.png" alt="LOGO">
            <?php 
                $t = date("H:i:s");
                if(date("H")>=12 && date("H")<=17){
                    echo "<div class='greeting'>GOOD AFTERNOON $name </div>";
                }else if(date("H")>=17 && date("H")<=23){
                    echo "<div class='greeting'>GOOD EVENING $name </div>";
                }
                else if(date("H")>=0 && date("H")<=12){
                    echo "<div class='greeting'>GOOD MORNING $name </div>";
                }
            ?>
        </div>
        <div class="logout"><button><a href='logout.php'>LOGOUT</a></button></div>
        <div class="header"><button><a href='home.php'>HOME</a></button></div>
        <div class="box" style=" position:relative; top:50%; font-size:20px; display:flex; margin-left:40%;">
            <div class="text" style="color:white; font-family: 'Archivo', sans-serif;font-family: 'Unbounded', cursive; display:flex; font-size:30px;">ZEN/
                <form action="claimroom.php" method="POST">
                    <input type="text" name="room" style="height:30px; font-size:25px; font-family: 'Archivo', sans-serif;font-family: 'Unbounded', cursive;">
                    <button type="SUBMIT" style="font-size:21px; ">CREATE ROOM</button>
                </form>
            </div>
        </div>
        <div class="time" style="color:white;margin-top: 80px;margin-left: 20px;"></div>
        <div class="join">
            <button onclick="join()">JOIN ROOM</button>
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
            document.getElementsByClassName("time")[0].textContent = formattedTime;
            }
            setInterval(() => {
                updateTime();
            }, 1000); 

            function join(){
                window.location='jcheck.php';
            }
        </script>
    </body>
</html>