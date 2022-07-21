<?php

class Booking{
    // database connection and table name
    private $conn;
    private $table_name = "booking";

    
    // object properties
    public $booking_id;
    public $email;
    public $name;
    public $package;
    public $date;
    public $phone;
    public $time;
    public $participants;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read products
    function read(){
        // select all query
        $query = "SELECT
                    email as email, name, package, date, phone, time, participants
                FROM
                    " . $this->table_name . "";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    
    // create booking
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    email=:email, name=:name, package=:package, phone=:phone, date=:date, time=:time, participants=:participants";

        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->package=htmlspecialchars(strip_tags($this->package));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->participants=htmlspecialchars(strip_tags($this->participants));
        
        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":package", $this->package);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":participants", $this->participants);
    
        // execute query
        if($stmt->execute()){
            return $stmt;
        }
        
    }
    
    
    // used when filling up the update product form
    function readOne(){
        // query to read single record
        $query = "SELECT
                    email as email, name, package, date, phone, time, participants
                FROM
                    " . $this->table_name . " 
                WHERE
                    email = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        
        // Bind ID
        $stmt->bindParam(1, $this->email);
      
        // execute query
        $stmt->execute();
        
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // set values to object properties
            $this->email = $row['email'];
            $this->name = $row['name'];
            $this->package = $row['package'];
            $this->date = $row['date'];
            $this->phone = $row['phone'];
            $this->time = $row['time'];
            $this->participants = $row['participants'];
            
        /*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, print_r("hi5", true));*/
    }
    
    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    booking_id = :booking_id,
                    name = :name,
                    package = :package,
                    date = :date,
                    phone = :phone,
                    time = :time,
                    participants = :participants
                WHERE
                    booking_id = :booking_id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->booking_id=htmlspecialchars(strip_tags($this->booking_id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->package=htmlspecialchars(strip_tags($this->package));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->participants=htmlspecialchars(strip_tags($this->participants));
        $this->email=htmlspecialchars(strip_tags($this->email));
        
        $stmt->bindParam(':booking_id', $this->booking_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':package', $this->package);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time); 
        $stmt->bindParam(':participants', $this->participants);
        $stmt->bindParam(':email', $this->email);
                    
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
        
    }

    // delete the product
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE booking_id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->booking_id=htmlspecialchars(strip_tags($this->booking_id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->booking_id);

        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    
    // search products
    function search($keywords){

        // select all query
        $query = "SELECT
                    booking_id as booking_id, email, name, package, date, phone, time
                FROM
                    " . $this->table_name . " 
                WHERE
                    booking_id LIKE ? ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
        // bind
        $stmt->bindParam(1, $keywords);

        // execute query
        $stmt->execute();
        
        return $stmt;
    }
}

?>