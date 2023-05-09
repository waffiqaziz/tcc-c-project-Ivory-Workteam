<?php
require_once "./utils.php";

$child_title = $_POST["task"];
$parent_id = $_POST["parentID"];
$project_id = $_POST["projectID"];

$data = "child_title=$child_title&parent_id=$parent_id";
$result = callAPI("POST", $localhost . "addChild/$parent_id", $data);

if ($result["error"] == 0) {
    header("location:./detail.php?id=".$project_id);
} else {
    header("location:./");
}
