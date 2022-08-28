<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" id="myInput" value="Hello Dk">
    <button onclick="myFucntion()" >copy text</button>

    <script>
        function myFucntion(){
            let copy = document.getElementById("myInput");
            copy.select();
            copy.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(copy.value);

            alert("Copied link: " + copy.value);
        }
    </script>
</body>
</html>


<?php
    
    // require "app/models/Admin.php";
    
    // $parameters = [
    //     "first_name" => "Jethro",
    //     "last_name"  => "Bitrus",
    //     "email"      => "lopwusjethro@gmail.com",
    //     "password"   => password_hash("1234", PASSWORD_DEFAULT),
    //     "group"      => 1
    // ];

    // $db = new Database;
    // $response = $db->insert('users',  $parameters);
    // if(!$response){
    //     echo $response;
    // }else{
    //     $db->redirect("dashboard.php?registration=success");
    //     exit;
    // }

// require_once "app/config/Db.php";

// $array = [
//     'username' => "Faith",
//     'password' => "@#$%^",
//     'gender'   => "male"
// ];

// $array = [2, 4, 6, 8, 0];

// $array = "gender => male";

// $new_array = array_push($array, "Pilemon");

// print_r($array);

// echo "<br><br><br>";

// $new_array = [
//     "username = Faith",
//     "password = @#$%^",
//     "gender   = male"
// ];

// print_r($array);

// echo "<br><br><br>";

// $imploded = "'".implode("', '", $array)."'";

// echo $imploded;


// $alphanumeric = md5("faith");


// echo "The hashed version of <strong>faith</strong> is <br>". $alphanumeric;

// $alphanumeric  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
// $char_array = str_split($alphanumeric);
// $random_string = "";
// $lower_limit = rand(1, 57);
// $count = 0;

// for($i = $lower_limit; $i <= strlen($alphanumeric); $i++){
//     $rand = rand(0, 61);
//     $random_string .= $char_array[$rand];
//     $count++;
//     if($count == 5){
//         break;
//     }
// }


// $char_array = str_split(str_shuffle($alphanumeric));
// for($i = 0; $i < 5; $i++){
//     $random_string .= $char_array[$i];
// }


// echo "<br>". $random_string;


// $hashed_password = password_hash("1234", PASSWORD_DEFAULT);

// echo $hashed_password;

<!DOCTYPE html>
<html>
<head>
<script>
    function clickCounter() {
        if (typeof (Storage) !== "undefined") {
            if (localStorage.clickcount) {
                localStorage.clickcount = Number(localStorage.clickcount) + 1;
            } else {
                localStorage.clickcount = 1;
            }
            document.getElementById("result").innerHTML = localStorage.clickcount;
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
        }
window.location = 'http://www.google.com';
    }
</script>
</head>

<body link="White">
    <p align="center">
        <p>
            <button onclick="clickCounter();"><span style="font-size:35px;" font face="Face"> Please Click Here to Access QLM </span>
            </button>
        </p>
        <div align="center" id="result"></div>
</html>