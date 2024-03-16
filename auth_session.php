<?php
session_start();
include("../mysql_connect.php");

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
