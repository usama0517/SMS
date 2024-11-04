<?php
$db_server="127.0.0.1:8111"; 
$db_user="root";
$db_pass="";
$db_name="stockmanagmentsystem";
$conn ="";
try{
        
    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name,);
   
  }
  catch(mysqli_sql_exception){
   echo "could not establish connecttion try again or refresh the page";
  }

?>