<?php
require_once "./utils.php";

$email = $_POST["email"];
$password = $_POST["password"]; //encrypt password

if($email == null || $password == null){
 echo "<script>alert('Fill all the requirements')</script>";
 header("location:./login.php?msg=loginfail");
} else{
  $data = "email=$email&pass=$password";
  
  $result = callAPI("POST", $localhost."login", $data);

  if ($result["error"] == 0) {
    echo ("Login Berhasil");
    session_start();
    $_SESSION["nama"] = $result["data"][0]["name"];
    $_SESSION["id"] = $result["data"][0]["user_id"];
    $_SESSION["sort"] = "all"; //fitur tambahan
    $_SESSION["login"] = true;
    header("location:./homepage.php?msg=login");
  } else {
    echo ("Login Gagal");
    header("location:./login.php?msg=loginfail");
  }
}