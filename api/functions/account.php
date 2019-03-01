<?php
class Account{
    // database connection and table name
    private $conn;
    private $table_name = "admin";
    // Account functions
	public $id;  
	public $firstname;
	public $lastname;
	public $username;
	public $image;
	public $email;
	public $password;
	public $created;
	public $error;
	public $errorOccured = false;
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
	function signin(){
		if($this->isAlreadyExist()){
			$this->error = "Email already exists!";
			return false;
		}
		else if($this->isUserIdAlreadyExist())
		{
			$this->error = "User id already  exists!";
			return false;
		}
		// query to insert record
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
					username=:username, email=:email, id=:id, image=:image, password=:password";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->username=htmlspecialchars(strip_tags($this->username));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->password=htmlspecialchars(strip_tags($this->password));
		
		// bind values
		$stmt->bindParam(":id", $this->id);
		$stmt->bindParam(":username", $this->username);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":password", md5($this->password));
		
		// execute query
		if($stmt->execute()){
			$this->id = $this->conn->lastInsertId();
			return true;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;
    
	}


	function updateAccountDetail(){
		
		

		// query to insert record
		$query = "Update
					" . $this->table_name . "
				SET
					username=:username, where id=:id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
		
		$this->username=htmlspecialchars(strip_tags($this->username));
		
		// bind values
		$stmt->bindParam(":id", $this->id);
		$stmt->bindParam(":username", $this->username);
		
		// execute query
		if($stmt->execute()){
			$this->id = $this->conn->lastInsertId();
			return true;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;
    
	}
	
    // login Account
    function login(){
		// select all query
		$query = "SELECT `id`,`firstname`,`lastname`,`username`, `email`, `image` , `created`  FROM  " . $this->table_name . "   WHERE  email='".$this->email."' AND password='".md5($this->password)."'";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
	}

	 // login Account
    function view(){
		// select all query
		$query = "SELECT `id`,`username`, `email`, `image`, `password`,`created`
            FROM
                " . $this->table_username . " 
            WHERE 1";
           
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
	}

	function view_detail(){
		// select all query
		$query = "SELECT
                `id`,`username`, `email`, `password`, `image`,`created`
            FROM
                " . $this->table_name . " 
            WHERE
                id=".$this->id;
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		return $stmt;
	}


	
	function change_password(){
		$query = "Select password from " . $this->table_name . "  WHERE id=".$this->id;
				// prepare query statement
				$stmt = $this->conn->prepare($query);
				// execute query
				$stmt->execute();
				$row =$stmt->fetch(PDO::FETCH_ASSOC);
				$password=$row['password'];
				// var_dump($this->password);
				// var_dump($this->current_password);
				if(md5(htmlspecialchars(strip_tags($this->current_password)))==$password)
				{
									// select all query
					$query = "Update" . $this->table_name . " 
					 SET `password`=".md5($this->password)."
			            WHERE
			                id=".$this->id;
					
					$stmt = $this->conn->prepare($query);
					// execute query
					$stmt->execute();
					return $stmt;
				}
				else{
					$this->error="Current Password is not matched.";
				}
      
				
	

	}

	function forget_password(){
		// select all query
		
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $password=implode($pass); 

    $password1=md5($password);
    

    $query = "UPDATE admin SET `password`=:password where `email`=:email";
		$stmt = $this->conn->prepare($query);
		$this->email=htmlspecialchars(strip_tags($this->email));

		// bind values
		$stmt->bindParam(":email", $this->email);
	
		// bind values
		$stmt->bindParam(":password",$password1);
		// execute query
	
		$stmt->execute();
		return $password;

	}
	

	//already exist check
	function userIdAlreadyExist(){
		$query = "SELECT * 
			FROM 
				" . $this->table_name . " 
			WHERE 
				id='".$this->id."'";
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		// execute query
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return true;
		}
		else{
		   return false;
		}
	}
	
	function errorOccured(){
		$this->error = "invalid Parameters";
		$this->errorOccured = true;
		return false;
	}
	
	//active Account check
	function isActive(){
		$query = "SELECT * 
			FROM 
				" . $this->table_name . " 
			WHERE 
				email='".$this->email."' and status=1";
				
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		
		// execute query
		$stmt->execute();
		
		if($stmt->rowCount() > 0){
			return true;
		}
		else{
		   return false;
		}
	}


    

}