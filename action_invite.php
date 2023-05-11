<?php
require_once("./utils.php");

$email  = $_POST['email'];
$projects_id = 	$_POST['projectID'];

// $email  = "a@gmail.com";
// $projects_id = 	86;
$role  = 1; //1 untuk role anggota

// get other user id , before it check the email first
if($email == null) {
	header("location:./detail.php?msg=fillEmail&id=".$projects_id);
} else {
	$data = "email=$email";
	$result = callAPI("GET",  $localhost . "getUserIDbyEmail/$email", $data);

	if ($result["error"] == 1){
		header("location:./detail.php?msg=emailNotFound&id=".$projects_id);
	}else{
		$user_id = $result['data'][0]["user_id"];

		// check if user has been added/not
		$data = "user_id=$user_id&project_id=$projects_id";
		$result = callAPI("GET",  $localhost . 'checkInvitedMember', $data);
		if ($result["error"] == 1) {

			// insert into workspace
			$data = "user_id=$user_id&project_id=$projects_id&role_user=1";
			$result = callAPI("POST",  $localhost . 'addWorkspace', $data);
			if ($result["error"] == 1) {
				header("location:./detail.php?msg=hasAdded&id=".$projects_id);
			} else {
				header("location:./detail.php?msg=added&id=".$projects_id);
			}	
		} else {
			header("location:./detail.php?msg=hasAdded&id=".$projects_id);
		}
	}
}
