<?php
require_once "./utils.php";

$title = $_POST["title"];
$project_id = $_POST["projectID"];

$data = "parent_title=$title";
$result = callAPI("POST", $localhost . "addParent/$project_id", $data);

if ($result["error"] == 0) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
