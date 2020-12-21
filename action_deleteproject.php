<?php
require_once("./connect.php");
$id = $_POST['id'];

$query = "SELECT parent_id from sprint_parent where project_id = '$id' ";
$data = mysqli_query($conn, $query);
//delete child
while ($result = mysqli_fetch_assoc($data)){
    $parent_id = $result['parent_id'];
    $query = "DELETE FROM sprint_child where parent_id = $parent_id ";
    $hasil = mysqli_query($conn, $query);
}
//delete project
$query = "DELETE FROM projects where project_id = $id";
$hasil = mysqli_query($conn, $query);
//delete parent
$query = "DELETE FROM sprint_parent where project_id = $id";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./homepage.php");
} else {
    header("location:./");
}
