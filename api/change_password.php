<?php
// get database connection
include_once 'config/database.php';
// instantiate Account object
include_once 'functions/account.php'; 
$database = new Database();
$db = $database->getConnection();
$Account = new Account($db);
// set Account property values
$Account->password = isset($_POST['password']) ? $_POST['password'] : $Account->errorOccured();
$Account->id = isset($_POST['id']) ? $_POST['id'] : $Account->errorOccured();
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
 
    if($Account->change_password())
    {
    	
	   $res_msg=array(
	            "status" => true,
	            "response" => "Password change  successfully!"
	            );

    }
    else
    {
        $res_msg=array(
            "status" => false,
            "response" => $Account->error
        );
    }
  
}
print_r(json_encode($res_msg));
?>