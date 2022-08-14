<?php
    $tittle_page = "Admin Dashboard";
?> 
  <?php require_once "./layout/header.php" ?>       
  <?php require_once "./layout/sidebar.php" ?>  
  
  
  <?php 
  
    $user = new Admin;

    $users = $user->getAllUser();
    $user = $user->getAlLinks();
  ?>
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
              <h4 class="font-weight-normal mb-3">Registered Users <i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5"><?=$users?></h2>
              <h6 class="card-text">Increased by 10%</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Links Created <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5"><?=$user?></h2>
              <h6 class="card-text">Increased by 10%</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
              <h4 class="font-weight-normal mb-3">Revenue Generated <i class="mdi mdi-diamond mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5">₦9,574,200</h2>
              <h6 class="card-text">Increased by 5%</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="clearfix">
                <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
              </div>
              <canvas id="visit-sale-chart" class="mt-4"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Traffic Sources</h4>
              <canvas id="traffic-chart"></canvas>
              <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-md-5 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-white">Todo</h4>
              <div class="add-items d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
                <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
              </div>
              <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Call John </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Create invoice </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Print Statements </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                    </div>
                    <i class="remove mdi mdi-close-circle-outline"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->

  <?php require_once "./layout/footer.php" ?>       
  
          