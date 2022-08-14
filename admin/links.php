<?php
    $tittle_page = "Admin - Links";
?> 
<?php require_once "./layout/header.php" ?>      
<?php require_once "./layout/sidebar.php" ?>  
<?php  ?>  


<?php // require "../app/models/Admin.php"; 

  $admin = new Admin;
    $links = new Link;  

  $delete_error = $delete_success = $update_error = $update_success = $registration_error = $registration_success ="";

  if(isset($_GET["action"])){

    switch ($_GET["action"]) {
      case 'delete':
        if(!$links->deleteLink($_GET["id"])){
          $delete_error = '
                            <div class="alert alert-danger">
                              <strong>ERROR</strong> Link could not be deleted
                            </div>
                          ';
        } else {
          $delete_success = '
                            <div class="alert alert-success">
                              Link has been delete succesfuly
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
    if($links->editLink()){
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
    if(!$links->create()){
      $registration_error ='
                          <div class="alert alert-danger">
                            <strong>ERROR</strong> Link not created
                          </div>
                        ';      
    } else{
      $registration_success ='
                            <div class="alert alert-success">
                              Link created successfuly
                            </div>
                          ';
    }
  }
?>   

    <div class="content-wrapper">
      
      <div class="page-header">
        <h3 class="page-title">
          <a href="php">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-link-variant"></i>
          </span></a>
           All Links
        </h3>
        <nav aria-label="breadcrumb">
          
       
            
            
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                          <!-- ADD NEW LINK -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">New Link</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="links.php" method="POST" class="forms-sample">                            
                            <div class="form-group">
                              <input type="text" class="form-control" name="long_url" placeholder="Long_url"required>
                            </div>                   
                            <div class="form-group">
                              <!-- <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"> -->
                              <select name="user_id" id="user_id" class="form-control" required>
                              <option value="">Asign to</option>
                              <?php
                                $users = $admin->getUsers();

                                while($row = $users->fetch_assoc()){
                                  $user_id = $row["id"];

                                  echo '<option value="'.$user_id.'">'.$row["first_name"].' ' .$row["last_name"].'</option>';
                                }
                              ?>
                              </select>
                              
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Shorten</button>
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
                    <h4 class="btn btn-success btn-sm text-white"> All Links List</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> + <i class="mdi mdi-link"></i></button>
                  </div>                    
                  <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Tittle</th>
                          <th>User</th>
                          <th>Long_URL</th>
                          <th>Short_URL</th>
                          <th>Clicks</th>
                          <th>Created At</th>
                          <th>Created By</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>

                          <?php 
                              
                              $links = $links->getLinks();
                              while($row =  $links->fetch_assoc()){
                                  $num_clicks = $admin->get_num_user_clicks($row['id']);
                                  $date = date_create($row["created_at"]);

                                  $user = $admin->getUser($row['user_id']);
                                  while($user_row = $user->fetch_assoc()){
                                    $user_name = $user_row["first_name"]." ". $user_row["last_name"];
                                
                                  }
                                  echo '<tr>
                                          <td>'.$row['id'].'</td>
                                          <td>'.$row["tittle"].'</td>
                                          <td>'.$user_name.'</td>
                                          <td>'.$row["url"].'</td>
                                          <td>'.$row["short_url"].'</td>
                                          <td>'.$num_clicks.'</td>
                                          <td>'.date_format($date, "M d, H:m ").'</td>
                                          <td>'.$row["created_by"].'</td>
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
                                                <a href="links.php?action=delete&id='.$row["id"].'" class="btn btn-danger">Yes</a>
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
                                                <h5 class="modal-title text-white btn btn-gradient-info btn-sm" id="editModal'.$row["id"].'">Edit Link</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                <form action="users.php" method="post" class="forms-sample">
                                                  <div class="form-group">
                                                    <input type="hidden" class="form-control" name="id" value="'.$row["id"].'">
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="tittle" value="'.$row["tittle"].'">
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="url" value="'.$row["url"].'">
                                                  </div>
                                                  <div class="form-group">
                                                    <input type="text" class="form-control" name="short_url" value="'.$row["short_url"].'">
                                                  </div>
                                                  <div class="form-group">
                                                  <select name="user_id" id="user_id" class="form-control" required>
                                                  <option value="">Asign to</option>
                                                  
                                                  </select>
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

      
    </div>
    <!-- content-wrapper ends -->

  <?php require_once "./layout/footer.php" ?>       
  