<?php
    session_start();
    $_SESSION['username'] = "";
    $_SESSION['name']="";
?>

<html>
    <title>
        ZEN(1)
    </title>
    <head>
        <link href="assets/index_style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Unbounded&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <img src="assets/logo-removebg.png" alt="LOGO">
        <div class="container">
            <div class="head" style="font-size:70px; font-family: 'Archivo', sans-serif;font-family: 'Unbounded', cursive;"><b>PUBLIC ACCESS</b></div>
                <div class="form">
                    <form method="POST" action="authenticate.php">
                        <b>USERNAME</b> <input type="text" name="username" style="margin-left:1px;" placeholder="USERNAME"><br>
                        <b>PASSWORD</b> <input type="password" name="password" style="margin-top:20px; margin-left:3px;" placeholder="PASSWORD"><br>
                        <button type="SUBMIT">LOGIN</button>
                    </form>
                    <button onclick="register()" class="reg">REGISTER</button>
                </div>
            </div>
        </div>
        <div id="msg"></div>
        <?php
            if(isset($_SESSION['loginflag'])){
                if($_SESSION['loginflag']==2){
                    echo "<script> var x = document.getElementById('msg');
                        x.innerHTML = 'USER NOT FOUND!';
                        x.style.color='red';
                        x.style.fontFamily = 'Archivo';
                        setTimeout(() => { x.innerHTML = ''; }, 2000);</script>";
                        // $_SESSION['loginflag']=4;
                }
                else if($_SESSION['loginflag']==1){
                    echo "<script> var x = document.getElementById('msg');
                    x.innerHTML = 'LOGIN SUCCESSFUL';
                    x.style.color='GREEN';
                    x.style.fontFamily = 'Archivo';
                    setTimeout(() => { x.innerHTML = ''; }, 2000);</script>";
                    // $_SESSION['loginflag']=4;
                }
                else if($_SESSION['loginflag']==0){
                    echo "<script> var x = document.getElementById('msg');
                    x.innerHTML = 'ENTER ALL THE REQUIRED FIELDS';
                    x.style.color='ORANGE';
                    x.style.fontFamily = 'Archivo';
                    setTimeout(() => { x.innerHTML = ''; }, 2000);</script>";
                    // $_SESSION['loginflag']=4;
                }
                else{
                    echo "<script> var x = document.getElementById('msg');
                    x.innerHTML = 'ENTER DETAILS TO LOGIN';
                    x.style.color='white';
                    x.style.fontFamily = 'Archivo';
                    setTimeout(() => { x.innerHTML = ''; }, 2000);</script>";
                    // $_SESSION['loginflag']=4;
                }
            }
            else{
                echo "<script> var x = document.getElementById('msg');
                x.innerHTML = 'YET TO LOGIN';
                x.style.color='orange';
                x.style.fontFamily = 'Archivo';
                setTimeout(() => { x.innerHTML = ''; }, 2000);</script>";
            }
        ?>
    </body>
    <script>
        function register(){
            window.location="register.php";
        }
    </script>
</html>