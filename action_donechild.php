<?php
require_once("./connect.php");
$id = $_POST['childID'];
$project_id = $_POST['projectID'];
$status = $_POST['status'];

if ($status == 1) {
    $query = "UPDATE sprint_child SET status = 0  WHERE child_id=$id";
}
else{
    $query = "UPDATE sprint_child SET status = 1  WHERE child_id=$id";
}
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
