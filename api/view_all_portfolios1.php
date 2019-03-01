<?php
// get database connection
include_once 'config/database.php';
// instantiate Portfolio object
include_once 'functions/blog_portfolio.php'; 
include_once 'functions/tag.php'; 
$database = new Database();
$db = $database->getConnection();
$PView = new Blog_Portfolio($db);
$Tag= new Tag($db);
// set Portfolio property values
$PView->type = isset($_POST['type']) ? $_POST['type'] : $PView->errorOccured();
// read the details of Account to be edited
    // create the Account
    $stmt=$PView->viewAllPortfolio1();
    $resp1=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
         {
            $id=$row['id'];
            $Tag->id=$id;
            $stmt1=$Tag->viewtag();
            $resp=array();
            while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
            {
               array_push($resp, $row1);
            }

            $completeInfo=array(
                    "detail" => $row,
                    "tags" => $resp
                );

            array_push($resp1, $completeInfo);
         }

         $res_msg=array(
                    "status" => true,
                    "response" => $resp1
                );

   

//make it json format
print_r(json_encode($res_msg));
?>

