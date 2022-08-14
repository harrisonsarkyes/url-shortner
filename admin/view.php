<?php
    $tittle_page = "View - Link";
    require_once "./layout/header.php" ;
    require_once "./layout/sidebar.php";
    // require_once "../app/models/User.php"
?> 

<?php

$links = new Link;  
$update_success = $update_error = $update_msg = "";
if(isset($_POST["update"])){ 
  if($links->editLink()){
    $update_msg ='
                    <div class="alert alert-success">
                      Update successful
                    </div>
                  ';
  } else{
        $update_msg ='
                        <div class="alert alert-danger">
                          <strong>ERROR</strong> user could not be updated
                        </div>
                      ';
  }
}
?>

    <div class="content-wrapper">
      <?=$update_msg?>
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-eye"></i>
          </span> 
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
                <!-- <button class="btn btn-success btn-xs"><i class="mdi mdi-pencil-box-outline"></i>edit</button> -->
            <li class="breadcrumb-item active" aria-current="page"> 
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">                     
          <div class="container"> 
            <?php

              
            //   $user = new User; 
              $admin = new Admin; 

                if(isset($_GET["action"])){

                    $admin_id = $_GET["id"];
                    $user = $links->getAdminLinks($admin_id);
                  
                              
                    while($row =  $user->fetch_assoc()){

                      $num_cliks = $admin->get_num_user_clicks($row['id']);
                      $date = date_create($row["created_at"]);
                      $admins = $admin->getAdmin($admin_id);

                        while($admin_row = $admins->fetch_assoc()){
                          $admin_name = $user_row["first_name"]." ". $admin_row["last_name"];
                        }


                      echo '
                          <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex  justify-content-between">
                                  <h4>'.$row["url"].'</h4>
                                  <span>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil"></i></a>
                                  </span>
                                  
                              </div>
                              <div class="col-md-8">                                
                                <p class="text-danger">'.date_format($date, "M d, H:m ").' by  <span class="text-primary">'.$adminFullName.'</span></p>
                                <p class="text-danger font-weight-bold"> Title: <span class="text-dark">'.$row["tittle"].'</span></p>

                                <div class="d-flex  justify-content-between">                                    
                                  <button class="btn-rounded-light form-control d-flex  justify-content-between" >
                                    <h5>
                                    <i class="mdi mdi-link-variant text-primary"></i>
                                    <input class="border-0 btn-light btn-sm " disabled="" id="short_url" value="'.$row["short_url"].'">
                                    </h3>
                                    <span>
                                      <i class="btn btn-light btn-sm mdi mdi-content-copy text-primary" onclick="copy()"></i>
                                      <a data-bs-toggle="modal" data-bs-target="#share" data-bs-whatever="@getbootstrap"><i class="btn btn-light btn-sm mdi mdi-share text-primary"></i></a>
                                      <i class="btn btn-light btn-sm mdi mdi-qrcode text-primary"></i>                              
                                    </span>
                                  </button>
                                  
                              </div>
                              <div>
                                <h3 class="m-0">'.$num_cliks.' 
                                <i class="btn btn- btn-sm mdi mdi-format-align-left text-primary"></i>    
                                </h3>
                                <p class="text-sm p-0 m-0">Total Clicks</p>
                              </div>
                                
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
                                      <h5 class="modal-title text-white btn btn-gradient-primary btn-sm" id="editModal'.$row["id"].'">Edit Link</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                      
                                    <div class="modal-body">
                                      <div class="text-end m-1">
                                        <i class="btn btn-light btn-sm mdi mdi-content-copy text-primary"></i>
                                        <a data-bs-toggle="modal" data-bs-target="#share" data-bs-whatever="@getbootstrap"><i class="btn btn-light btn-sm mdi mdi-share text-primary"></i></a>                                      
                                      </div>
                                      <form action="view.php" method="post" class="forms-sample">
                                        <div class="form-group">
                                          <input type="hidden" class="form-control" name="id" value="'.$row["id"].'">
                                        </div>
                                        <div class="form-group">
                                          <label class="sr-only text-darl" for="title">TITLE</label>
                                          <input type="text" id="title" class="form-control" name="tittle" value="'.$row["tittle"].'"  placeholder="Add a title">
                                        </div>                                        
                                        <div class="form-group">
                                          <label class="sr-only text-dark" for="link">CUSTOMIZE LINK</label>
                                          <input type="text" id="link" class="form-control" name="short_url" value="'.$row["short_url"].'">
                                        </div>                                                                                
                                        <div class="text-center">
                                          <button type="submit" name="update" class="btn btn-gradient-success me-2">Update</button> 
                                          
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              ';
                          

                              echo '
                              <div class="modal fade" id="share" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-white btn btn-gradient-primary btn-sm" id="share">Share Link</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                    <a href="whatsapp.com" <i class="btn bg-success btn-sm mdi mdi-whatsapp text-white"></i></a>
                                    <a href="facebook.com" <i class="btn bg-white btn-sm mdi mdi-facebook text-primary"></i></a>
                                    <a href="twitter.com" <i class="btn bg-primary btn-sm mdi mdi mdi-twitter text-white"></i></a>
                                    <a href="instagram.com" <i class="btn bg-danger btn-sm mdi mdi-instagram text-white"></i></a>
                                    <a href="telegram.com" <i class="btn bg-primary btn-sm mdi mdi-telegram text-white"></i></a>
                                    
                                    
                                    
                                    
                                    
                                    </div>
                                    <br>
                                    <br>
                                  </div>
                                </div>
                              </div>
                              ';
                    
                    }
                }
    
            ?>
          </div>
        </div>
      </div> 
  <?php require_once "./layout/footer.php" ?>       
  
          