<?php
 
    session_start();

    if(isset($_SESSION["userIsLoggedIn"])){ 
        
        
        if(isset($_GET["action"])){
   
            include (dirname(dirname(__FILE__)). "/app/models/User.php");
            $user = new User;
            
            $user->logout();
            
        }
    }else{
        header("Location: ../index.php?status=already_loggedout");
    }
?>