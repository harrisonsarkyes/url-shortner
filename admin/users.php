<?php
    $tittle_page = "Admin/Users";
?> 
<?php require_once "./layout/header.php" ?>      
<?php require_once "./layout/sidebar.php" ?>  


<?php // require "../app/models/Admin.php"; 

  $admin = new Admin;  
  // $user = new User;  
  $links = new Link;  
  $delete_error = $delete_success = $update_error = $update_success = $registration_error = $registration_success ="";

  if(isset($_GET["actions"])){

    switch ($_GET["actions"]) {
      case 'delete':
        if(!$admin->deleteUser($_GET["id"])){
          $delete_error = '
                            <div class="alert alert-danger">
                              <strong>ERROR</strong> user could not be deleted
                            </div>
                          ';
        } else {
          $delete_success = '
                            <div class="alert alert-success">
                              user has been delete succesfuly
                            </div>
                          ';
        }
        break;
      
      default:
        // header("Location: .php");
        break;
    }
  }

  if(isset($_POST["update"])){ 
    // $userID = $_POST["id"];
    if($admin->updateUser()){
      $update_success ='
                      <div class="alert alert-success">
                        Update successful
                      </div>
                    ';
    } else{
          $update_error ='
                          <div class="alert alert-danger">
                            <strong>ERROR</strong> user could not be updated
                          </div>
                        ';
    }
  }

  if(isset($_POST["submit"])){ 
    if(!$admin->registerUser()){
      $registration_error ='
                          <div class="alert alert-danger">
                            <strong>ERROR</strong> user not created
                          </div>
                        ';      
    } else{
      $registration_success ='
                            <div class="alert alert-success">
                              User created successfuly
                            </div>
                          ';
    }
  }

  // user's status
if(isset($_GET["action"])){

  $user_id = $_GET["id"];
  // $user_status = $_GET["status"];  
  $user = $admin->updateStatus($user_id);

}
?>   

    <div class="content-wrapper">
      
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-multiple"></i>
          </span> Users
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>All Users <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                          <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="users.php" method="POST" class="forms-sample">
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
                            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Create User</button>
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
                    <h4 class="btn btn-info btn-sm text-white">Users List</h4>
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
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                        

                  <?php 
                    // $num_users = $admin->get_num_users();
       
                    // $users = $admin->getUsers();
                    // while($row =  $users->fetch_assoc()){
                    //     $id = $row['id'];
                    //     $num_links = $admin->get_num_user_link($row['id']);

                        $users = $admin->getUsers();
                            while($row =  $users->fetch_assoc()){
                              $date = date_create($row["created_at"]);

                                $num_links = $links->get_num_user_link($row['id']);
                      ?>
                            <tr>
                                <td><?=$row["id"]; ?></td>
                                <td><?=$row["first_name"].' '.$row["last_name"]; ?></td>
                                <td><?=$row["email"]; ?></td>
                                <td><?=$num_links; ?></td>
                                <td><?=$row["group"]; ?></td>
                                <td><?=date_format($date, "M d, H:m "); ?></td>
                                <td>
                                  <?php 
                                  if($row['status']==1){
                                    echo '<a href="users.php?action=view&id='.$row["id"].'&status=0" class="btn btn-success btn-sm"><i class="mdi mdi-account-check"></i></a>';
                                  }else{
                                    echo '<a href="users.php?action=view&id='.$row["id"].'&status=1" class="btn btn-danger btn-sm"><i class="mdi mdi-account-off"></i></a>';
                                  }

                                  ?>
                                </td>
                          <?php
                          echo      '<td>
                                    <a href="view.php?action=view&id='.$row["id"].'" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#editModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil-box-outline"></i></a>
                                    <a  data-bs-toggle="modal" data-bs-target="#deleteModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>';
                            ?>
                          <?php

                        // delete user

                        echo '
                            <div class="modal fade" id="deleteModal'.$row["id"].'" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="deleteModal" style="text-align: center;">Are you sure you want to delete?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <a href="users.php?actions=delete&id='.$row["id"].'" class="btn btn-danger">Yes</a>
                                    <a  class="btn btn-info" data-bs-dismiss="modal" aria-label="Close" >No</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                              ';
                             
                            // edit and update user  

                            echo '
                              <div class="modal fade" id="editModal'.$row["id"].'" tabindex="-1" aria-labelledby="editModal" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editModal'.$row["id"].'">Update User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="forms-sample" action="users.php" method="post">
                                      <input type="hidden" class="form-control" name="hiddenId" value="'.$row["id"].'">
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="firstName" value="'.$row["first_name"].'">
                                      </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control" name="lastName" value="'.$row["last_name"].' ">
                                      </div>
                                      <div class="form-group">
                                        <input type="email" class="form-control" name="email" value="'.$row["email"].'" >                                      </div>
                                      <div class="form-group">
                                        <input type="password" class="form-control" name="password" value="'.$row["password"].'">
                                      </div>
                                    
                                      <div class="form-group">
                                        <input type="number" class="form-control" name="status" value="'.$row["status"].'" >
                                      </div>
                                      <button name="update" class="btn btn-gradient-info me-2">Update</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>';
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
  
          