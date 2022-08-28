<?php 
    // include (dirname(dirname(dirname(__FILE__))). "/app/config/config.php");
    include (dirname(dirname(dirname(__FILE__))). "/app/models/Admin.php");
    include (dirname(dirname(dirname(__FILE__))). "/app/models/User.php");
    include (dirname(dirname(dirname(__FILE__))). "/app/models/Link.php");

    session_start();

    $userId = $_SESSION["id"];
    $userFirst = $_SESSION["first_name"];
    $userLast = $_SESSION["last_name"];
    $userGp = $_SESSION["group"];
    $userEmail = $_SESSION["user_email"];
    $userFullName = $userFirst." ".$userLast;
    



    if(!isset($_SESSION["userIsLoggedIn"])){
        header("Location: login.php");
    }

    $login_success = "";


    if(isset($_GET["login"])){
        if($_GET["login"] == "success"){
        $login_success = '<div class="alert alert-success" role="alert">
                            <strong>Login successful</strong>
                        </div>';
        }
    }

   
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$tittle_page;?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="dashboard.php"><i class="mdi mdi-format-header-pound text-"></i></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="" class="mdi mdi-format-header-pound text"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block table-responsive">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <p id="result">0</p>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <div class="">
            <form action="view.php" method="POST" class="forms-sample d-flex justify-content-between m-3 ">                            
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="long_url" placeholder="Long_url"required>
              </div> 
              <div class="form-group">
                <input type="hidden" class="form-control form-control-xs" name="user_id" value="<?=$userId?>">
              </div>  
              <div class="form-group">
              <button type="submit" name="submit" class="btn btn-gradient-primary form-control-xs">Shorten</button>
              </div>                   
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="bg-light rounded mt- mb-4 p-0 nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="profile.php" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <!-- <img src="assets/images/faces/face1.jpg" alt="image"> -->
                  <span class=""></span>
                </div>
                <?php
                    $user = new User;
                      $group_id = $_SESSION["group"];
                      $users_group = $user->getGroup($group_id);
                      while($row = $users_group->fetch_assoc()){
                        $group = $row["group"];
                      }
                    ?>
                <div class="text-align-left nav-profile-text m-0 p-0">
                  <br>
                  <h5 class="mb-1 text-secondary"><?=$userFirst. " ". $userLast ?></h5>
                  <p class="text-mudet"><?=$group?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=BASE_URL . "/user/profile.php" ?>">
                  <i class="mdi mdi-account-multiple me-2 text-primary"></i> Profile 
                </a>
                <a class="dropdown-item" href="<?=BASE_URL . "/user/upgradeAccount.php" ?>">
                  <i class="mdi mdi-professional-hexagon me-2 text-primary"></i> Go Pro 
                </a>
                <a class="dropdown-item" href="logout.php?action=true">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout 
                </a>
              </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
           
          </ul>
        </div>
      </nav>
      <!-- partial -->