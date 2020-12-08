<?php
require_once("./connect.php");
$title = $_POST["title"];
$project_id = $_POST["projectID"];
$parent_id = $_POST["parentID"];

$query = "UPDATE sprint_parent SET parent_judul ='$title' WHERE parent_id = $parent_id";
$hasil = mysqli_query($conn, $query);

if ($hasil) {
    header("location:./detail.php?id=".$project_id);
} else {
    header("location:./");
}
