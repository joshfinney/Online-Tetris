<?php

session_start();

$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password, 'tetris');

// Check connection
if (!$conn){
    echo 'Connection error: ' . mysqli_connection_error();
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['psw'];

    $sql = "SELECT * FROM Users WHERE UserName='$username' AND Password='$password'";

    $results = mysqli_query($conn, $sql);

    if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
   <title>Home</title>
   <link rel="stylesheet" href="styles.css" />
</head>

<body>

   <ul>
      <li name="home">
         <a href="index.php">Home</a>
      </li>
      <li style="float:right" name="leaderboard">
         <a href="leaderboard.php">Leaderboard</a>
      </li>
      <li style="float:right" name="tetris">
         <a href="tetris.php">Play Tetris</a>
      </li>
   </ul>

   <?php if (isset($_SESSION['username'])) : ?>

        <script>
             document.getElementById("loginModalId").style.display="none";
        </script>
    
    <?php endif ?>

    <div class="modal-content">
    <img src="tetris.png" style="width: 95%; opacity: 15%;">
    <div style="position: absolute;">
        <h1>Welcome back</h1>
        <h2><a href="tetris.php" style="color:dodgerblue">Play now</a></h2>
   </div>
   <div id="loginModalId" class="modal">
      <form class="small-modal-content" method="post">
         <div class="container">
            <h1 style="font-family: Arial, Helvetica, sans-serif;">Log in</h1>
            <p>Please fill in this form to play Tetris.</p>
            <hr>

            <div>
            <label for="username">
               <b>Username</b>
            </label>
            </div>
            <div>
            <input type="text" placeholder="Enter username" name="username" required>
            </div>   

            <div>
            <label for="psw">
               <b>Password</b>
            </label>
            </div>
            <div>
            <input type="password" placeholder="Enter Password" name="psw" required>
            </div>

            <!-- For login
               <label> <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me </label>
               -->

            <p>If you don't have an account, <a href="register.php" style="color:dodgerblue">register</a>. </p>

            <div class="clearfix">
               <button type="submit" name="login" class="signupbtn">Log in</button>
            </div>

         </div>
      </form>
   </div>
   </div>
   </div>
</body>

<script>
    var loginModal = document.getElementById('loginModalId');
    loginModal.style.display = "hidden";
</script>

</html>