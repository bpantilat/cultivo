<?php
 
// get database connection
include_once 'config/database.php';
// instantiate Tag object
include_once 'functions/tag.php'; 
$database = new Database();
$db = $database->getConnection();
$Tag = new Tag($db);
// set Tag property values
$Tag->tag_id = isset($_POST['tag_id']) ? $_POST['tag_id'] : $Tag->errorOccured();

if( $Tag->errorOccured){
    $res_msg=array(
            "status" => false,
            "response" => $Tag->error
        );
}
else
{ 
    if($Tag->deletetag()){
          $res_msg=array(
            "status" => true,
            "response" => "Tag deleted sucessfully"
        );  
    }
    else
    {
        $res_msg=array(
            "status" => false,
            "response" => $Tag->error
        );
    }
}
//make it json format
print_r(json_encode($res_msg));
?>