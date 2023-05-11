<?php
require_once "./utils.php";
$user_id = 19;
$data = "user_id=$user_id";
$result = callAPI("GET", $localhost . "showProjectTitle/$user_id", $data);
$resultData = $result["data"];

for ($i = 0; $i < count($resultData); $i++) {
	echo $resultData[$i]["title"];
	echo "\n";
}
