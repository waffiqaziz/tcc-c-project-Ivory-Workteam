<?php
require_once("./utils.php");

$parent_title = $_POST["title"];
$project_id = $_POST["projectID"];
$parent_id = $_POST["parentID"];

// $query = "UPDATE sprint_parent SET parent_title ='$title' WHERE parent_id = $parent_id";

$data = "parent_title=$parent_title&parent_id=$parent_id";
$result = callAPI("PUT", $localhost . "editParent/$parent_id", $data);

if ($result["error"] == 0) {
    header("location:./detail.php?id=".$project_id);
} else {
    header("location:./");
}
