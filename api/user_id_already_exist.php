<?php
// get database connection
include_once 'config/database.php';
// instantiate Account object
include_once 'functions/account.php'; 
$database = new Database();
$db = $database->getConnection();
$Account = new Account($db);
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
    $stmt=$Account->view();
    if($stmt->rowCount() > 0)
    {
         $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $res_msg=array(
            "status" => true,
            "response" => $row
        );  
    }
    else
    {
        $res_msg=array(
            "status" => false,
            "response" => 'No User found.'
        );
    }
}
print_r(json_encode($res_msg));
?>