<?php
require_once("./connect.php");
$childID = $_POST['childID'];
$project_id = $_POST['projectID'];

$query = "DELETE FROM sprint_child where child_id = $childID";
$hasil = mysqli_query($conn, $query);

if ($hasil) {
    header("location:./detail.php?id=" . $project_id);
} else {
    header("location:./");
}
