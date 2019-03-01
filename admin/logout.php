<?php session_start();
unset($_SESSION["id"]); 
unset($_SESSION["email"]); 
unset($_SESSION["first_name"]);
unset($_SESSION["last_name"]);  
unset($_SESSION["image"]);
// where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**

header("Location: index.php");
?>