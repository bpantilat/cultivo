<?php
// get database connection
include_once 'config/database.php';
include_once 'functions/blog_portfolio.php'; 
include_once 'functions/tag.php'; 
$database = new Database();
$db = $database->getConnection();
$BlogPortfolio = new Blog_Portfolio($db);
$Tag = new Tag($db);
// set Account property values
$BlogPortfolio->id = isset($_POST['id']) ? $_POST['id'] : $BlogPortfolio->errorOccured();
$id = isset($_POST['id']) ? $_POST['id'] : $Tag->errorOccured();
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
    $stmt=$BlogPortfolio->viewPortfolioDetail();
    if($stmt->rowCount() > 0)
    {
        $Tag->id=$id; 
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         $stmt1=$Tag->viewtag();
         $row2=array();
              while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC))
              {
                array_push($row2, $row1);
              }

             $res_msg=array(
            "status" => true,
            "response" => array('detail'=>$row,'tags'=>$row2)
            ); 
    }
     else
     {
        $res_msg=array(
        "status" => false,
        "response" => $Tag->error,
            );
    }
}
print_r(json_encode($res_msg));
?>