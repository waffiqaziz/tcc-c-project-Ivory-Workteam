<?php

require_once "./utils.php";
$email = $_POST["email"];
$password = md5($_POST["password"]); //encrypt password

$data = "email=a@gmail.com&pass=12345678";

$result = callAPI("POST", 'http://localhost:3000/login', $data);
echo nl2br($result["error"]);
echo nl2br($result["data"][0]["user_id"]);
echo nl2br($result["data"][0]["name"]);

if ($result == TRUE) {
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
