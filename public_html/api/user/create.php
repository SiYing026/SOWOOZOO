<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/user.php';
  
$database = new Database();
$db = $database->getConnection();
  
$user = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, print_r("hii", true));
                    fwrite($myfile, print_r($data, true));

  
// make sure data is not empty
if(
    !empty($data->username) &&
    !empty($data->email) &&
    !empty($data->password) &&
    !empty($data->lastName) &&
    !empty($data->firstName) 
){
    // set product property values
    $user->username = $data->username;
    $user->email = $data->email;
    $user->password = $data->password;
    $user->lastName = $data->lastName;
    $user->firstName = $data->firstName;
    
    // create the product
    if($user->create()){
        
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, print_r("hi1", true));
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "User was created."));
    }
  
    // if unable to create the booking, tell the user
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create Booking."));
    }
    
}
  
// tell the user data is incomplete
else{
//  $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//                    fwrite($myfile, print_r("hi1", true));
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
}
?>