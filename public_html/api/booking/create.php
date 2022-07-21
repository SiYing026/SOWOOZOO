<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate booking object
include_once '../objects/booking.php';
  
$database = new Database();
$db = $database->getConnection();
  
$booking = new Booking($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
           fwrite($myfile, print_r($data, true));

  
// make sure data is not empty
if(
    !empty($data->email) &&
    !empty($data->name) &&
    !empty($data->package) &&
    !empty($data->date) &&
    !empty($data->phone) &&
    !empty($data->time) &&
    !empty($data->participants)
){
    
    // set booking property values
    $booking->email = $data->email;
    $booking->name = $data->name;
    $booking->package = $data->package;
    $booking->date = $data->date;
    $booking->phone = $data->phone;
    $booking->time = $data->time;
    $booking->participants = $data->participants;
    
    // create the booking
    if($booking->create()){
        
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Booking was created."));
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
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create booking. Data is incomplete."));
}
?>