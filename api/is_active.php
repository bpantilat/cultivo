<?php
// get database connection
include_once 'config/database.php';
// instantiate Account object
include_once 'functions/account.php'; 
$database = new Database();
$db = $database->getConnection();
$Account = new Account($db);
// set Account property values
$Account->id = isset($_POST['id']) ? $_POST['id'] : $Account->errorOccured();
$Account->status = isset($_POST['status']) ? $_POST['status'] : $Account->errorOccured();
if( $Account->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $Account->error
        );
}
else
{ 
    // create the Account
    // create the Account
    if($Account->account_status()){
        if($Account->status=='1')
        {
                $res_msg=array(
            "status" => true,
            "response" => "Account activated successfully!"
            );
        }
        else if($Account->status=='0')
        {
                $res_msg=array(
            "status" => true,
            "response" => "Account deactivated successfully!"
            );
        }
        
    }
    else{
        $res_msg=array(
            "status" => false,
            "response" => $Account->error
        );
    }
  
}
print_r(json_encode($res_msg));
?>