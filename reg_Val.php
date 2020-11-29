<?php

include_once("sqlConn.php");

$fname = $lname = $bday = $email = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   if (empty($_POST["email"])) {
    $nameErr = "Name is required";
    } else {
    $email = ($_POST["email"]);
    }

   if (empty($_POST["password"])) {
    $nameErr = "Password is required";
    } 
    else if(strlen($_POST["password"]) <  8 ){
    
    $nameErr = "Password must be greater than 8 characters";
    }
   else {
    $pass = ($_POST["password"]);
    }
    
   if (empty($_POST["fname"])) {
    $nameErr = "First Name is required";
   } else {
    $fname = ($_POST["fname"]);
   }
   
   if (empty($_POST["lname"])) {
    $nameErr = "Last Name is required";
   } else {
    $lname = ($_POST["lname"]);
   }
   if (empty($_POST["date"])) {
    $nameErr = "Date is required";
   } else {
    $bday = ($_POST["date"]);
   }
}



if(empty($nameErr)){

  //echo "Successful Registration!";
  $con = openConnection("ass99", "KOBEbryant24!", "sql1.njit.edu");
  $boolBool = insertUserReg($con, $fname, $lname, $bday, $email, $pass);
  if($boolBool == true){
    header( "refresh:1; url=index.html" );
  }
  else{
   echo "Something bad happened!";
   header( "refresh:3; url=registration.html" ); 
  }

}
else{
  
  echo $nameErr;
}
  

?>