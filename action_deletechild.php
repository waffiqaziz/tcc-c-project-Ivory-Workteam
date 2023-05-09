<?php
require_once "./utils.php";

$child_id = $_POST['childID'];
$project_id = $_POST['projectID'];

$data = "child_id=$child_id";
$result = callAPI("DEL", $localhost . "deleteChild/$child_id", $data);

if ($result["error"] == 0) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
