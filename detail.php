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
  <link rel="stylesheet" href="./detail.css">
</head>

<body>
  <?php
  require_once("./connect.php");
  require_once("./auth.php"); //mengecek udah login atau belum
  require_once("./auth_detail.php"); //mengecek akses project

  if (isset($_GET['msg'])) {
    if ($_GET['msg'] == "added") { //berhasil registrasi
      echo "<script>alert('Added Member Successfull')</script>";
    } else if ($_GET['msg'] == "hasAdded") { //pasword atau email salah
      echo "<script>alert('Email has been added before')</script>";
    } else if($_GET['msg'] == "emailNotFound"){
      echo "<script>alert('Email not found')</script>";
    } else if($_GET['msg'] == "fillEmail"){
      echo "<script>alert('Fill email form!!!')</script>";
    }
  }


  $nama = $_SESSION['nama'];
  $user_id = $_SESSION['id'];
  $project_id = $_GET['id'];
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
                  require_once "./utils.php";
                  $data = "user_id=$user_id";
                  $result = callAPI("GET", $localhost . "showProjectTitle/$user_id", $data);
                  if ($result["error"] == 0) { // check if theres project or not
                    $resultData = $result["data"];
                    for ($i = 0; $i < count($resultData); $i++) {
                  ?>
                      <a class="dropdown-item" href="./detail.php?id=<?php echo $resultData[$i]["project_id"];  ?>"><?php echo $resultData[$i]["title"]; ?></a>
                  <?php }
                  } ?>
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

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 p-1">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <!-- get title project -->
          <?php
          $data = "project_id=$project_id";
          $result = callAPI("GET", $localhost . "getDataProject/$project_id", $data);
          if ($result["error"] == 0) { // check if theres project or not
            $resultData = $result["data"];
          ?>
            <h1 class="h2"><?php echo $resultData[0]["title"] ?></h1>
          <?php } ?>
          <!-- invite teman -->
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">

              <!-- show member project -->
              <?php
              $data = "project_id=$project_id";
              $result = callAPI("GET", $localhost . "getMemberProject/$project_id", $data);
              if ($result["error"] == 0) { // check if theres project or not
                $resultData = $result["data"];
                for ($i = 0; $i < count($resultData); $i++) {
              ?>
                  <a class="btn btn-secondary rounded-circle mx-1" href="./profile.php?id=<?php echo $resultData[$i]["user_id"] ?>" title="<?php echo $resultData[$i]["name"] ?>">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                    </svg>
                  </a>
              <?php
                }
              }
              ?>
            </div>
            <button type="button" data-toggle="modal" data-target="#TestModal" class="btn btn-sm btn-outline-secondary">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="mb-1 bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg>
              Invite
            </button>
          </div>
        </div>
        <div class="scrollmenu container rounded-lg shadow p-2 Flipped" style="display: flex;">

          <!-- show sprint parent title -->
          <?php
          $data = "project_id=$project_id";
          $result1 = callAPI("GET", $localhost . "getParentByProjectID/$project_id", $data);
          if ($result1["error"] == 0) { // check if theres project or not
            $resultData = $result1["data"];
            for ($i = 0; $i < count($resultData); $i++) {
          ?>
              <div id="parentcard" class="card m-3 col-md-3 shadow Content" style="width: 18rem; height:100%;">
                <div class="card-body">
                  <h5 class="card-title d-inline mr-5"><?php echo $resultData[$i]['parent_title'] ?></h5>

                  <!-- show sprint child -->
                  <?php
                  $data = "parent_id=" . $resultData[$i]["parent_id"];
                  $result = callAPI("GET", $localhost . "getChildByParentID/" . $resultData[$i]['parent_id'], $data);

                  if ($result["error"] == 0) { // check if theres project or not
                    $resultData2 = $result["data"];
                    for ($k = 0; $k < count($resultData2); $k++) {
                  ?>
                      <div class="card my-2" style="width: 100%; max-width:12em;">
                        <div class="card-body p-1 ">
                          <p class="card-title d-inline" style="height: auto;">
                            <?php if ($resultData2[$k]['status'] == 0) { ?>
                              <span class=""><?php echo $resultData2[$k]['child_title'] ?>
                              </span>
                            <?php } else { ?>
                              <span style="text-decoration:line-through"><?php echo $resultData2[$k]['child_title'] ?>
                              </span>
                            <?php } ?>
                          </p>
                          <div>
                            <form action="./action_donechild.php" method="post" class="float-right d-inline">
                              <button type="submit" class="btn text-success p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-check-circle" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                </svg>
                                <input type="hidden" name="status" value="<?php echo $resultData2[$k]['status'] ?>">
                                <input type="hidden" name="childID" value="<?php echo $resultData2[$k]['child_id'] ?>">
                                <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
                              </button>
                            </form>
                            <form action="./action_deletechild.php" method="post" class="float-right d-inline">
                              <button type="submit" class="btn text-danger p-0">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                                <input type="hidden" name="childID" value="<?php echo $resultData2[$k]['child_id'] ?>">
                                <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                  <?php
                    }
                  }
                  ?>
                  <hr>
                  <div class="btn-group dropright d-inline">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu">
                      <!-- sedikit javascript untuk manipulasi nilai di modal -->
                      <a id="editparent" bikinan="<?php echo $resultData[$i]['parent_id'] ?>" role="button" data-toggle="modal" data-target="#EditSprintModal" class="dropdown-item" href="#">Edit</a>
                      <form action="./action_deleteparent.php" method="post">
                        <input type="hidden" name="parentID" value="<?php echo $resultData[$i]['parent_id'] ?>">
                        <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
                        <button type="submit" class="btn dropdown-item">Delete</button>
                      </form>
                    </div>
                  </div>
                  <!-- sedikit javascript untuk manipulasi nilai di modal -->
                  <button id="editparent" bikinan="<?php echo $resultData[$i]['parent_id'] ?>" type="button" data-toggle="modal" data-target="#CardModal" class="btn btn-sm btn-outline-secondary">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="mb-1 bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                      <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    Add Card
                  </button>
                </div>
              </div>
          <?php
            }
          }
          ?>
          <button type="button" data-toggle="modal" data-target="#AddSprintModal" href="#" class="btn btn-secondary  p-0" style="opacity: 0.7;">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="text-center bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </button>
        </div>
    </div>
    </main>
  </div>
  </div>

  <!-- Modal buat projedt -->
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
  <!-- Modal invite teman -->
  <div class="modal fade" id="TestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Invite To Board </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="./action_invite.php">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputjudul">Email</label>
              <input name="email" type="text" class="form-control shadow" required id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter Friends Email">
            </div>
            <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-secondary">Invite</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal buat task/card -->
  <div class="modal fade" id="CardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add a Card </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidde n="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="./action_addchild.php">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputjudul">Task</label>
              <input name="task" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter your task">
            </div>
            <input type="hidden" name="parentID" value="0" id="parentcardid">
            <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-secondary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal buat sprint -->
  <div class="modal fade" id="AddSprintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add sprint to board</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="./action_addparent.php">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputjudul">Title </label>
              <input name="title" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter sprint title">
            </div>
            <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-secondary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal edit sprint -->
  <div class="modal fade" id="EditSprintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit sprint</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="./action_editparent.php">
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputjudul">Title</label>
              <input name="title" type="text" class="form-control shadow" id="exampleInputjudul" aria-describedby="judulHelp" placeholder="Enter sprint title">
            </div>
            <input type="hidden" name="projectID" value="<?php echo $project_id ?>">
            <input type="hidden" name="parentID" value="0" id="parentID">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-secondary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./detail.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>