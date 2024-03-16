<?php
include('../auth_session.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="assets/css/dash.css" /><!-- connected sa CSS -->
    <title>Welcome</title>
</head>

<header>
    <h1>ADMIN DASHBOARD</h1>
</header> <br><br>

<body>
    <div class="center">
        <div class="container">
            <h2>Hello, <?php echo $_SESSION['username']; ?>!</h2>
            <p>You are now in the admin dashboard page.</p>
            <hr>
            <h3>View/Update/Delete/Search Users Information.</h3>
            <button class="quizbtn" onclick="document.location='student_list.php'">VIEW INFORMATION</button> <br>
            <h3>Search Questions</h3>
            <button class="quizbtn" onclick="document.location='questions.php'">VIEW QUESTIONS</button> <br>
            <h3>Update Questions</h3>
            <button class="quizbtn" onclick="document.location='admin_updateques.php'">VIEW QUESTIONS</button> <br>
            <h3>Delete Questions</h3>
            <button class="quizbtn" onclick="document.location='admin_deleteques.php'">VIEW QUESTIONS</button> <br>
            <br> <button class="quizbtn" onclick="document.location='logout_admin.php'">LOGOUT</button>
        </div>

</body>

</html>