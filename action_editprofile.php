<?php
require_once("./connect.php");
$nama = $_POST["name"];
$about = $_POST["about"];
$hobby = $_POST["hobby"];
$skill = $_POST["skill"];
$id = $_POST["userID"];

$query = "UPDATE users SET name='$nama', about='$about', hobby='$hobby', skill='$skill' WHERE user_id=$id";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./profile.php");
} else {
    header("location:./");
}
