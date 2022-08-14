<?php
// include (dirname(dirname(__FILE__)). "/config/config.php");
// include (dirname(dirname(__FILE__)). "../../app/models/Admin.php");
    require_once "../app/models/Admin.php";


class User extends Database{
    private $table = "users";
    private $tbl_links = "links";
    private $tbl_group = "groups";
    // private $parameters;
    public $isset = null;

    function __construct(){
        parent::__construct();

        if(isset($_POST["submit"])){
            $this->isset == true;
        }
    }

    public function register(){ 
           
            // check for short email duplicate
            $user_email =  $_POST["email"];
            $result = Database::select($this->table,  "email", "email='$user_email'");
            
            if($result->num_rows > 0){

                Database::redirect("../user/register.php?error=duplicate&email=$user_email");

            }else{

                $parameters = [
                            "email"      => $_POST["email"],
                            "password"   => password_hash($_POST["password"], PASSWORD_DEFAULT),
                            "group"      => 1
                            ];
            
                $response = Database::insert($this->table, $parameters);
                    if(!$response){
                        return $response;
                    }else{
                        Database::redirect("../user/login.php?registration=success");
                    }
            }

    }

    public function login($email, $password){ 

        $result = Database::select($this->table,  "*", "email='$email'");

        if($result->num_rows < 1){

            Database::redirect("login.php?login=fail&for=useremail");
        }else{

            $row = $result->fetch_assoc();
            $password_verified =  password_verify($password, $row["password"]);

            if(!$password_verified){

                Database::redirect("login.php?login=fail&for=password");
            
            }else{
                $status = $row["status"];

                if(!$status == 1){
                    Database::redirect("login.php?login=fail&for=status");
                    // exit("Status Banned");
                } else {
                    session_start();

                    $_SESSION["id"] = $row["id"];
                    $_SESSION["user_email"] = $email;
                    $_SESSION["first_name"] = $row["first_name"];
                    $_SESSION["last_name"] = $row["last_name"];
                    $_SESSION["group"] = $row["group"];
                    $_SESSION["userIsLoggedIn"] = true;
    
                    $duration = time() + (60 * 60 * 24 * 365);
                    setcookie("user_id",  $email, $duration);
                    setcookie("password", $row["password"], $duration);
    
                    Database::redirect('dashboard.php?login=success');
                }
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
    
        $this->redirect(BASE_URL."/index.php?logout=success");

    }

    public function get_user_links($id){
        
        $result = Database::select($this->tbl_links, "*", "id='$id'");
        
        return $result;
    }

    public function get_user($id){
        
        $result = Database::select($this->table, "*", "id=$id");
        
        return $result;
    }

    public function getGroup($id){
        
        $result = Database::select($this->tbl_group, "*", "id=$id");
        
        return $result;
    }

    public function updateProfile(){ 
        $id = $_POST["user_id"];
        $parameters = [
            "first_name"     => $_POST['first_name'],
            "last_name"      => $_POST['last_name'],
            "email"          => $_POST['email']
            // "phone_number"   => $_POST['phone_number']
            // "password"       => $_POST["password"]   
            
        ];
       
        $result = Database::update($this->table, $parameters, "id = $id");
        if(!$result){
            // echo($id);
        } else {
            return $result;
        }
    }

    public function get_num_user_clicks($id){
        $result = Database::select($this->tbl_links, "click", " user_id=$id");
        if(!$result){
            return 0;
        }else{
            return $result->num_rows;
        }
        
    }

}