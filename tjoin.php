<?php
session_start();
$name = $_SESSION['name'];
date_default_timezone_set('Asia/Kolkata');

if (isset($_SESSION['loginflag'])) {
    if ($_SESSION['loginflag'] == 0) {
        echo "<script>window.location='index.php';</script>";
    } else if ($_SESSION['loginflag'] == 2) {
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "";
    }
} else {
    $_SESSION['loginflag'] = 0;
    echo "<script>window.location='index.php';</script>";
}
?>
<html>
    <title>ZEN(1) HOME</title>
    <head>
        <link href="assets/join_style.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Unbounded&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="welcome" style="color:white;">
            <img src="assets/logo-removebg.png" alt="LOGO">
            <?php
            $t = date("H:i:s");
            if (date("H") >= 12 && date("H") <= 17) {
                echo "<div class='greeting'>GOOD AFTERNOON $name </div>";
            } else if (date("H") >= 17 && date("H") <= 23) {
                echo "<div class='greeting'>GOOD EVENING $name </div>";
            } else if (date("H") >= 0 && date("H") <= 12) {
                echo "<div class='greeting'>GOOD MORNING $name </div>";
            }
            ?>
            <div class="time" style="color:white;"></div>
        </div>
        
        <div class="logout"><button><a href='logout.php'>LOGOUT</a></button></div>
        <div class="header"><button><a href='home.php'>HOME</a></button></div>
        <div class='head'>
            <h1>JOIN ROOM</h1>
        </div>
        <div class='roomlist' id='roomlist'>
        </div>
        <div class="box" style=" position:relative; top:30%; font-size:20px; display:flex; justify-content:center;">
            <div class="text" style="color:white; font-family: 'Archivo', sans-serif;font-family: 'Unbounded', cursive; display:flex; font-size:30px;">ZEN/
                <form action="joinroom.php" method="POST">
                    <input type="text" name="room" style="height:30px; font-size:25px; font-family: 'Archivo', sans-serif;font-family: 'Unbounded', cursive;" placeholder="Room name"><br>
                    <input type="password" class="room_pwd" name="roompwd" id="room_pwd" style="display:none;" placeholder="Password"><br>
                    <input type="checkbox" class='security' name="password" id='security'>
                    <label for='security'>PASSKEY PROTECTION</label><br><br>
                    <button type="SUBMIT" style="font-size:21px; ">JOIN ROOM</button>
                </form>
            </div>
        </div>
        <br><br>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

            var x = document.getElementById('security');     //cbox
            var y = document.getElementById('room_pwd');    //pwd
            x.addEventListener("change",function(){
                if(x.checked){
                    y.style.display = "block";
                }
                else{
                    y.style.display = "none";
                }
            });

            function runfunction(){
                $.post("roomlist.php",{},
                function(data,status){
                    document.getElementsByClassName('roomlist')[0].innerHTML = data;
                })
            }

            runfunction();
        </script>
    </body>
</html>