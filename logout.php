<?php

session_start();
session_destroy();
//unset($_SESSION['email']));
header( "refresh:1; url=index.html" ); 

?>