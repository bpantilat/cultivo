<?php
 // get database connection
include_once 'config/database.php';
// instantiate Portfolio object
include_once 'functions/blog_portfolio.php';
include_once 'functions/tag.php'; 

$database = new Database();
$db = $database->getConnection();
$Portfolio = new Blog_Portfolio($db);
$Tag = new Tag($db);

$Portfolio->id = isset($_POST['id']) ? $_POST['id'] : $Portfolio->errorOccured();
// set Portfolio property values
$tag = isset($_POST['tag']) ? $_POST['tag'] : $Tag->errorOccured();
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
            
                $Tag->id=$_POST['id'];
                $tag1=json_decode($tag);
                foreach($tag1 as $t)
                {
                    $Tag->id=$_POST['id'];
                    $Tag->tag_name=$t;
                    if ($Tag->addtag()) 
                    {
                         $tag_check=1;
                    }
                    else
                    {
                         $res_msg=array(
                        "status" => true,
                        "response" => "Error in intserting tags"
                         );

                    }
                }

            
            
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
                $Tag->id=$_POST['id'];
                $tag1=json_decode($tag);
                foreach($tag1 as $t)
                {
                    $Tag->id=$_POST['id'];
                    $Tag->tag_name=$t;
                    if ($Tag->addtag()) 
                    {
                         $tag_check=1;
                    }
                    else
                    {
                         $res_msg=array(
                        "status" => true,
                        "response" => "Error in intserting tags"
                         );

                    }
                }


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