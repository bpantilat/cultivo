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

// set Portfolio property values
$tag = isset($_POST['tag']) ? $_POST['tag'] : $Tag->errorOccured();
$Portfolio->bold_title = isset($_POST['bold_title']) ? $_POST['bold_title'] : $Portfolio->errorOccured();
$Portfolio->type = isset($_POST['type']) ? $_POST['type'] : $Portfolio->errorOccured();
$Portfolio->image = isset($_FILES['image']) ? $_FILES['image'] : $Portfolio->errorOccured();
$Portfolio->status = isset($_POST['status']) ? $_POST['status'] : $Portfolio->errorOccured();
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
    if($id=$Portfolio->addportfolio())
    {
    
        
        $tag1=json_decode($tag);
        foreach($tag1 as $t)
        {
            $Tag->id=$id;
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
        $Portfolio->id=$id;
        if ($Portfolio->uploadImage()) 
        {
            $res_msg=array(
            "status" => true,
            "response" => "Portfolio added sucessfully"
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
            "status" => false,
            "response" => $Portfolio->error
        );
    }
}
//make it json format
print_r(json_encode($res_msg));
?>