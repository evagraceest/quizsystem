<?php
session_start();
include("mysql_connect.php");

if (isset($_POST['regis'])) {

  // Sanitize user inputs to prevent SQL injection
  $ln = mysqli_real_escape_string($conn, $_POST['lastName']);
  $fn = mysqli_real_escape_string($conn, $_POST['firstName']);
  $mn = mysqli_real_escape_string($conn, $_POST['middleName']);
  $co = mysqli_real_escape_string($conn, $_POST['course']);
  $yr = mysqli_real_escape_string($conn, $_POST['year_level']);
  $sub = mysqli_real_escape_string($conn, $_POST['subject']);
  $sec = mysqli_real_escape_string($conn, $_POST['section']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $con = mysqli_real_escape_string($conn, $_POST['contact']);
  $un = mysqli_real_escape_string($conn, $_POST['username']);
  $ps = mysqli_real_escape_string($conn, $_POST['password']);

  // Check if username or email already exist
  $check_query = "SELECT * FROM tb_users WHERE username = '$un' OR email = '$email'";
  $check_result = mysqli_query($conn, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    echo '<script type="text/javascript">';
    echo 'alert("This username or email already exists!")';
    echo '</script>';
    echo "<script>document.location.href = 'register.php';</script>";
  } else {
    // Insert new user
    $insert_query = "INSERT INTO tb_users (lastName, firstName, middleName, course, year_level, subject, section, email, contact, username, password) VALUES ('$ln', '$fn', '$mn', '$co', '$yr', '$sub', '$sec', '$email', '$con', '$un', '$ps')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
      echo '<script type="text/javascript">';
      echo 'alert("You have registered successfully!")';
      echo '</script>';
      echo "<script>document.location.href = 'index.php';</script>";
    } else {
      echo '<script type="text/javascript">';
      echo 'alert("Registration failed!")';
      echo '</script>';
      echo "<script>document.location.href = 'register.php';</script>";
    }
  }
} else if (isset($_POST['submit'])) {
  // Check if the login form has been submitted
  $un = mysqli_real_escape_string($conn, $_POST['username']);
  $ps = mysqli_real_escape_string($conn, $_POST['password']);

  // Check credentials
  $login_query = "SELECT * FROM tb_users WHERE username = '$un' AND password='$ps'";
  $adminlogin_query = "SELECT * FROM tb_admins WHERE username = '$un' AND password='$ps'";

  $login_result = mysqli_query($conn, $login_query);

  if (mysqli_num_rows($login_result) > 0) {
    echo "<script>window.open('user_dashboard.php','_self')</script>";
    $_SESSION['username'] = $un;
  } else {
    $adminlogin_result = mysqli_query($conn, $adminlogin_query);

    if (mysqli_num_rows($adminlogin_result) > 0) {
      echo "<script>window.open('admin/student_list.php','_self')</script>";
      $_SESSION['username'] = $un;
    } else {
      echo "<script>alert('Username or Password is incorrect!')</script>";
    }
  }
}
?>