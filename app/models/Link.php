<?php
// include (dirname(dirname(__FILE__)). "/config/config.php");
// include (dirname(dirname(__FILE__)). "/config/Database.php");

class Link extends Database{
    private $table = "links";
    public $isset = null;

    function __construct(){
        parent::__construct();

        if(isset($_POST["submit"])){
            $this->isset == true;
        }
    }

    public function create(){ 
            //check number of links
            $id = $_POST['user_id'];
            $links = Database::select($this->table, "*", "user_id='$id'");
        if(!$links->num_rows){
            exit("Sorry.. Update your status to add more likes.");
        } else{

            $short_url = $this->short_url();

            // check for short url duplicate
            $result = Database::select($this->table,  "short_url", "short_url='$short_url'");
            
            if($result->num_rows > 0){
                $short_url = $this->short_url();
            }else{
                $parameters = [
                    "url"       => $_POST['long_url'],
                    "short_url" => $short_url,
                    "user_id"       => $_POST['user_id'],
                    // "created_by"=> $_SESSION["user_id"]
                    // "tittle"   => $_POST["tittle"],

                ];
                
                
                $response = Database::insert($this->table,  $parameters);
                if(!$response){
                   echo $response;
                }else{
                    return true;
                }
            }
        }
    
            
    } 

    public function createAdminLink(){ 
    
        $short_url = $this->short_url();

        // check for short url duplicate
        $result = Database::select($this->table,  "short_url", "short_url='$short_url'");
        
        if($result->num_rows > 0){
            $short_url = $this->short_url();
        }else{
            $parameters = [
                "url"       => $_POST['long_url'],
                "short_url" => $short_url,
                "admin_id"       => $_POST['admin_id']
                // "created_by"=> $_SESSION["user_id"]
                // "tittle"   => $_POST["tittle"],

            ];
            
            
            $response = Database::insert($this->table,  $parameters);
            if(!$response){
               echo $response;
            }else{
                return true;
            }
        }
} 

    public function short_url(){
        $random_string = "";
        $alphanumeric  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $char_array = str_split(str_shuffle($alphanumeric));
        for($i = 0; $i < 5; $i++){
            $random_string .= $char_array[$i];
        }

        return $random_string;
    }

    public function getLinks(){
        
        $result = Database::select($this->table);
        
        return $result;
    }

    public function getUserLinks($id){
        
        $result = Database::select($this->table, "*" ,"user_id='$id'");
        
        return $result;
    }

    public function getAdminLinks($id){
        
        $result = Database::select($this->table, "*" ,"admin_id='$id'");
        
        return $result;
    }

    public function get_num_admin_link($id){
        $result = Database::select($this->table, "*", "admin_id=$id");
        if(!$result){
            return 0;
        }else{
            return $result->num_rows;
        }
        
    }
    
    public function get_num_user_link($id){
        $result = Database::select($this->table, "*", "user_id=$id");
        if(!$result){
            return 0;
        }else{
            return $result->num_rows;
        }
        
    }


    public function deleteLink($id){
        $result = Database::delete($this->table, "id=$id");

        return $result;
    }

    public function editLink(){

        $id = $_POST["id"];
        // $short_url = $this->short_url();

        //     // check for short url duplicate
        //     $result = Database::select($this->table,  "short_url", "short_url='$short_url'");
            
        //     if($result->num_rows > 0){
        //         $short_url = $this->short_url();
        //     }else{
                $parameters = [
                    "tittle"      => $_POST["tittle"],
                    "url"         => $_POST["url"],
                    "short_url"   => $_POST["short_url"],
                    "id"          => $_POST["id"]                          
                    ];  

              
        $result = Database::update($this->table, $parameters, "id= $id");

        return $result;
    }  

}