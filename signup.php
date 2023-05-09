<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IVORY</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./index.css">
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['login'])) {//jika sudah login di kembalikan ke hompage
      header("location:./homepage.php");
  }
  if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "emailHasBeenAdded") { //berhasil registrasi
      echo "<script>alert('Register Unsuccessfull! Email has been added!!!')</script>";
    } else if($_GET['msg'] == "blankFill"){
      echo "<script>alert('Fill all the requirements')</script>";
    }
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark melayang">
    <a class="navbar-brand font-judul" href="./"><i class="fas fa-user-friends">iVory</i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a href="./login.php" class="btn btn-light my-2 my-sm-0 mr-2 text-dark">Login</a>
        <a href="./signup.php" class="btn btn-outline-light my-2 my-sm-0">Registrasi</a>
      </form>
    </div>
  </nav>
  <main class="utama bg-dark">
    <div class="container w-50 deskripsi text-light bg-secondary p-5 rounded-lg shadow">
      <form method="POST" action="./action_regis.php">
        <div class="form-group">
          <label for="exampleInputNama">Name</label>
          <input name="name" type="text" class="form-control shadow" id="exampleInputNama" aria-describedby="NamaHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control shadow" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control shadow" id="exampleInputPassword1" placeholder="Password">
        </div>
        <p class="text-light">Dengan mendaftar, anda setuju dengan aturan pelayanan dan penggunaan kami</p>
        <button type="submit" class="btn btn-dark mt-2 shadow">Submit</button>
      </form>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>