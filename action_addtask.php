<?php
require_once("./connect.php");
$task = $_POST["task"];
$parent_id = $_POST["parentID"];
$project_id = $_POST["projectID"];

$query = "INSERT INTO sprint_child (child_title, parent_id) VALUES('$task','$parent_id')";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./detail.php?id=".$project_id);
} else {
    header("location:./");
}
