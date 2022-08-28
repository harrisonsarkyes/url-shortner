<?php
    $tittle_page = "User - Profile";
?> 
<?php require_once "./layout/header.php" ?>
<?php require_once "./layout/sidebar.php" ?>

<?php    
    $user = new User;
    $update_msg = "";
    if(isset($_POST["submit"])){
        if(!$user->updateProfile()){
           
            $update_msg = '<div class="alert alert-danger" role="alert">
                                  <strong>User not updated</strong>
                              </div>';
          }else{
           
            $update_msg = '<div class="alert alert-success" role="alert">
                                  <strong>User updated Successfully</strong>
                              </div>';
            
          }
        }
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
          <?=$update_msg ?>
            <div class="d-flex justify-content-between">
            </div>
            <div>
                <span class="card-title">Edit Profile</span>
              </div>
            <br>
            <!-- profile -->
                      
                            <?php
                                $group_id = $_SESSION["group"];
                                $users_group = $user->getGroup($group_id);
                                while($row = $users_group->fetch_assoc()){
                                  $group = $row["group"];
                                }
                                  $users_data = $user->get_user($userId);
                                //   $full_name = "";
                                  while($row =  $users_data->fetch_assoc()){
                                      
                                      $full_name = $row["first_name"]. ' ' .$row["last_name"];
                                      
                                      
                                      echo '
                                          <form action="profile.php" method="POST">
                                          <input type="hidden" class="form-control" name = "user_id" value = "'. $row["id"].'">
                                              <div class="row">
                                                  <div class="col-md-6 pr-1">
                                                      <div class="form-group">
                                                          <label>Category</label>
                                                          <input type="text" class="form-control" disabled=""  value="'.$group.'">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                          <label>First Name</label>
                                                          <input type="text" class="form-control" name="first_name" value="'.$row["first_name"].'">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-6 pr-1">
                                                      <div class="form-group">
                                                          <label>Last Name</label>
                                                          <input type="text" class="form-control" name="last_name" value="'.$row["last_name"].'">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 pl-1">
                                                      <div class="form-group">
                                                          <label>Email Address</label>
                                                          <input type="email" class="form-control" name="email" value="'.$row["email"].'">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-6 pl-1">
                                                      <div class="form-group">
                                                          <label>Phone Numner</label>
                                                          <input type="number" class="form-control" name="phone_number"  value="">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 pl-1">
                                                      
                                                  </div>
                                              </div>
                                              <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Update Profile</button>
                                              <div class="clearfix"></div>
                                          </form>
                                      </div>
                                      ';
                                      
                                  }
                            ?>
                <!-- end -->
        </div>
      </div>
      <div class="col-4">
            <div class="card card-user">
                <div class="card-image">
                    <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."> -->
                </div>
                <div class="card-body">
                    <div class="author">
                        <img class="img-lg rounded-circle" src="assets/images/faces/joey.jpg" alt="...">
                        <h5 ><?=$userFullName?></h5>
                        <small class="title"><?=$userEmail?></small>

                    </div>
                </div>
                <hr>
                <div class="button-container mr-auto ml-auto">
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                        <i class="fa fa-facebook-square"></i>
                    </button>
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                        <i class="fa fa-twitter"></i>
                    </button>
                    <button href="#" class="btn btn-simple btn-link btn-icon">
                        <i class="fa fa-google-plus-square"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>



<?php require_once "./layout/footer.php" ?>
