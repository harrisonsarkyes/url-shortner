<?php
    $tittle_page = "Admins Users";
?> 
<?php require_once "./layout/header.php" ?>      
<?php require_once "./layout/sidebar.php" ?>  


<?php // require "../app/models/Admin.php"; 

  $admin = new Admin;  
  $links = new Link;  
  $delete_error = $delete_success = $update_error = $update_success = $registration_error = $registration_success ="";

  if(isset($_GET["action"])){

    switch ($_GET["action"]) {
      case 'delete':
        if(!$admin->deleteAdmin($_GET["id"])){
          $delete_error = '
                            <div class="alert alert-danger">
                              <strong>ERROR</strong> Admin could not be deleted
                            </div>
                          ';
        } else {
          $delete_success = '
                            <div class="alert alert-success">
                              Admin has been delete succesfuly
                            </div>
                          ';
        }
        break;
      
      default:
        header("Location: users.php");
        break;
    }
  }

  if(isset($_POST["update"])){ 
    // $userID = $_POST["id"];
    if($admin->updateAdmin()){
      $update_success ='
                      <div class="alert alert-success">
                        Update successful
                      </div>
                    ';
    } else{
          $update_error ='
                          <div class="alert alert-danger">
                            <strong>ERROR</strong> Admin could not be updated
                          </div>
                        ';
    }
  }

  if(isset($_POST["submit"])){ 
    if(!$admin->registerAdmin()){
      $registration_error ='
                          <div class="alert alert-danger">
                            <strong>ERROR</strong> Admin user not created
                          </div>
                        ';      
    } else{
      $registration_success ='
                            <div class="alert alert-success">
                              Admin User created successfuly
                            </div>
                          ';
    }
  }
?>   

    <div class="content-wrapper">
      
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-multiple"></i>
          </span> Admin Users
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>All Admins <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <!-- ADD NEW ADMIN -->
                          <h5 class="modal-title" id="exampleModalLabel">New Admin</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="admins.php" method="POST" class="forms-sample">
                            <div class="form-group">
                              <input type="text" class="form-control" name="first_name" placeholder="First Name"required>
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="last_name" placeholder="Last name"required>
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" name="email" placeholder="Email"required>
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="password" placeholder="Password"required>
                            </div>
                            <div class="form-group">
                              <!-- <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"> -->
                              <select name="group" id="group" class="form-control"  required>
                              <option value="">Select Group</option>
                              <?php
                                $groups = $admin->getGroups();

                                while($row = $groups->fetch_assoc()){
                                  $group_id = $row["id"];

                                  echo '<option value="'.$group_id.'">'.$row["group"].'</option>';
                                }
                              ?>
                              </select>
                              
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Create Admin</button>
                            <!-- <button class="btn btn-light">Cancel</button> -->
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                
                      <!-- ACtions Notifications -->
                    <?= $delete_error;?>
                    <?= $delete_success;?>
                    <?= $update_error;?>
                    <?= $update_success;?>
                    <?= $registration_success;?>
                    <?= $registration_error;?>
                  <div class="d-flex justify-content-between">                    
                    <h4 class="btn btn-info btn-sm text-white">Admins List</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="mdi mdi-account-plus"></i></button>
                  </div>                    
                  <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                <table class="table table-responsive table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Links</th>
                        <th>Group</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php 
                            
                            $users = $admin->getAdmins();
                            while($row =  $users->fetch_assoc()){
                              $date = date_create($row["created_at"]);

                                $num_links = $links->get_num_user_link($row['id']);
                                echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row["first_name"].' '.$row["last_name"].'</td>
                                        <td>'.$row["email"].'</td>
                                        <td>'.$num_links.'</td>
                                        <td>'.$row["group"].'</td>
                                        <td>'.date_format($date, "M d, H:m ").'</td>
                                        <td>
                                            <a href="view.php?action=view&id='.$row["id"].'" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#editModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil-box-outline"></i></a>
                                            <a data-bs-toggle="modal" data-bs-target="#deleteModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>';

                                echo '
                                      <div class="modal fade" id="deleteModal'.$row["id"].'" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="text-center">
                                            <h4 class="modal-title" id="deleteModal'.$row["id"].'" style="color: red;">Are you sure you want to delete</h4><br>
                                              <a href="admins.php?action=delete&id='.$row["id"].'" class="btn btn-danger">Yes</a>
                                              <a class="btn btn-info">No</a>
                                              <br>
                                              <br>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      ';
                                
                                echo '
                                      <div class="modal fade" id="editModal'.$row["id"].'" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title text-white btn btn-gradient-info btn-sm" id="editModal'.$row["id"].'">Update User</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="admins.php" method="post" class="forms-sample">
                                                <div class="form-group">
                                                  <input type="hidden" class="form-control" name="id" value="'.$row["id"].'">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="first_name" value="'.$row["first_name"].'">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" class="form-control" name="last_name" value="'.$row["last_name"].'">
                                                </div>
                                                <div class="form-group">
                                                  <input type="email" class="form-control" name="email" value="'.$row["email"].'">
                                                </div>
                                                <div class="form-group">
                                                  <input type="password" class="form-control" name="password" value="'.$row["password"].'">
                                                </div>                                                
                                                <div class="text-center">
                                                  <button type="submit" name="update" class="btn btn-gradient-info me-2">Update</button> 
                                                  <!-- <button class="btn btn-light">Cancel</button> -->
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      ';
                            }
                         
                        ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
      </div>

      
    </div>
    <!-- content-wrapper ends -->

  <?php require_once "./layout/footer.php" ?>       
  
          