<?php
    $tittle_page = "Profile";
    require_once "./layout/header.php" ;
    require_once "./layout/sidebar.php"
?> 

    <div class="content-wrapper">
      
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-circle"></i>
          </span> Profile
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span class="btn btn-gradient-danger text-white ">Ban User</span>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">                     
          <div class="container"> 
          <?php

            $admin = new Admin; 

              if(isset($_GET["action"])){

                  $user_id = $_GET["id"];

                  $user = $admin->getUser($user_id);
                  
                  while($row =  $user->fetch_assoc()){
                  
                      echo '
                          <form action="view.php" method="GET" class="forms-sample">
                              <div class="form-group">
                                  <label for="firstName">First Name</label>
                                  <input type="text" class="form-control" name="first_name" value="'.$row["first_name"].'" disabled>
                              </div>
                              <div class="form-group">
                                  <label for="firstName">Last Name</label>
                                  <input type="text" class="form-control" name="last_name" value="'.$row["last_name"].'"disabled>
                              </div>
                              <div class="form-group">
                                  <label for="firstName">Email</label>
                                  <input type="email" class="form-control" name="email" value="'.$row["email"].'"disabled>
                              </div>
                              <div class="form-group">
                                  <label for="firstName">Group</label>
                                  <input type="text" class="form-control" name="group" value="'.$row["group"].'"disabled>
                              </div> 
                              <div class="form-group">
                                  <label for="firstName">IP-Address</label>
                                  <input type="text" class="form-control" name="ip_address" value="'.$row["ip_address"].'"disabled>
                              </div> 
                              <div class="form-group">
                                  <label for="firstName">Brouser</label>
                                  <input type="text" class="form-control" name="brouser" value="'.$row["brouser"].'"disabled>
                              </div> 
                              <div class="form-group">
                                  <label for="firstName">Operating System</label>
                                  <input type="text" class="form-control" name="brouser" value="'.$row["operating_system"].'"disabled>
                              </div>
                              <div class="form-group">
                                  <label for="firstName">Status</label>
                                  <input type="text" class="form-control" name="brouser" value="'.$row["status"].'"disabled>
                              </div>
                              <div class="form-group">
                                  <label for="firstName">Created At</label>
                                  <input type="text" class="form-control" name="brouser" value="'.$row["created_at"].'"disabled>
                              </div> 
                              <div class="form-group">
                                  <label for="firstName">Updated At</label>
                                  <input type="text" class="form-control" name="brouser" value="'.$row["updated_at"].'"disabled>
                              </div>                                  
                          </form>
                          ';
                  }
              }
  
  ?>
          </div> 
                  
                  
                  
                  <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                

                        
        </div>
      </div>

  <?php require_once "./layout/footer.php" ?>       
  
          