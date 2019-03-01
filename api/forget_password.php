<?php
// get database connection
include_once 'config/database.php';
// instantiate Account object
include_once 'functions/account.php'; 
$database = new Database();
$db = $database->getConnection();
$Account = new Account($db);
// set Account property values
$Account->email = isset($_POST['email']) ? $_POST['email'] : $Account->errorOccured();
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
    if($pass=$Account->forget_password()){

        $to = $_POST['email'];
        $subject1 = 'Cultivo:New Password';
        $txt = "New Password:".$pass;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <admin@cultivo.com>' . "\r\n";

     
                $res_msg=array(
            "status" => true,
            "response" => "new Password has been send to your email!"
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