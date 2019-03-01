<?php
 // get database connection
include_once 'config/database.php';
// instantiate Portfolio object
include_once 'functions/blog_portfolio.php';


$database = new Database();
$db = $database->getConnection();
$Portfolio = new Blog_Portfolio($db);


$Portfolio->id = isset($_POST['id']) ? $_POST['id'] : $Portfolio->errorOccured();
// set Portfolio property values

$Portfolio->bold_title = isset($_POST['bold_title']) ? $_POST['bold_title'] : $Portfolio->errorOccured();
$Portfolio->image = isset($_FILES['image']) ? $_FILES['image'] : null;
$Portfolio->created = date('Y-m-d H:i:s');
 $tag_check=0;
if( $Portfolio->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Portfolio->error
        );
}
else
{ 
   if(!isset($_FILES['image']))
    { 
        if($Portfolio->updatePortfolio())
        {
            
            $res_msg=array(
            "status" => true,
            "response" => "Portfolio updated sucessfully"
             );
        }
        else
        {
            $res_msg=array(
            "status" => false,
            "response" => $Portfolio->error
         );
        }
    }
    else if(isset($_FILES['image']))
    {
         
        if($Portfolio->updateBlog())
        {

            $Portfolio->id = $_POST['id']; 
            if ($Portfolio->uploadImage())
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
                "response" => $Portfolio->error
             );
            }
        }
        else
        {
          $res_msg=array(
            "status" => true,
            "response" => "Portfolio updated sucessfully"
            );
        }  
         
    }
   
}
print_r(json_encode($res_msg));
?>