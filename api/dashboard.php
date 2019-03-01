<?php
 
// get database connection
include_once 'config/database.php';
// instantiate Blog object
include_once 'functions/blog_portfolio.php'; 
$database = new Database();
$db = $database->getConnection();
$Blog = new Blog_Portfolio($db);
// set Blog property values
if($Blog->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Blog->error
        );
}
else
{ 
    $stmt=$Blog->dashboard();
    if($stmt)
    {
       $row1=$stmt[0]->fetch(PDO::FETCH_ASSOC);   
         $row2=$stmt[1]->fetch(PDO::FETCH_ASSOC);  
          $res_msg=array(
            "status" => true,
            "response" => array($row1,$row2)
        );  
    }
    else
    {
        $res_msg=array(
            "status" => false,
            "response" => $Blog->error
        );
    }
}
//make it json format
print_r(json_encode($res_msg));
?>