<?php
    require_once "./connect.php";
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $query = "select * from users where email='$email' and password='$password';";
    $hasil= mysqli_query($conn,$query);
    $cek= mysqli_num_rows($hasil);
    if ($cek==1){
        echo("Login Berhasil");
        session_start();
        $data= mysqli_fetch_array($hasil);
        $_SESSION["nama"]=$data["name"];
        $_SESSION["id"] = $data["user_id"];
        $_SESSION["login"]=true;
        header("location:./homepage.php?msg=login");
    }
    else{
        echo("Login Gagal");
        header("location:./login.php?msg=loginfail");
    }
