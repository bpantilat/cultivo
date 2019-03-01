<?php
// get database connection
include_once 'config/database.php';
include_once 'functions/blog_portfolio.php'; 
include_once 'functions/tag.php'; 
$database = new Database();
$db = $database->getConnection();
$BlogPortfolio = new Blog_Portfolio($db);
// set Account property values
$BlogPortfolio->id = isset($_POST['id']) ? $_POST['id'] : $BlogPortfolio->errorOccured();
if( $BlogPortfolio->errorOccured)
{
    $res_msg=array(
            "status" => false,
            "response" => $BlogPortfolio->error
        );
}
else
{ 
    // create the Account
    $stmt=$BlogPortfolio->viewBlogDetail();
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