<?php
require_once("./connect.php");
$parentID = $_POST['parentID'];
$project_id = $_POST['projectID'];

//delete parent
$query = "DELETE FROM sprint_parent where parent_id = $parentID";
$hasil = mysqli_query($conn, $query);
//delete child
$query = "DELETE FROM sprint_child where parent_id = $parentID";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./detail.php?id=".$project_id);
} else {
    header("location:./");
}

