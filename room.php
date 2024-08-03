<?php
session_start();
$roomname = $_GET['roomname'];
include "dbcon.php";
$mysql = opencon();

$qry = "SELECT * FROM rooms where roomname = '$roomname'";
$results = mysqli_query($mysql, $qry);
if ($results) {
  if (mysqli_num_rows($results) == 0) {
    $message = "THE ROOM DOES NOT EXIST ANYMORE";
    echo "<script>alert('$message');";
    echo "window.location='home.php';";
    echo "</script>";
  } else {

  }
} else {
  echo "Error: " . mysqli_error($mysql);
}
if (isset($_SESSION['loginflag'])) {
  if ($_SESSION['loginflag'] == 0) {
    echo "<script>window.location='index.php';</script>";
  } else if ($_SESSION['loginflag'] == 2) {
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "";
  }
} else {
  echo "<script>window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/room_style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300&family=Unbounded&display=swap" rel="stylesheet">
</head>
<body>
<div class="logout"><button><a href='logout.php'>LOGOUT</a></button></div>
<div class="header"><button><a href='home.php'>HOME</a></button></div>
  <div class='top'>
    <img src="assets/logo-removebg.png" alt="LOGO">
    <div class="time1"></div>
  </div>
    <h2>Chat Messages ZEN/<?php echo "$roomname" ?></h2>

    <div class="container">
        <div class="anyClass" id="btm">
            <p style="color:grey; text-align:center;">Begin chat<p>
        </div>
    </div>
    <div class="msg">
      <input type="text" name="usermsg" id="usermsg" placeholder="Type something..."><br>
      <button name="submitmsg" id="submitmsg">SEND</button>
    </div>
    <div class='err'></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
      setInterval(runfunction,1000);
      function runfunction(){
          $.post("htcont.php",{room:'<?php echo $roomname ?>'},
          function(data,status){
              document.getElementsByClassName('anyClass')[0].innerHTML = data;
          })
      }
      var chatbox = document.getElementById("btm");
      chatbox.scrollTop = chatbox.scrollHeight;
      var input = document.getElementById("usermsg");
      input.addEventListener("keyup",function(event){
          event.preventDefault();
          if(event.keyCode===13){
              if(input.value == ""){
                var err = document.getElementsByClassName('err');
                err[0].innerHTML = " TYPE A MSG FIRST!";
                setTimeout(() => {
                    err[0].innerHTML="";
                }, 2000);
              }
              else{
                document.getElementById("submitmsg").click();
              }
          }
      }); 
      //jQUERY 
      $('#submitmsg').click(function(){
          var clientmsg = $('#usermsg').val();
          if(clientmsg==""){
            var err = document.getElementsByClassName('err');
                err[0].innerHTML = " TYPE A MSG FIRST!";
                setTimeout(() => {
                    err[0].innerHTML="";
                }, 2000);
          }
          else{
            $.post("postmsg.php",{text:clientmsg,room:'<?php echo $roomname ?>',ip:'<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
              function(data,status){
                document.getElementsByClassName('anyClass')[0].innerHTML = data;
              }
            );
            $("#usermsg").val("");
            return false;
          }
      });
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


      var previousText = ""; // Store the previous text content
      var scrollingDiv = document.getElementById("btm");

      function scrollToBottom(element) {
        element.scrollTop = element.scrollHeight;
      }

      // Create a new MutationObserver
      var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
          // Check if text content has changed
          if (scrollingDiv.textContent !== previousText) {
            previousText = scrollingDiv.textContent;
            scrollToBottom(scrollingDiv);
          }
        });
      });

      // Configure and start observing the target node (scrollingDiv)
      observer.observe(scrollingDiv, { childList: true, subtree: true, characterData: true });

    </script>
    <br>
    <br>
    
</body>
</html>
