<?php
session_start();
include_once("sqlConn.php");

print "<body>";
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){

  $con = openConnection("ass99", "KOBEbryant24!", "sql1.njit.edu");
  print "<h3>All Questions for {$_SESSION['email']}</h3></br>" ;
  
  $results = getAllQuestions($con, $_SESSION['email']);
  
  print "<style>
             
            main {display: flex;}
            main > * {border: 1px solid;}
            body {background: #b6e3e2; text-align: center;}
            h3 {  border:  1px solid;
                  padding: 10px;
                  min-width: 200px;
                  background: #8fb5b4;
                  box-sizing: border-box;
                  text-align: center;
            }
            table {border-collapse: collapse; font-family: helvetica}
            td, th {border:  1px solid;
                  padding: 10px;
                  min-width: 200px;
                  background: #8fb5b4;
                  box-sizing: border-box;
                  text-align: left;
            }
            .table-container {
              position: relative;
              max-height:  300px;
              width: 500px;
              overflow: scroll;
            }
            .center {
              margin-left: auto;
              margin-right: auto;
            }
            
            /* MAKE LEFT COLUMN FIXEZ */
            tr > :first-child {
              position: -webkit-sticky;
              position: sticky; 
              background: hsl(180, 50%, 70%);
              left: 0; 
            }

        </style>";
  
  print "<table>
            <tr>
            <th>Title</th>
            <th>Body</th>
            <th>Skills</th> 
            </tr>";
  
  foreach($results as $value){

    print "<tr>";   
    print "<td>" . $value["title"] . "</td>";
    print "<td>" . $value["body"] . "</td>";
    print "<td>" . $value["skills"] . "</td>";

  }
  print "</tr>";
  print "</table><br><br>";

  print "<form action=\"questions.html\">
    <input type=\"submit\" value=\"Add a Question\" /><br>
         </form><br>";
  
    print "<form action=\"logout.php\">
    <input type=\"submit\" value=\"Logout\" /><br>
         </form>";
  
  
} else{
  echo "please login!";
  session_destroy();
  header( "refresh:1; url=index.html" ); 
 // header("url=index.html"); 
  
}

print "</body>"







?>