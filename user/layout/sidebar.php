
<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
           
            
            <li class="nav-item sidebar-actions">
            <?php
                      $admin = new Admin;
                      $links = new Link;
                      $userLink = new Link;

                      $user_links = $userLink->get_num_user_link ($userId);
                    ?>
                  <div class="d-flex justify-content-between btn btn-light btn-sm text-secondary">                    
                    <h5 class="font-weight-bold text-dark">LINKS</h5>
                    <p class=""><?=$user_links?> Results</p>
                  </div>                    
                  <!-- <p class="card-description"> Add class <code>.table</code> </p> -->
                  <div class="">
                    <table class="table table-hover">
                      
                      <tbody>

                          <?php 
                              
                              $links = $links->getUserLinks($userId);
                              while($row =  $links->fetch_assoc()){

                                  $num_cliks = $admin->get_num_user_clicks($row['id']);
                                  $date = date_create($row["created_at"]);
                                  $url = $row["url"];
                                    

                                  $user = $admin->getUsers();
                                  while($user_row = $user->fetch_assoc()){
                                    $user_name = $user_row["first_name"]." ". $user_row["last_name"];
                                  }
                                  echo '<tr>
                                          <td>'.date_format($date, "M d").'
                                            <br>
                                              <span class="font-weight-bold">'.$row["title"].'</span>
                                            <br>
                                            <p class="text-danger">'.$row["short_url"].'
                                              <i class=" btn btn-sm  mdi mdi-signal text-primary">'.$num_cliks.'</i>  
                                              <a href="view.php?action=view&id='.$row["id"].'"<i class="mdi mdi-eye text-info"></i></a>
                                            </p>  
                                          </td>  
                                        </tr>';
                                  

                              }
                          
                          ?>

                      </tbody>
                    </table>              
            </li>           
          </ul>
        </nav>
        <!-- partial -->

        <div class="main-panel">