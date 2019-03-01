<?php
// get database connection
include_once 'config/database.php';
include_once 'functions/account.php'; 
$database = new Database();
$db = $database->getConnection();
$Account = new Account($db);
// set Account property values
$Account->id = isset($_POST['id']) ? $_POST['id'] : $Account->errorOccured();
$Account->name = isset($_POST['username']) ? $_POST['username'] : $Account->errorOccured();
$Account->created = date('Y-m-d H:i:s');
 
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
    if($Account->updateAccountDetail()){
            $res_msg=array(
            "status" => true,
            "response" => "Account Updated successfully!"
            );
        
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