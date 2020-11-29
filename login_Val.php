<?php
session_start();
include_once("sqlConn.php");

$email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
       if (empty($_POST["email"])) {
        $nameErr = "Name is required";
      } else {
        $email = ($_POST["email"]);
        }
    
      if (empty($_POST["password"])) {
        $nameErr = "Password is required";
      } 
      else if(strlen($_POST["password"]) <  4 ){
        
        $nameErr = "Password must be greater than 8 characters";
      }
      else {
        $pass = ($_POST["password"]);
        }
    }
    
    if(empty($nameErr)){
     $con = openConnection("ass99", "KOBEbryant24!", "sql1.njit.edu");
     $boolBool = loginCheck($con, $email, $pass);
     if($boolBool == true){
       //header( "refresh:1; url=allQuestions.php" );
       $_SESSION['email'] = $email; 
       header( "refresh:1; url=allQuestions.php" );

     }
     else{
       echo "User does not exist\n" . "<br><br>";
       echo "New User Register redirection in progress...";
       session_destroy();
       header( "refresh:3; url=registration.html" ); 
     }
    }
    else{
      echo $nameErr;
    }
  

    
    
?>