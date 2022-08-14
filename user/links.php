<?php
    $tittle_page = "User - Dashboard";
?> 
  <?php require_once "./layout/header.php" ?>       
  <?php require_once "./layout/sidebar.php" ?>  
      
  <?php // require "../app/models/Admin.php"; 

  $admin = new Admin;
  $links = new Link;  

  $delete_msg = $update_msg = $registration_msg = "";

  if(isset($_GET["action"])){

    switch ($_GET["action"]) {
      case 'delete':
        if(!$links->deleteLink($_GET["id"])){
          $delete_msg = '
                            <div class="alert alert-danger">
                              <strong>ERROR</strong> Link could not be deleted
                            </div>
                          ';
        } else {
          $delete_msg = '
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

  if(isset($_POST["submit"])){ 


    if(!$links->create()){
      $registration_msg ='
                          <div class="alert alert-danger">
                            <strong>ERROR</strong> Link not created
                          </div>
                        ';      
    } else{
      $registration_msg ='
                            <div class="alert alert-success">
                              Link created successfuly
                            </div>
                          ';
    }
  } 

?>   

    <div class="content-wrapper">
    <?=$login_success ?>
      
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-link"></i>
          </span> Links
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
            <!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> + <i class="mdi mdi-link"></i> Create Link</button> -->
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                        
                
                      <!-- ACtions Notifications -->
                    <?= $delete_msg;?>
                    <?= $update_msg;?>
                    <?= $registration_msg;?>
                  <div class="d-flex justify-content-between">                    
                    <h4 class="btn btn-light btn-sm text-secondary">Results</h4>
                  </div>                    
                  <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                      <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>

                          <?php 
                              
                              $links = $links->getUserLinks($userId);
                              while($row =  $links->fetch_assoc()){

                                  $num_links = $admin->get_num_user_clicks($row['id']);
                                  $date = date_create($row["created_at"]);
                                  $url = $row["url"];
                                    

                                  $user = $admin->getUsers();
                                  while($user_row = $user->fetch_assoc()){
                                    $user_name = $user_row["first_name"]." ". $user_row["last_name"];
                                  }
                                  echo '<tr>
                                          <td>'.date_format($date, "M d").'</td>
                                          <td>'.$row["url"].'</td>                                         
                                          <td>'.$row["short_url"].'</td>
                                          <td>
                                              <a href="view.php?action=view&id='.$row["id"].'" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a>
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
  
          