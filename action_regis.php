<?php
require_once "./utils.php";

$nama = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

if ($nama == null || $email == null || $password == null) {
  header("location:./signup.php?msg=blankFill");
} else {
  $data = "name=$nama&email=$email&pass=$password";

  $result = callAPI("POST",  $localhost.'register', $data);

  if ($result["error"] == 0) {
    header("location:./login.php?msg=regis");
  } else if ($result["message"] == "Register Unsuccessfull! Email has been added!!!") {
    header("location:./signup.php?msg=emailHasBeenAdded");
  } else {
    header("location:./login.php");
  }
}
