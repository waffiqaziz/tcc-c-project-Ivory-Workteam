<?php
require_once("./utils.php");

$projectID = $_GET['id'];
$userid = $_SESSION['id'];
$checker = false;

$data = "project_id=$projectID";
$result = callAPI("GET", $localhost . "authDetail/$projectID", $data);
if ($result["error"] == 0) { // check if theres project or not
	$resultData = $result["data"];
	for ($i = 0; $i < count($resultData); $i++) {
		if ($userid == $resultData[$i]["user_id"]) {
			$checker = true;
		}
	}
}

if (!$checker) {
	header("location:./homepage.php?msg=405");
}
