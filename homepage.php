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
    require_once("./auth.php"); //mengecek login atau belum
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "login") {
            echo "<script>alert('Anda Berhasil Login')</script>";
        } else if ($_GET['msg'] == "405") { //jikalau akses halaman orang lain
            echo "<script>alert('Nyasar sob?')</script>";
        } else if ($_GET['msg'] == "400") { //tanggal project kurang betul
            echo "<script>alert('Tanggalnya udah bener belum?')</script>";
        }
    }
    $nama = $_SESSION['nama'];
    $id = $_SESSION['id'];

    ?>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
        <a class="navbar-brand font-judul" href="./"><i class="fas fa-user-friends">iVory</i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item my-2">
                    <a class="text-light ml-3 font-weight-bolder" href="#" style="font-size: 16px;">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="mb-1 bi bi-calendar3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                            <path fill-rule="evenodd" d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        </svg>
                        <span class="mt-2">Dashboard</span>
                    </a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $nama ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="./profile.php">Profile</a>
                        <a class="dropdown-item" href="./action_logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="height:100vh;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column p-1">
                        <li>
                            <div class="dropright m-1">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Workspace
                                </button>
                                <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                    <?php
                                    require_once("./connect.php");
                                    $query = "SELECT p.* FROM projects p, users u, workspace w WHERE u.user_id = w.user_id and p.project_id = w.project_id and u.user_id = $id ;";
                                    $data = mysqli_query($conn, $query); //mencari project berdasarkan user
                                    while ($hasil = mysqli_fetch_assoc($data)) {
                                    ?>
                                        <a class="dropdown-item" href="./detail.php?id=<?php echo $hasil['project_id']  ?>"><?php echo $hasil['judul'] ?></a>
                                    <?php
                                    }
                                    ?>
                                    <a class="dropdown-item font-weight-bold" role="button" data-toggle="modal" data-target="#exampleModal">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="mb-1 bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                        </svg>
                                        Add another...
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h2">My Boards</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <div class="dropdown">
                                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    This Week
                                </a>
                                <div class="dropdown-menu w-50 p-0" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Week</a>
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-display container ">
                    <div class="row row-cols-* m-auto">
                        <?php
                        require_once("./connect.php");
                        $query = "SELECT p.* FROM projects p, users u, workspace w WHERE u.user_id = w.user_id and p.project_id = w.project_id and u.user_id = $id ;";
                        $data = mysqli_query($conn, $query); //mencari project berdasarkan user
                        while ($hasil = mysqli_fetch_assoc($data)) {
                        ?>
                            <div class="card m-3 col-md-3 shadow" style="width: 28rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $hasil['judul'] ?>
                                        <!-- disini ada sedikit javascript untuk mengoper nilai projectid -->
                                        <button id="editparent" bikinan="<?php echo $hasil['project_id'] ?>" data-toggle="modal" type="button" data-target="#myModal" class="btn text-danger p-0">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </button>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-danger small"><?php echo $hasil['deadline'] ?></h6>
                                    <p class="card-text"><?php echo $hasil['deskripsi'] ?></p>
                                    <a href="./detail.php?id=<?php echo $hasil['project_id']  ?>" class="card-link">Detail</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal buat project -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Workspace</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="./action_addproject.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputjudul">Project Name</label>
                            <input name="judul" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter Project Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdesc">Project description</label>
                            <textarea class="form-control shadow" id="Textarea" placeholder="Description" required="" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" name="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputdate">Deadline</label>
                            <input name="date" type="date" class="form-control shadow" id="exampleInputdate" aria-describedby="dateHelp" placeholder="Enter email">
                            <small>Project due to?</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-secondary">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal alert delete -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <h4 class="modal-title w-100">Yakin mau hapus?</h4>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="./action_deleteproject.php" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                        <input type="hidden" name="id" value="0" id="projID">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src=" ./homepage.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>