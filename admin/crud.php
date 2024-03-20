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
}
elseif (isset($_POST['btn_delete'])) {
    //check if the form has been submitted
    $user_id = $_POST['user_id'];
    $query = "DELETE FROM tb_users WHERE user_id=$user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Deleted Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'student_list.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Delete!")';
        echo '</script>';
    }
} elseif (isset($_POST['btn_delete_question'])) {
    //check if the form has been submitted
    $question_id = $_POST['question_id'];
    $query = "DELETE FROM tb_question WHERE question_id=$question_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Deleted Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'questions.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Delete!")';
        echo '</script>';
    }
} elseif (isset($_POST['add_quiz'])) {
    //check if the form has been submitted
    $quiz_name = $_POST['quiz_name'];
    $points = $_POST['points']; //galing sa input tag sa name

    $query = "INSERT INTO tb_quiz (quiz_name, points) VALUES ('$quiz_name', '$points')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Added Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'quiz_list.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Add!")';
        echo '</script>';
    }
}
elseif (isset($_POST['update_quiz'])) {
    //check if the form has been submitted
    $quiz_id = $_POST['quiz_id'];
    $quiz_name = $_POST['quiz_name'];
    $points = $_POST['points']; //galing sa input tag sa name

    $query = "UPDATE tb_quiz SET quiz_name = '$quiz_name', points = '$points' WHERE quiz_id=$quiz_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Updated Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'quiz_list.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Update!")';
        echo '</script>';
    }
} elseif (isset($_POST['btn_delete_quiz'])) {
    //check if the form has been submitted
    $quiz_id = $_POST['quiz_id'];
    $query = "DELETE FROM tb_quiz WHERE quiz_id=$quiz_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Deleted Successfully!")';
        echo '</script>';

        echo "<script>
                document.location.href = 'quiz_list.php';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Delete!")';
        echo '</script>';
    }
} elseif (isset($_POST['add_question'])) {
    //check if the form has been submitted
    $question = $_POST['question'];
    $quiz_id = $_POST['quiz_id']; //galing sa input tag sa name

    $query = "INSERT INTO tb_question (question, quiz_id) VALUES ('$question', '$quiz_id')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Added Successfully!")';
        echo '</script>';

        echo "<script>
                window.location.href = 'manage_question.php?quiz_id=$quiz_id';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Add!")';
        echo '</script>';
    }
    $question_id = mysqli_insert_id($conn); // get the last inserted question_id

    // Loop through the choices and insert them into tb_choice
    foreach ($_POST['choices'] as $key => $choice) {
        $is_right = isset($_POST['is_right'][$key]) ? $_POST['is_right'][$key] : 0;
        $query = "INSERT INTO tb_choices (question_id, choice, is_right) VALUES ('$question_id', '$choice', '$is_right')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Add Choices!")';
            echo '</script>';
        }
    }
}
elseif (isset($_POST['update_question'])) {
    //check if the form has been submitted
    $question_id = $_POST['question_id'];
    $question = $_POST['question'];
    $quiz_id = $_POST['quiz_id']; //galing sa input tag sa name

    $query = "UPDATE tb_question SET question = '$question', quiz_id = '$quiz_id' WHERE question_id=$question_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Updated Successfully!")';
        echo '</script>';

        echo "<script>
                window.location.href = 'manage_question.php?quiz_id=$quiz_id';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Update!")';
        echo '</script>';
    }
    // Loop through the choices and insert them into tb_choice
    foreach ($_POST['choices'] as $key => $choice) {
        $is_right = isset($_POST['is_right'][$key]) ? $_POST['is_right'][$key] : 0;
        $choice_id = $_POST['choice_id'][$key];
        if ($choice_id == 0) {
            $query = "INSERT INTO tb_choices (question_id, choice, is_right) VALUES ('$question_id', '$choice', '$is_right')";
        } else {
            $query = "UPDATE tb_choices SET choice = '$choice', is_right = '$is_right' WHERE choice_id=$choice_id";
        }
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Add Choices!")';
            echo '</script>';
        }
    }
} elseif (isset($_POST['btn_delete_choice'])) {
    //check if the form has been submitted
    $choice_id = $_POST['choice_id'];
    $quiz_id = $_POST['quiz_id'];
    $query = "DELETE FROM tb_choices WHERE choice_id=$choice_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Deleted Successfully!")';
        echo '</script>';

        echo "<script>
                window.location.href = 'manage_question.php?quiz_id=$quiz_id';
            </script>";
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Delete!")';
        echo '</script>';
    }
}

?>
