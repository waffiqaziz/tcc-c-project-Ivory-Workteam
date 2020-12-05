<?php
require_once("./connect.php");

session_start();

$email  = $_POST['email'];
$query = "select user_id from users where email = '$email'";
$data = mysqli_query($conn, $query);
$hasil = mysqli_fetch_assoc($data);
$user_id = (int)$hasil['user_id'];


$projects_id = $_POST['projectID'];
$role  = 1;


$query = "INSERT INTO workspace (user_id, project_id, role) VALUES('$user_id','$projects_id','$role')";
$hasil = mysqli_query($conn, $query);



if ($hasil) {
    header("location:./detail.php?id=".$projects_id);
} else {
    header("location:./");
}
