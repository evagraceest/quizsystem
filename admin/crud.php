<?php
include('../mysql_connect.php');
if (isset($_POST['btn_update'])) {
    //check if the form has been submitted
    $user_id = $_POST['user_id'];
    $ln = $_POST['lastName']; //galing sa input tag sa name
    $fn = $_POST['firstName'];
    $mn = $_POST['middleName'];
    $course = $_POST['course'];
    $yr = $_POST['year_level'];
    $sub = $_POST['subject'];
    $sec = $_POST['section'];
    $email = $_POST['email'];
    $con = $_POST['contact'];

    $query = "UPDATE tb_users SET user_id = '$user_id', lastName = '$ln', firstName = '$fn', middleName= '$mn', course='$course', year_level= '$yr', subject='$sub', section= '$sec', email= '$email', contact= '$con' WHERE user_id=$user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Updated Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'student_list.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Update!")';
        echo '</script>';
    }
} elseif (isset($_POST['btn_question'])) {
    //check if the form has been submitted
    $question_id = $_POST['question_id'];
    $ques = $_POST['questions']; //galing sa input tag sa name

    $query = "UPDATE tb_question SET question_id = '$question_id', questions = '$ques' WHERE question_id=$question_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Updated Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'questions.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Update!")';
        echo '</script>';
    }
}
