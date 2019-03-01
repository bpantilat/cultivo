<?php
// get database connection
include_once 'config/database.php';
// instantiate BView object
include_once 'functions/blog_portfolio.php'; 
$database = new Database();
$db = $database->getConnection();
$BView = new Blog_Portfolio($db);
// set BView property values
$BView->type = isset($_POST['type']) ? $_POST['type'] : $BView->errorOccured();
$BView->status = isset($_POST['status']) ? $_POST['status'] : $BView->errorOccured();
// read the details of Account to be edited
    // create the Account
    $stmt=$BView->viewAllBlogs();
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
            "response" => 'No Blog found.'
        );
    }

//make it json format
print_r(json_encode($res_msg));
?>

