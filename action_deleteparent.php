<?php
require_once "./utils.php";

$parent_id = $_POST['parentID'];
$project_id = $_POST['projectID'];

$data = "parent_id=$parent_id";
$result = callAPI("DEL", $localhost . "deleteParent/$parent_id", $data);

if ($result["error"] == 0) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
