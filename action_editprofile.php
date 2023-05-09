<?php
require_once "./utils.php";

$nama = $_POST["name"];
$about = $_POST["about"];
$hobby = $_POST["hobby"];
$skill = $_POST["skill"];
$id = $_POST["userID"];

if ($nama == null) {
  header("location:./signup.php?msg=blankFill");
} else {

  $data = "name=$nama&about=$about&skill=$skill&hobby=$hobby";
  $result = callAPI("PUT", $localhost."updateUser/$id", $data);

  if ($result["error"] == 0) {
    header("location:./profile.php");
    session_destroy();
    session_start();
    $_SESSION["nama"] = $nama;
    $_SESSION["id"] = $id;
    $_SESSION["sort"] = "all"; //fitur tambahan
    $_SESSION["login"] = true;
  } else {
  }
}
