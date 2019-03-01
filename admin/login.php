<?php
 session_start();
if(isset($_POST))
{ 
  if(isset($_POST['action']))
  {   
    if($_POST['action']=='login')
    {
      $email=$_POST['email'];
      $password=$_POST['password'];
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
              header("Location:index.php?err=invalid_email");              
        }
        else
        {
            $url = "http://arksols.com/cultivo/api/login.php";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,array('email' => $email,
                                        'password' => $password));
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response,true);

                if($response_a['status']==true)
                {
                  $_SESSION['id']=$response_a['id'];
                  $_SESSION['email']=$response_a['email'];
                  $_SESSION['first_name']=$response_a['first_name'];
                  $_SESSION['last_name']=$response_a['last_name'];
                   $_SESSION['image']=$response_a['image'];
                       header("Location:dashboard.php"); 
                }
                else if($response_a['status']==false)
                {
                    header("Location:index.php?err=login_fail");                                   
                } 
        }
    }
  } 
} 
?>