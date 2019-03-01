<?php
 
// get database connection
include_once 'config/database.php';
// instantiate Blog object
include_once 'functions/blog_portfolio.php'; 
$database = new Database();
$db = $database->getConnection();
$Blog = new Blog_Portfolio($db);
// set Blog property values
$Blog->context = isset($_POST['context']) ? $_POST['context'] : $Blog->errorOccured();
$Blog->bold_title = isset($_POST['bold_title']) ? $_POST['bold_title'] : $Blog->errorOccured();
$Blog->blog_text = isset($_POST['blog_text']) ? $_POST['blog_text'] : $Blog->errorOccured();
$Blog->image = isset($_FILES['image']) ? $_FILES['image'] : $Blog->errorOccured();
$Blog->type = isset($_POST['type']) ? $_POST['type'] : $Blog->errorOccured();
$Blog->status = isset($_POST['status']) ? $_POST['status'] : $Blog->errorOccured();
$Blog->created = date('Y-m-d H:i:s');
 
if($Blog->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Blog->error
        );
}
else
{ 
    if($Blog->addblog()){
          if ($Blog->uploadImage()){
            $res_msg=array(
            "status" => true,
            "response" => "Blog added sucessfully"
             );
                }
                else{
                    $res_msg=array(
                    "status" => false,
                    "response" => $Blog->error
                 );
                }
          $res_msg=array(
            "status" => true,
            "response" => "Blog added sucessfully"
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