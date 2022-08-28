<?php
include (dirname(dirname(__FILE__)). "/config/config.php");
include (dirname(dirname(__FILE__)). "/config/Database.php");

class Admin extends Database{
    private $table = "admin";
    private $tbl_users = "users";
    private $tbl_groups = "groups";
    private $tbl_links = "links";
    // private $parameters;
    public $isset = null;

    function __construct(){
        parent::__construct();

        if(isset($_POST["submit"])){
            $this->isset == true;
        }
    }

    public function registerAdmin(){ 
           
            // check for short email duplicate
            $user_email =  $_POST["email"];
            $result = Database::select($this->table,  "email", "email='$user_email'");
            
            if($result->num_rows > 0){

                return false;
                
            }else{
                $parameters = [
                    "first_name"   => $_POST["first_name"],
                    "last_name"    => $_POST["last_name"],
                    "email"        => $_POST["email"],
                    "password"     => password_hash($_POST['password'], PASSWORD_DEFAULT),                                      
                    "group"        => $_POST["group"]                          
                    ];  
                
                
                $response = Database::insert($this->table,  $parameters);
                if(!$response){
                   echo $response;
                }else{
                    
                   return true;
                }
            

        }
    }

    public function registerUser(){ 
           
        // check for short email duplicate
        $user_email =  $_POST["email"];
        $result = Database::select($this->tbl_users,  "email", "email='$user_email'");
        
        if($result->num_rows > 0){

            Database::redirect("../user/register.php?error=duplicate&email=$user_email");

        }else{

            $parameters = [
                        "email"      => $_POST["email"],
                        "password"   => password_hash($_POST["password"], PASSWORD_DEFAULT),
                        "group"      => 1
                        ];
        
            $response = Database::insert($this->tbl_users, $parameters);
                if(!$response){
                    return $response;
                }else{
                    Database::redirect("../user/login.php?registration=success");
                }
        }

}

    public function login($adminID, $password){ 
        $result = Database::select($this->table,  "*", "email='$adminID'");
        if($result->num_rows < 1){
            Database::redirect("login.php?login=fail&for=userid");
        }else{
            $row = $result->fetch_assoc();
            $password_verified =  password_verify($password, $row["password"]);
            if(!$password_verified){
                Database::redirect("login.php?login=fail&for=password");
            }else{
                // create sessions
                session_start();

                $_SESSION["admin_id"] = $adminID;
                $_SESSION["adminId"] = $row["id"];
                $_SESSION["first_name"] = $row["first_name"];
                $_SESSION["last_name"] = $row["last_name"];
                $_SESSION["adminIsLoggedIn"] = true;

                $duration = time() + (60 * 60 * 24 * 365);
                setcookie("admin_id",  $adminID, $duration);
                setcookie("password", $row["password"], $duration);

                Database::redirect("index.php?login=success");
            }
        }
    }

    public function forgot_password($email){
        $base_url = BASE_URL;
        $link = "$base_url/resetpassword.php";
        $from = "rocketsoftwareltd@gmail.com";
        $to = $email;
        $subject = "Password Reset Link";
        $message = "Hello, Click the following link to reset your password: $link <br> kindly ignore this message if you didnt request to reset your password";
        // mail();
    }

    public function logout(){
       
        session_destroy();
    
        $this->redirect(BASE_URL."/admin/login.php?logout=success");

    }

    public function getAdmins(){
        $result = Database::select($this->table);
        return $result;
    }

    public function getAdmin($id){
        
        $result = Database::select($this->table, "*", "id='$id'");
        
        return $result;
    }

    public function deleteAdmin($id){
        $result = Database::delete($this->table, "id=$id");

        return $result;
    }

    public function updateAdmin(){

        $id = $_POST["id"];

        $parameters = [
            "first_name"   => $_POST["first_name"],
            "last_name"    => $_POST["last_name"],
            "email"        => $_POST["email"],
            "password"     => $_POST["password"],                                      
            "id"           => $_POST["id"]                          
            ];  

            
        $result = Database::update($this->table, $parameters, "id= $id");

        return $result;
    }  

    public function getGroups($id= null){
        if($id != null){
            if(is_numeric($id)){
            $result = Database::select($this->tbl_groups, "*", "id=$id");
            return $result;

            } 
        } else {
            $result = Database::select($this->tbl_groups);
            return $result;
        }
    }

    public function getUsers(){
        $result = Database::select($this->tbl_users);
        return $result;
    }

    public function getUser($id){
        
        $result = Database::select($this->tbl_users, "*", "id=$id");
        
        return $result;
    }

    public function deleteUser($id){
        $result = Database::delete($this->tbl_users, "id=$id");

        return $result;
    }

    public function updateUser(){

        $id = $_POST["id"];

        $parameters = [
            "first_name"   => $_POST["first_name"],
            "last_name"    => $_POST["last_name"],
            "email"        => $_POST["email"],
            "password"     => $_POST["password"],                                      
            "id"           => $_POST["id"]                          
            ];  

            
        $result = Database::update($this->tbl_users, $parameters, "id= $id");

        return $result;
    }  

    public function getAllUser(){
        
        $result = Database::select($this->tbl_users, "*", "");
        
        if(!$result){
            return 0;
        } else {
            return $result->num_rows;
        }
    }

    public function getAlLinks(){
        
        $result = Database::select($this->tbl_links, "*", "");
        
        if(!$result){
            return 0;
        } else {
            return $result->num_rows;
        }
    }

    public function updateStatus(){
        $id= $_GET["id"];
        $parameters = [
            "status"  => $_GET["status"]
        ];        
        $result = Database::update($this->tbl_users, $parameters, "id = $id");
        return $result;
    }

    public function get_num_user_clicks($id){
        $result = Database::select($this->tbl_links, "clicks", " user_id=$id");
        if(!$result){
            return 0;
        }else{
            return $result->num_rows;
        }
        
    }

}