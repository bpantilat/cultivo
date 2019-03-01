<?php
class Tag{
    // database connection and table name
    private $conn;
    private $table_name = "tag";
    // Account functions
	public $tag_id;  
	public $tag_name;
	public $id;
	public $created;
	public $error;
	public $errorOccured = false;
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
	function addtag(){
		//query to insert record
		$query = "INSERT INTO " . $this->table_name . " SET tag_name=:tag_name, id=:id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->tag_name=htmlspecialchars(strip_tags($this->tag_name));
		$this->id=htmlspecialchars(strip_tags($this->id));
		

		// bind values
		$stmt->bindParam(":tag_name", $this->tag_name);
		$stmt->bindParam(":id", $this->id);

		
		// execute query
		if($stmt->execute()){
			$this->id=$this->conn->lastInsertId();
			return true;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;
    
	}
	function deletetag(){
		//query to insert record
		$query = "Delete from " . $this->table_name . " where tag_id=:tag_id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->tag_id=htmlspecialchars(strip_tags($this->tag_id));
	
		$stmt->bindParam(":tag_id", $this->tag_id);
		
		// execute query
		$stmt->execute();
		return $stmt;
    
	}

	function viewtag(){
		//query to insert record
		$query = "Select `tag_id`, `id`, `created`, `tag_name` from ".$this->table_name."  where id=:id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
	
		// bind values
		$stmt->bindParam(":id", $this->id);

		// execute query
		$stmt->execute();
		return $stmt;

	}

	function deleteTags(){
		//query to insert record
		$query = "Delete   from ".$this->table_name."  where id=:id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
	
		// bind values
		$stmt->bindParam(":id", $this->id);

		// execute query
		$stmt->execute();
		return $stmt;

	}


		function errorOccured(){
		$this->error = "invalid Parameters";
		$this->errorOccured = true;
		return false;
	}


}