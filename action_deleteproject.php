<?php
require_once("./utils.php");

$project_id = $_POST['id'];

$data = "project_id=$project_id";
$result = callAPI("DEL", $localhost . "deleteProject/$project_id", $data);

if ($result["error"] == 0) {
    header("location:./homepage.php");
} else {
    header("location:./");
}
