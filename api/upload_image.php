<?php
// include database and functions files
include_once 'config/database.php';
include_once 'functions/blog_portfolio.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
// prepare Image object
$Image = new Image($db);
$Image->image = isset($_FILES['image']) ? $_FILES['image'] : $Image->errorOccured();

if($Image->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Image->error
        );
}
else
{ 
    if($Image->uploadImage())
    {
          $res_msg=array(
            "status" => true,
            "response" => "Image uploaded sucessfully"
        );  
    }
    else
    {
        $res_msg=array(
            "status" => false,
            "response" => $Image->error
        );
    }
}
//make it json format
print_r(json_encode($res_msg));
?>