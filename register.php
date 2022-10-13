<?php
   $servername = 'localhost';
   $username = 'username';
   $password = 'password';
   $database = 'tetris';
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if (!$conn){
       echo 'Connection error: ' . mysqli_connection_error();
   }
   
   if(isset($_POST['signup'])){
       $firstName = $_POST['firstName'];
       $lastName = $_POST['lastName'];
       $username = $_POST['username'];
       $password = $_POST['userpassword1'];
       $passwordRepeat = $_POST['userpassword2'];
       $displayScores = (int)$_POST['contact'];

       $sql = "INSERT INTO Users (UserName, FirstName, LastName, Password, Display) VALUES ('$username','$firstName','$lastName','$password','$displayScores')";
    
       if(mysqli_query($conn, $sql)){
         echo "Sign up successful.";
       } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
       }
          
      }
   
?>

<!DOCTYPE html>

<html>

<head>
   <title> Register </title>
   <link rel="stylesheet" href="registerStyle.css" />
</head>

<form class="fullscreenModal" method="post" action="index.php">

   <div class="container">
      <h1 style="font-family: Arial, Helvetica, sans-serif;">Register</h1>
      <p>Please fill in this form to create an account.</p>

      <div id="errors">
         <ul></ul>
      </div>
      <hr>

      <div class="form-control">
         <label for="firstName"><b>First name</b></label>
         <input type="text" id="firstName" name="firstName" placeholder="Enter first name">
      </div>

      <div class="form-control">
         <label for="lastName"><b>Last name</b></label>
         <input type="text" id="lastName" name="lastName" placeholder="Enter last name">
      </div>

      <div class="form-control">
         <label for="username"><b>Username</b></label>
         <input type="text" id="username" name="username" placeholder="Enter username">
      </div>

      <div class="form-control">
         <label for="userpassword1"><b>Password</b></label>
         <input type="password" id="userpassword1" name="userpassword1" placeholder="Enter password">
      </div>

      <div class="form-control">
         <label for="userpassword2"><b>Confirm Password</b></label>
         <input type="password" id="userpassword2" name="userpassword2" placeholder="Repeat password">
      </div>

      <div class="form-control-2">
         <label for="leaderboardDisplay">
            <b>Display Scores on leaderboard</b>
            <div style="margin: 5px 0px 0px 0px;">
         </label>
         <p><input type="radio" id="yesChoice" name="contact" value="2" required> Yes </input></p>
         <p><input type="radio" id="noChoice" name="contact" value="1" required> No </input></p>
      </div>

      <p>If you already have an account, <a href="index.php" style="color:dodgerblue">login</a>.</p>

      <div class="form-control">
         <button type="submit" name="signup">Sign Up</button>
      </div>

      <div id="errors">
         <ul></ul>
      </div>
   </div>

</form>

<script>
   let form = document.querySelector("form");
   let firstName = document.getElementById("firstName");
   let lastName = document.getElementById("lastName");
   let username = document.getElementById("username");
   let userpassword1 = document.getElementById("userpassword1");
   let userpassword2 = document.getElementById("userpassword2");
   let errorEl = document.getElementById("errors").querySelector("ul");
   form.addEventListener('submit', function(e) {
      let errors = [];
      // First name
      if (firstName.value.trim() == "") {
         errors.push("First name is required");
      } else if (/[^a-zA-Z]/.test(firstName.value.trim())) {
         errors.push("First name can only contain letters");
      }
      // Last name
      if (lastName.value.trim() == "") {
         errors.push("Last name is required");
      } else if (/[^a-zA-Z]/.test(lastName.value.trim())) {
         errors.push("Last name can only contain letters");
      }
      // Username
      if (username.value.trim() == "") {
         errors.push("Username is required");
      }
      // Password
      if (userpassword1.value.trim() == "") {
         errors.push("Password is required");
      } else if (userpassword1.value.length < 6) {
         errors.push("Password must be 6 characters or more");
      }
      // Repeat password
      if (userpassword2.value.trim() == "") {
         errors.push("Confirm Password is required");
      } else if (userpassword2.value !== userpassword1.value) {
         errors.push("Password not matching");
      }

      if (errors.length > 0) {
         e.preventDefault();
         errorEl.innerHTML = "";
         errors.forEach(e => {
            errorEl.innerHTML += `<li>${e}</li>`;
         });
      }
   })
</script>

</html>