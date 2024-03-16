<?php
include("auth_session.php");
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="assets/css/design.css" /><!-- connected sa CSS -->
  <title>Welcome</title>
</head>

<header>
  <h1>STUDENT DASHBOARD</h1>
</header>

<body>
  <div class="center">
    <div class="container">
      <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
      <p>You are now in the student dashboard page.</p>
      <hr>
      <p>Take the quiz.</p>
      <button type="button" onclick="btnConfirm()" class="quizbtn">QUIZ PAGE</button>

      <!-- pag click yung button may alert na lalabas -->
      <script>
        function btnConfirm() {
          if (!confirm("You will now proceed to take the quiz.")) return false;
          location.href = "user_quizpage.php";
        }
      </script>

      <p>View/Update User Information.</p>
      <button class="quizbtn" onclick="document.location='view_user_details.php'">VIEW INFORMATION</button> <br> <br>
      <br> <button class="quizbtn" onclick="document.location='logout_user.php'">LOGOUT</button>
    </div>