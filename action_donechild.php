<?php
require_once("./utils.php");

$child_id = $_POST['childID'];
$project_id = $_POST['projectID'];

$status = $_POST['status'];
if($status == 1) $data = "status=0&child_id=$child_id";
if($status == 0) $data = "status=0&child_id=$child_id";

$result = callAPI("PUT", $localhost . "doneChild/$child_id", $data);

if ($result["error"] == 0) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
