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
if (isset($_SESSION['login'])) {
    header("location:./homepage.php");
}
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "errlogin") {
        echo "<script>alert('Anda Belum Login')</script>";
    } else if ($_GET['msg'] == "logout") {
        echo "<script>alert('Anda berhasil Logout')</script>";
    }
}
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark melayang">
        <a class="navbar-brand font-judul" href="#"><i class="fas fa-user-friends">iVory</i></a>
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
        <div class="row">
            <div class="my-5 text-light deskripsi">
                <h1 class="">IVORY helps teams work more collaboratively and get more done.</h1>
                <p class="mt-2">
                    Ivory’s boards, lists, and cards enable teams to organize and prioritize projects in a fun, flexible, and rewarding way.
                </p>
                <a href="./signup.php" class="btn btn-outline-light mb-2">Sign Up - It's Free!</a>
            </div>
        </div>
    </main>
    <hr class="my-1">
    <main class="sekon">
        <div class="container">
            <h3 class="text-center ">See how it works</h3>
            <h4 class="text-center ">Go from idea to action in seconds with Ivory's intuitively simple boards, lists, and cards.</h4>
            <div id="carouselExampleIndicators" class="carousel slide bg-geser" data-ride="carousel">
                <div class="carousel-item active">
                    <img src="./src/gambar1.png" class="d-block w-gambar rounded-lg shadow text-center" alt="gambar">
                </div>
                <div class="carousel-item ">
                    <img src="./src/gambar2.png" class="d-block w-gambar rounded-lg shadow text-center" alt="gambar">
                </div>
                <div class="carousel-item ">
                    <img src="./src/gambar3.png" class="d-block w-gambar rounded-lg shadow text-center" alt="gambar">
                </div>
                <div class="carousel-item ">
                    <img src="./src/gambar4.png" class="d-block w-gambar rounded-lg shadow text-center" alt="gambar">
                </div>
                <div class="carousel-item ">
                    <img src="./src/gambar5.png" class="d-block w-gambar rounded-lg shadow text-center" alt="gambar">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </main>
    <footer>
        <hr>
        <h5 class="text-center">Copyright</h5>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>