<?php
require_once("./connect.php");
$title = $_POST["title"];
$project_id = $_POST["projectID"];

$query = "INSERT INTO sprint_parent (parent_title, project_id) VALUES('$title','$project_id')";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
