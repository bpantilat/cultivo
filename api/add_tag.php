<?php
 
// get database connection
include_once 'config/database.php';
// instantiate Tag object
include_once 'functions/tag.php'; 
$database = new Database();
$db = $database->getConnection();
$Tag = new Tag($db);
// set Tag property values
$Tag->tag_name = isset($_POST['tag_name']) ? $_POST['tag_name'] : $Tag->errorOccured();
$Tag->id = isset($_POST['id']) ? $_POST['id'] : $Tag->errorOccured();
$Tag->created = date('Y-m-d H:i:s');
 
if( $Tag->errorOccured){
    $res_msg=array(
            "status" => false,
            "response" => $Tag->error
        );
}
else
{ 
    if($Tag->addtag()){
          $res_msg=array(
            "status" => true,
            "response" => "TagName added sucessfully"
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