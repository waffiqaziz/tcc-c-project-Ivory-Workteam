<?php
require_once("./connect.php");

session_start();

$nama  = $_SESSION['nama'];
$query = "select user_id from users where name = '$nama'";
$data = mysqli_query($conn, $query);
$hasil = mysqli_fetch_assoc($data);
$user_id = (int)$hasil['user_id'];


$judul = $_POST["judul"];
$desc = $_POST["desc"];
$deadline = $_POST["date"];
$created_at = date("Y-m-d");
$status = 0;//project belum selesai
$role  = 0;//untuk owner project

if ( $deadline < $created_at) {
    header("location:./homepage.php?msg=400");
    die();
}

$query = "INSERT INTO projects (judul, deskripsi, deadline, status, created_at) VALUES('$judul','$desc','$deadline','$status','$created_at')";
$hasil = mysqli_query($conn, $query);

$query = "select project_id from projects where judul = '$judul' and created_at = '$created_at' ";
$data = mysqli_query($conn, $query);
$hasil = mysqli_fetch_assoc($data);
$projects_id = (int)$hasil['project_id'];
//insert table pivot
$query = "INSERT INTO workspace (user_id, project_id, role) VALUES('$user_id','$projects_id','$role')";
$hasil = mysqli_query($conn, $query);

//langsung buat sprint baru
$parent_judul = 'New...';

$query = "INSERT INTO sprint_parent (parent_judul, project_id) VALUES('$parent_judul','$projects_id')";
$hasil = mysqli_query($conn, $query);


if ($hasil) {
    header("location:./homepage.php");
} else {
    header("location:./");
}
