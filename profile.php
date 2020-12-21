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
    require_once("./auth.php");//mengecek login atau belum
    $nama = $_SESSION['nama'];
    $user_id = $_SESSION['id'];
    if (!isset($_GET['id'])) { //kalau id dalam get ada pakai get[id] kalau tidak ada pakai session
        $id  = $user_id;
    } else {
        $id = $_GET['id'];
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
        <a class="navbar-brand font-judul" href="./"><i class="fas fa-user-friends">iVory</i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item my-2">
                    <a class="text-light ml-3 font-weight-bolder" href="./homepage.php" style="font-size: 16px;">
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
                                    $query = "SELECT p.* FROM projects p, users u, workspace w WHERE u.user_id = w.user_id and p.project_id = w.project_id and u.user_id = $user_id ;";
                                    $union = mysqli_query($conn, $query); //union merupakan query gabungan 3 tabel yang mencari semua project berdasarkan id
                                    while ($hasil = mysqli_fetch_assoc($union)) {
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
            <?php
            $query = "SELECT * FROM users WHERE user_id = $id ;"; // mencari user 
            $data = mysqli_query($conn, $query);
            $hasil = mysqli_fetch_assoc($data);
            ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <h1 class="judul">Profile</h1>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 bg-secondary rounded shadow-lg text-light m-auto p-5" style="margin-top: 250px;">
                    <h2 style="text-shadow: 2px 2px 2px #000000;"><?php echo $hasil['name'] ?></h2>
                    <div style="text-shadow: 2px 2px 5px #000000;">
                        <p><strong>About: </strong><?php echo $hasil['about'] ?></p>
                        <p><strong>Hobbies: </strong><?php echo $hasil['hobby'] ?></p>
                        <p><strong>Skills: </strong>
                            <span class="tags"><?php echo $hasil['skill'] ?></span>
                        </p>
                        <!-- jadi kalau akses melalui user profile dia ada tombol edit 
                        sedangkan jika melalui project engga ada -->
                        <?php if (!isset($_GET['id'])) { ?>
                            <button type="button" class="btn btn-light rounded-circle shadow" role="button" data-toggle="modal" data-target="#TestModal"><b>Edit</b></button>
                        <?php }; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal tambah project-->
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
                            <textarea class="form-control" id="Textarea" placeholder="Description" required="" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" name="desc"></textarea>
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
    <!-- modal edit profile -->
    <div class="modal fade" id="TestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="./action_editprofile.php">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputjudul">Name</label>
                            <input name="name" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter your name" value="<?php echo $hasil['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul">About</label>
                            <textarea name="about" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter description about you"><?php echo $hasil['about'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul">Hobbies</label>
                            <input name="hobby" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter your hobbies" value="<?php echo $hasil['hobby'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul">Skills</label>
                            <input name="skill" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter your skills" value="<?php echo $hasil['skill'] ?>">
                        </div>
                        <input type="hidden" name="userID" value="<?php echo $id ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-secondary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>