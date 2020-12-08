<?php
require_once("./connect.php");
$id = $_POST['id'];

$query = "DELETE FROM projects where project_id = $id";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
    header("location:./homepage.php");
} else {
    header("location:./");
}
