<?php
    require_once("./connect.php");
    $id = $_GET['id'];
    $userid = $_SESSION['id'];
    $checker = false;
    $query = "SELECT * from workspace where project_id = '$id' ";
    $data = mysqli_query($conn, $query);
    while ($result = mysqli_fetch_assoc($data)) {
        if ( $userid == $result['user_id']) {
            $checker = true;
        }
    }
    
    if (!$checker) {
        header("location:./homepage.php?msg=405");
    }
