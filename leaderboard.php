<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = 'tetris';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn){
    echo 'Connection error: ' . mysqli_connection_error();
}

// Write query (For all scores)
$sql = 'SELECT Username, Score FROM Scores ORDER BY Score';

// Make query and get results
$result = mysqli_query($conn, $sql);

// 
$scores = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 
mysqli_free_result($result);

// 
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Leaderboard</title>
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

    <div class="modal-content">
    <img src="tetris.png" style="width: 95%; opacity: 15%;">
      <table class="tableStyle">
         <thead>
            <tr>
               <th>Score</th>
               <th>Username</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1280000</td>
               <td>Roan</td>
            </tr>
            <tr>
               <td>cell1_2</td>
               <td>cell2_2</td>
            </tr>
            <tr>
               <td>cell1_3</td>
               <td>cell2_3</td>
            </tr>
            <tr>
               <td>cell1_4</td>
               <td>cell2_4</td>
            </tr>
            <tr>
               <td>cell1_5</td>
               <td>cell2_5</td>
            </tr>
         </tbody>
      </table>
</div>
   </body>
</html>
