<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="assets/css/login.css" /><!-- CSS -->

  <title>Register</title>
</head>

<body>
  <div class="container"> <br><br>
    <h1>LOGIN</h1>
    <center>
      <h2>Please login here to proceed.</h2>
      <center>
        <hr>
        <form method="post" action="process.php"> <!-- Form is submitted to process.php-->
          <label for="username"><b>Username: </b></label>
          <input type="text" placeholder="Enter Username" name="username" required>

          <label for="psw"><b>Password: </b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
          <br>

          <button type="submit" class="signupbtn" name="submit">LOGIN</button>
          <br>
          <p>Don't have an account yet? <a href="register.php">Sign up here.</a></p>
        </form>
  </div>

</body>

</html>