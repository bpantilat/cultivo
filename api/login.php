<?php
// include database and functions files
include_once 'config/database.php';
include_once 'functions/account.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// prepare Account object
$Account = new account($db);
// set ID property of Account to be edited
$Account->email = isset($_POST['email']) ? $_POST['email'] : $Account->errorOccured();
$Account->password = isset($_POST['password']) ? $_POST['password'] : $Account->errorOccured();

if( $Account->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "message" => $Account->error
        );
}
else
{ 
    // read the details of Account to be edited
    $stmt = $Account->login();
    if($stmt->rowCount() > 0)
    {
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // create array
            $res_msg=array(
            "status" =>true,
            "response" => "Login Successfull!",
            "id" => $row['id'],
            "first_name" => $row['firstname'],
             "last_name" => $row['lastname'],
            "email" => $row['email']
            );
        
    }
    else 
    {
         $res_msg=array(
            "status" =>false,
            "response" =>"Invalid Email or password"
            );
    }
}
// make it json format
print_r(json_encode($res_msg));
?>