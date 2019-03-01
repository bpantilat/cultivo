<?php
// get database connection
include_once 'config/database.php';
include_once 'functions/blog_portfolio.php'; 
$database = new Database();
$db = $database->getConnection();
$Bupdate = new Blog_Portfolio($db);
// set Account property values
$Bupdate->id = isset($_POST['id']) ? $_POST['id'] : $Bupdate->errorOccured();
$Bupdate->context = isset($_POST['context']) ? $_POST['context'] : $Bupdate->errorOccured();
$Bupdate->bold_title = isset($_POST['bold_title']) ? $_POST['bold_title'] : $Bupdate->errorOccured();
$Bupdate->blog_text = isset($_POST['blog_text']) ? $_POST['blog_text'] : $Bupdate->errorOccured();
$Bupdate->image = isset($_FILES['image']) ? $_FILES['image'] : null;
$Bupdate->created = date('Y-m-d H:i:s');
 
if( $Bupdate->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Bupdate->error
        );
}
else
{ 
   if(!isset($_FILES['image']))
    { 
        if($Bupdate->updateBlog())
        {
        
            $res_msg=array(
            "status" => true,
            "response" => "Blog updated sucessfully"
             );
        }
        else
        {
            $res_msg=array(
            "status" => false,
            "response" => $Bupdate->error
         );
        }
    }
    else if(isset($_FILES['image']))
    {
         
        if($Bupdate->updateBlog())
        {
            $Bupdate->id = $_POST['id']; 
            if ($Bupdate->uploadImage())
            {
   
                $res_msg=array(
                "status" => true,
                "response" => "Blog updated sucessfully"
                 );
            }
            else
            {
                $res_msg=array(
                "status" => false,
                "response" => $Bupdate->error
             );
            }
        }
        else
        {
          $res_msg=array(
            "status" => true,
            "response" => "Blog updated sucessfully"
            );
        }  
         
    }
   
}
print_r(json_encode($res_msg));
?>