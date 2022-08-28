<?php
    $tittle_page = "View - Link";
    require_once "./layout/header.php" ;
    require_once "./layout/sidebar.php";
    // require_once "../app/models/User.php"
?> 

<?php
  $links = new Link;  
  $admin = new Admin;


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
        // header("Location: users.php");
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

  if(isset($_POST["update"])){ 
    if($links->editLink()){
      $update_msg ='
                      <div class="alert alert-success">
                        Update successful
                      </div>
                    ';
    } 
  }

?>

    <div class="content-wrapper">
      <?=$update_msg?>
      <?= $delete_msg;?>
      <?= $registration_msg;?>

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

              
              $user = new User; 
              $admin = new Admin; 
              

                if(isset($_GET["action"])){

                    $user_id = $_GET["id"];
                    $user = $user->get_user_links($user_id);
                    
                  
                              
                    while($row =  $user->fetch_assoc()){

                      $num_cliks = $admin->get_num_user_clicks($row['id']);
                      $date = date_create($row["created_at"]);
                      $users = $admin->getUser($userId);

                     $test =  '<a href="http://localhost/url-shortner/user/dashboard.php">'.$row["short_url"].'</a>';


                        while($user_row = $users->fetch_assoc()){
                          $user_name = $user_row["first_name"]." ". $user_row["last_name"];
                        }

                        function fun(){
                          // <a id="url" onclick="clickCounter()" value="'.$row["short_url"].'" href="'.$row["url"].'" class="border-0 btn-light btn-sm ">'.$row["short_url"].'</a>

                          return '<a href="http://localhost/url-shortner/user/dashboard.php" target="">vim.ly/GHAwe</a>' ;
                          }
                          
                          // echo fun();
                      echo '
                          <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex  justify-content-between">
                                  <h4>'.$row["title"].'</h4>
                                  <span>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-inverse-info btn-sm"><i class="mdi mdi-pencil"></i></a>
                                    <a data-bs-toggle="modal" data-bs-target="#deleteModal'.$row["id"].'" data-bs-whatever="@getbootstrap" class="btn btn-inverse-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                                  </span>
                                  
                              </div>
                              <div class="col-md-8">                                
                                <p class="text-dark">'.date_format($date, "M d, H:m ").' by  <span class="text-primary">'.$user_name.'</span></p>

                                <div class="d-flex  justify-content-between">                                    
                                  <button class="btn-rounded-light form-control d-flex  justify-content-between" >
                                    <h5>
                                    <i class="mdi mdi-link-variant text-primary"></i>
                                    <a id="url" onclick="clickCounter()" value="'.$row["short_url"].'" href="'.$row["url"].'" class="border-0 btn-light btn-sm ">'.$row["short_url"].'</a>

                                    </h5>
                                    <span>
                                      <i id="copied" class="btn btn-light btn-sm mdi mdi-content-copy text-primary" onclick="copy()"></i>
                                      <a data-bs-toggle="modal" data-bs-target="#share" data-bs-whatever="@getbootstrap"><i class="btn btn-light btn-sm mdi mdi-share text-primary"></i></a>
                                      <i class="btn btn-light btn-sm mdi mdi-qrcode text-primary"></i>                              
                                    </span>
                                  </button>                                  
                              </div>
                              <br>
                                <p class="text-muted text-sm"><i class="mdi mdi-swap-horizontal"></i><span class="text-dark font-weight-bold">Destination: </span>'.$row["url"].'</p>
                              <div>
                                <h3 class="m-0">'.$num_cliks.' 
                                <i class="btn btn- btn-sm mdi mdi-signal text-primary"></i>    
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
                                      <label class="sr-only text-darl text-dark font-weight-bold" for="title">TITLE</label>
                                      <input type="text" id="title" class="form-control" name="title" value="'.$row["title"].'"  placeholder="Add a title">
                                    </div>                                        
                                    <div class="form-group">
                                      <label class="sr-only text-dark font-weight-bold" for="link">CUSTOMIZE LINK</label>
                                      <input type="text" id="link" class="form-control" name="short_url" value="'.$row["short_url"].'" autofocus>
                                    </div>                                                                                
                                    <div class="text-center">
                                      <button type="submit" name="update" class="btn btn-gradient-info me-2">Update</button> 
                                      
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          ';

                      echo '
                          <div class="modal fade" id="deleteModal'.$row["id"].'" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="text-center">
                                <h4 class="modal-title" id="deleteModal'.$row["id"].'" style="color: red;">Are you sure you want to delete</h4><br>
                                  <a href="view.php?action=delete&id='.$row["id"].'" class="btn btn-danger">Yes</a>
                                  <a class="btn btn-info">No</a>
                                  <br>
                                  <br>
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
                            <a href="https://www.whatsapp.com//submit?url='.$row["short_url"].'" target="_blank" <i class="btn bg-success btn-sm mdi mdi-whatsapp text-white"></i></a>
                            <a href="http://www.facebook.com/sharer.php?u='.$row["short_url"].'" target="_blank" <i class="btn bg-white btn-sm mdi mdi-facebook text-primary"></i></a>
                            <a href="http://twitter.com/share?url='.$row["short_url"].'" target="_blank" <i class="btn bg-primary btn-sm mdi mdi mdi-twitter text-white"></i></a>
                            <a href="http://www.instagram.com/submit?url='.$row["short_url"].'" target="_blank" <i class="btn bg-danger btn-sm mdi mdi-instagram text-white"></i></a>
                            <a href="http://www.telegram.com/submit?url='.$row["short_url"].'" target="_blank" <i class="btn bg-primary btn-sm mdi mdi-telegram text-white"></i></a>                      
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
  
          