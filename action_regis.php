<?php
require_once("./connect.php");
$nama = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);

$query = "INSERT INTO users (name, email, password) VALUES('$nama','$email','$password')";
$hasil = mysqli_query($conn,$query);
if ($hasil) {
    header("location:./login.php?msg=regis");
}
else {
    header("location:./");
}
