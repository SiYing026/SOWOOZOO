<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/booking.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare booking object
$booking = new Booking($db);
  
// set email property of record to read
$booking->email = isset($_GET['email']) ? $_GET['email'] : die();
  
// read the details of booking to be edited
$booking->readOne();

  
if($booking->name!=null){
    // create array
    $booking_arr = array(
			
	"email" => $booking->email,
        "name" => $booking->name,
        "package" => $booking->package,
        "date" => $booking->date,
        "phone" => $booking->phone,
        "time" => $booking->time,
	"participants" => $booking->participants
    );
	
	$data = json_decode(file_get_contents("php://input"));
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, print_r("hello5", true));
                    fwrite($myfile, print_r($data, true));
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($booking_arr);
}
  
else{
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user booking does not exist
    echo json_encode(array("message" => "Booking does not exist."));
}
?>