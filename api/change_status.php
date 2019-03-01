<?php
// get database connection
include_once 'config/database.php';
// instantiate Status object
include_once 'functions/blog_portfolio.php'; 
$database = new Database();
$db = $database->getConnection();
$Status = new Blog_Portfolio($db);
// set Account property values
$Status->id = isset($_POST['id']) ? $_POST['id'] : $Status->errorOccured();
$Status->status = isset($_POST['status']) ? $_POST['status'] : $Status->errorOccured();
if( $Status->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Status->error
        );
}
else
{ 
    // create the Status
    if($Status->changeStatus()){
        if($Status->status=='1')
        {
                $res_msg=array(
            "status" => true,
            "response" => "Status activated successfully!"
            );
        }
        else if($Status->status=='0')
        {
                $res_msg=array(
            "status" => true,
            "response" => "Status deactivated successfully!"
            );
        }
        
    }
    else{
        $res_msg=array(
            "status" => false,
            "response" => $Status->error
        );
    }
  
}
print_r(json_encode($res_msg));
?>