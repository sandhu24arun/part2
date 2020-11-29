<?php

//$username = 'ass99';
//$password = 'KOBEbryant24!';
//$hostname = 'sql1.njit.edu';

function openConnection($username, $password, $hostname){

  $dsn = "mysql:host=$hostname;dbname=$username";
  try {

    $conn = new PDO($dsn, $username, $password);
    
    } catch(PDOException $e) {
    
    echo "Connection failed: " . $e->getMessage();
  }
  
  return $conn;
}

function loginCheck($conn, $email, $password){
  
  try{
    
    $stmt = $conn->prepare("SELECT email, password FROM ass99.accounts where email= :email and password = :pass ;");
    $stmt->execute(array(':email' => $email, ':pass' => $password));
    $result = $stmt->fetch();
    //var_dump($result);
    if($result['email'] == $email){
      if($result['password'] == $password){
        return true;
      }
    }
    else{
      return false;
    }
  } catch(PDOException $e){
      print $e->getMessage();
  }
}

function insertUserReg($conn, $fname, $lname, $bday, $email, $password){

    try{
    
    $stmt = $conn->prepare("Insert into ass99.accounts(email, fname, lname, birthday, password) 
                            values(:email, :fname,:lname, :birthday, :pass );");
    if($stmt->execute(array(':email' => $email, ':fname' => $fname, ':lname' => $lname, ':birthday' => $bday, ':pass' => $password)) == true){
      return true;
    }
    else{
      return false;
    }
    //$result = $stmt->fetch();

   
  } catch(PDOException $e){
      print $e->getMessage();
  }


}

function insertQuestion($conn, $email, $title, $body, $skills){
  
  try{
    $date = date("Y-m-d H:i:s");
    $stmt = $conn->prepare("Insert into ass99.questions(owneremail, createddate, title, body, skills) 
                            values(:owneremail, :createddate, :title, :body, :skills);");
    if($stmt->execute(array(':owneremail' => $email, ':createddate' => $date, ':title' => $title, ':body' => $body, ':skills' => $skills)) == true){
      return true;
    }
    else{
      return false;
    }

   
  } catch(PDOException $e){
      print $e->getMessage();
  }
}

function getAllQuestions($conn, $email){

  try{
    
    $stmt = $conn->prepare("SELECT * FROM ass99.questions where owneremail= :email;");
    if($stmt->execute(array(':email' => $email)) == true){
      $result = $stmt->fetchAll();
      return $result;
    }
    else{
      
      return null;
    }
  }catch(PDOException $e){
      print $e->getMessage();
  }
    
    

}
?>