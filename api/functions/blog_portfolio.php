<?php
class Blog_Portfolio{
// database connection and table name
    private $conn;
    private $table_name = "blog_portfolio";
    // Account functions
	public $id;  
	public $context;
	public $bold_title;
	public $blog_text;
	public $tag_name;
	public $image;
	public $type;
	public $created;
	public $status;
	public $error;
	public $errorOccured = false;
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    function addblog(){
    		// query to insert record
		$query = "INSERT INTO " . $this->table_name . " SET context=:context, blog_text=:blog_text,bold_title=:bold_title, type=:type, status=:status,created=:created";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->context=htmlspecialchars(strip_tags($this->context));
		$this->bold_title=htmlspecialchars(strip_tags($this->bold_title));
		$this->blog_text=$this->blog_text;
		$this->type=htmlspecialchars(strip_tags($this->type));
		$this->status=htmlspecialchars(strip_tags($this->status));
		

		// bind values
		$stmt->bindParam(":context", $this->context);
		$stmt->bindParam(":bold_title", $this->bold_title);
		$stmt->bindParam(":blog_text", $this->blog_text);
		$stmt->bindParam(":type", $this->type);
		$stmt->bindParam(":status", $this->status);
		$stmt->bindParam(":created", $this->created);
		// execute query
		if($stmt->execute()){
			$this->id=$this->conn->lastInsertId();
			return true;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;
	}

	

	function viewAllBlogs(){

			// select all query
		$query = "SELECT * FROM ". $this->table_name . " where type=:type AND status=:status";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->type=htmlspecialchars(strip_tags($this->type));
		$this->status=htmlspecialchars(strip_tags($this->status));

		// bind values
		$stmt->bindParam(":type", $this->type);
		$stmt->bindParam(":status", $this->status);

		// execute query
		$stmt->execute();
		return $stmt;
	}
	function viewAllBlogs1(){

			// select all query
		$query = "SELECT * FROM ". $this->table_name . " where type=:type ";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->type=htmlspecialchars(strip_tags($this->type));
		

		// bind values
		$stmt->bindParam(":type", $this->type);
		

		// execute query
		$stmt->execute();
		return $stmt;
	}

	function viewBlogDetail(){

			// select all query
		$query = "SELECT id,context,image,bold_title,blog_text,type,status,created FROM ". $this->table_name . " where id=:id";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));

		// bind values
		$stmt->bindParam(":id", $this->id);

		// execute query
		$stmt->execute();
		return $stmt;
	}

	function viewPortfolioDetail(){

			// select all query
		$query = "SELECT id,image,bold_title,type,status,created FROM ". $this->table_name . " where id=:id";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));

		// bind values
		$stmt->bindParam(":id", $this->id);

		// execute query
		$stmt->execute();
		return $stmt;
	}


	function updateBlog(){
		// query to insert record
		$query = "UPDATE " . $this->table_name . " SET context=:context, bold_title=:bold_title, blog_text=:blog_text,created=:created
				WHERE id=:id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->context=htmlspecialchars(strip_tags($this->context));
		$this->blog_text=$this->blog_text;
		$this->bold_title=htmlspecialchars(strip_tags($this->bold_title));
		
		// bind values
		$stmt->bindParam(":id", $this->id);
		$stmt->bindParam(":context", $this->context);
		$stmt->bindParam(":bold_title", $this->bold_title);
		$stmt->bindParam(":blog_text", $this->blog_text);
		$stmt->bindParam(":created", $this->created);
		
		// execute query
		if($stmt->execute()){
			$this->id = $this->conn->lastInsertId();
			return true;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;

	}

	function changeStatus(){
		// select all query
		$query = "Update  " . $this->table_name . "  SET `status`=:status WHERE id=:id";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->status=htmlspecialchars(strip_tags($this->status));
		
		// bind values
		$stmt->bindParam(":id", $this->id);
		$stmt->bindParam(":status", $this->status);
		// execute query
		$stmt->execute();
		return $stmt;
	}

	function addportfolio(){
    		// query to insert record
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
					bold_title=:bold_title, type=:type, status=:status, created=:created";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->bold_title=htmlspecialchars(strip_tags($this->bold_title));
		$this->type=htmlspecialchars(strip_tags($this->type));
		$this->status=htmlspecialchars(strip_tags($this->status));
		

		// bind values
		$stmt->bindParam(":bold_title", $this->bold_title);
		$stmt->bindParam(":type", $this->type);
		$stmt->bindParam(":status", $this->status);
		$stmt->bindParam(":created", $this->created);
		
		
	// execute query
		if($stmt->execute()){
			$this->id=$this->conn->lastInsertId();


			// fetch tags array 			//$row =$stmt->fetch(PDO::FETCH_ASSOC);
			// iterate of tag array 
			// insert each tag in tags table with $this->id



			return $this->id;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;
	}


	function viewAllPortfolio(){

			// select all query
		$query = "SELECT * FROM ". $this->table_name . " where type=:type AND status=:status";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->type=htmlspecialchars(strip_tags($this->type));
		$this->status=htmlspecialchars(strip_tags($this->status));

		// bind values
		$stmt->bindParam(":type", $this->type);
		$stmt->bindParam(":status", $this->status);

		// execute query
		$stmt->execute();
		return $stmt;
	}

	function dashboard(){

			// select all query
		$query1 = "SELECT COUNT(*) as blog_count FROM ". $this->table_name . " where type='blog' AND status=1";
		$query2 = "SELECT COUNT(*) as portfolio_count  FROM ". $this->table_name . " where type='portfolio' AND status=1";
		
		// prepare query statement
		$stmt1 = $this->conn->prepare($query1);
		$stmt2 = $this->conn->prepare($query2);

		// execute query
		$stmt1->execute();
		$stmt2->execute();
		return array($stmt1,$stmt2);
	}

	function viewAllPortfolio1(){

			// select all query
		$query = "SELECT * FROM ". $this->table_name . " where type=:type ";
		
		// prepare query statement
		$stmt = $this->conn->prepare($query);

		// sanitize
		$this->type=htmlspecialchars(strip_tags($this->type));
		

		// bind values
		$stmt->bindParam(":type", $this->type);

		// execute query
		$stmt->execute();
		return $stmt;
	}



	function updatePortfolio(){
		// query to insert record
		$query = "UPDATE " . $this->table_name . "
				SET
					bold_title=:bold_title, created=:created
					where id=:id";
		// prepare query
		$stmt = $this->conn->prepare($query);
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
		$this->bold_title=htmlspecialchars(strip_tags($this->bold_title));
		//$this->image=htmlspecialchars(strip_tags($this->image));
		
		// bind values
		$stmt->bindParam(":id",$this->id);
		$stmt->bindParam(":bold_title", $this->bold_title);
		$stmt->bindParam(":created", $this->created);
		//$stmt->bindParam(":image", $this->image);
		
		// execute query
		if($stmt->execute()){
			$this->id = $this->conn->lastInsertId();
			return true;
		}
		$this->error = "Unexpected error occured, try again in few minutes!";
		return false;

	}

function uploadImage()
	{
		// // query to insert record
		// $upload_path="http://qaraad.com/anomaly/uploads/anomalies/";
		
		$image_file = $this->image["name"];
		$text = str_replace(' ', '_', $image_file);
		$temp1 = explode(".", $text);
		$date=explode("-",  date("Y-m-d"));
		$time=explode(":",  date("H:i:s"));
		$date1=$date[0].$date[1].$date[2];
		$time1=$time[0].$time[1].$time[2];
		$image_file = $temp1[0]."_".$date1."_".$time1. "." . $temp1[1];
		$type  =  $this->image["type"]; //file name "txt_file" 
		$size  =  $this->image["size"];
		$temp  =  $this->image["tmp_name"];
		$path="upload/".$image_file; //set upload folder path
		//var_dump($path);
		//var_dump($this->image);
		if(empty($image_file))
		{
		   $this->error="Please Select Image";
		}
		else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
		{ 
		   if(!file_exists($path)) //check file not exist in your upload folder path
		   {
		    	if($size < 5000000) //check file size 1MB
		    	{
		     		if(move_uploaded_file($this->image["tmp_name"], '../uploads/'.$image_file))
		     		{

		     			//move upload file temperory directory to your upload folder
			     		// prepare query
			     		$query = "Update ". $this->table_name ." SET image=:image Where id=:id";
			     		
						$stmt = $this->conn->prepare($query);
						// sanitize
						$image_file=htmlspecialchars(strip_tags($image_file));
						$this->id=htmlspecialchars(strip_tags($this->id));

						// bind values
						$stmt->bindParam(":image", $image_file);
						$stmt->bindParam(":id", $this->id);
						// execute query
						if($stmt->execute()){
							return true;
						}
						$this->error = "Unexpected error occured, try again in few minutes!";
						return false;
		     		}
		     		else
		     		{
		     			$this->error="Error in uploading file".$this->image["error"];
		     		}

		    	}
		    	else
		    	{
		     		$this->error="Your File To large Please Upload less than 5MB Size"; //error message file size not large than 5MB
		    	}
		   	}
		   	else
		   	{ 
		    	$this->error="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
		   	}
		}
		else
		{
		   $this->error="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
		}
		
	}


	function errorOccured(){
		$this->error = "invalid Parameters";
		$this->errorOccured = true;
		return false;
	}


}