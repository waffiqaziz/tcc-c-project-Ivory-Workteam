<?php
require_once "./utils.php";
session_start();

$nama  = $_SESSION['nama'];
$user_id = $_SESSION["id"];
$title = $_POST["title"];
$description = $_POST["description"];
$deadline = $_POST["date"];
$created_at = date("Y-m-d");
$status = 0;//project belum selesai
$role  = 0;//untuk owner project

if ( $deadline < $created_at) {
    header("location:./homepage.php?msg=400");
    die();
}

$data = "title=$title&deadline=$deadline&description=$description&status=$status&created_at=$created_at";
$result = callAPI("POST", $localhost . "addProject/$user_id", $data);

if ($result["error"] == 0) {
    echo ("Add project successfully");
    header("location:./homepage.php");
} else {
    header("location:./");
}