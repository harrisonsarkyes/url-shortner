<?php
    $tittle_page = "User - Dashboard";
?> 
  <?php require_once "./layout/header.php" ?>       
      
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

</div>
    <div class="content-wrapper">
    <?=$login_success ?>
      
      <div class="page-header">
        
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
            <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-link"></i>
          </span> Links
        </h3>
                <div class="card-body"> 
                      <!-- ACtions Notifications -->
                    

                    
                  
                    
                  </div>
                </div>
            </div>
        </div>
      </div>

      
    </div>
    </div>
    <!-- content-wrapper ends -->

  <?php require_once "./layout/footer.php" ?>       
  
          