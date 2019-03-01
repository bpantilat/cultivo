<?php
// get database connection
include_once 'config/database.php';
include_once 'functions/account.php'; 
$database = new Database();
$db = $database->getConnection();
$Account = new Account($db);
// set Account property values
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
    $stmt=$Account->view_detail();
    if($stmt->rowCount() > 0)
    {
         $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $res_msg=array(
            "status" => true,
            "response" => $row
        );  
    }
    else{
        $res_msg=array(
            "status" => false,
            "response" => 'No detail found.'
        );
    }
}
print_r(json_encode($res_msg));
?>