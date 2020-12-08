<?php
require_once("./connect.php");
$parentID = $_POST['parentID'];
$project_id = $_POST['projectID'];

$query = "DELETE FROM sprint_parent where parent_id = $parentID";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./detail.php?id=".$project_id);
} else {
    header("location:./");
}

