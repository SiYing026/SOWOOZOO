<?php

class User{
    // database connection and table name
    private $conn;
    private $table_name = "user";

    // object properties
    public $username;
    public $email;
    public $password;
    public $lastName;
    public $firstName;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // read products
    function read(){
        // select all query
        $query = "SELECT
                    email as username, email, password, lastName, firstName
                FROM
                    " . $this->table_name . "";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    
    // create user
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    username=:username, email=:email, password=:password, lastName=:lastName, firstName=:firstName";

        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->lastName=htmlspecialchars(strip_tags($this->lastName));
        $this->firstName=htmlspecialchars(strip_tags($this->firstName));
        
        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":firstName", $this->firstName);
    
        // execute query
        if($stmt->execute()){
            return $stmt;
        }
        
    }
    
    // used when filling up the update product form
    function readOne(){
        // query to read single record
        $query = "SELECT
                    email as username, email, password, lastName, firstName
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
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->lastName = $row['lastName'];
            $this->firstName = $row['firstName'];
            
        /*$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
                    fwrite($myfile, print_r("hi5", true));*/
    }
    
    // update the product
    function update(){
        
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    username = :username,
                    password = :password,
                    lastName = :lastName,
                    firstName = :firstName
                WHERE
                    email = :email";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->lastName=htmlspecialchars(strip_tags($this->lastName));
        $this->firstName=htmlspecialchars(strip_tags($this->firstName));
        $this->email=htmlspecialchars(strip_tags($this->email));
        
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':lastName', $this->lastName);
        $stmt->bindParam(':firstName', $this->firstName);
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
        $query = "DELETE FROM " . $this->table_name . " WHERE email = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));

        // bind id of record to delete
        $stmt->bindParam(1, $this->email);

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
                    email as username, email, password, lastName, firstName
                FROM
                    " . $this->table_name . " 
                WHERE
                    email LIKE ? ";

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