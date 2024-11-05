<?php
include("../model/connect.php");

function addCatagory($name){
    try{
    $sql="INSERT INTO catagory(name) value('$name')";
    $res=mysqli_query($GLOBALS["conn"],$sql);
    return $res;
    }
    catch(mysqli_sql_exception){
        echo "couldn't add Catagory please try again";
        return false;
    }
}
function fetchCatagory(){
 $sql="SELECT * FROM catagory";
 $res = mysqli_query($GLOBALS["conn"],$sql);
 if(mysqli_num_rows($res)>0){
  return $res;
 }
 else{
    return false;
 }
}

?>