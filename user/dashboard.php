<?php
    $tittle_page = "User - Dashboard";
?> 
<?php require_once "./layout/header.php" ?>
<?php require_once "./layout/sidebar.php" ?>

<?php
    $user = new User;
    $userLink = new Link;

        $user_links = $userLink->get_num_user_link ($userId);

?>
        <!-- partial -->
          <div class="content-wrapper">
            <?=$login_success ?>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Links Created <i class="mdi mdi-link-variant mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?=$user_links?></h2>
                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Link viewed <i class="mdi mdi-link mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"></h2>
                    <!-- <h6 class="card-text">Decreased by 10%</h6> -->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Most Clicked <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"></h2>
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
<?php require_once "./layout/footer.php" ?>
