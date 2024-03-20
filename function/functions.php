<?php
include('../mysql_connect.php');

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);
}

function getChoices($conn, $question_id)
{
    $query = "SELECT * FROM tb_choices WHERE question_id = $question_id";
    return mysqli_query($conn, $query);
}


?>