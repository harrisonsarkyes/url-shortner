
<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <!-- <a href="profile.php" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span> -->
                  <!--change to offline or busy as needed-->
                <!-- </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?=$userFullName?></span>
                  <span class="text-secondary text-small"><?=$userEmail?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=BASE_URL . "/user/dashboard.php" ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=BASE_URL . "/user/links.php" ?>">
                <span class="menu-title">My Links</span>
                <i class="mdi mdi-link menu-icon"></i>
              </a>
            </li> 
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Categorie</h6>
                </div>
                <select class="btn btn-block btn-lg btn-gradient-primary mt-4" name="" id="">
                  <option class="gradient-bullet-list mt-4 value=">Free</option>
                  <option class="gradient-bullet-list mt-4 value=">Pro</option>
                </select>
                
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary"></p>
                  </div>
                  <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li></li>
                  </ul>
                </div>
              </span>
            </li>           
          </ul>
        </nav>
        <!-- partial -->

        <div class="main-panel">