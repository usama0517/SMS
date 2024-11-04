<?php
include("../model/connect.php");
function addItem($cid,$name,$amt){
    try{
        $sql="INSERT INTO items(cid,name,initialAmt) VALUES ('$cid','$name','$amt')";
        $res =mysqli_query($GLOBALS["conn"],$sql);
      
            return $res;
        }
    
    catch(mysqli_sql_exception){
        echo"Couldn't save the new item properly please try again";
    }
}

function fetchItem($cid){
    try{
    $sql ="SELECT * FROM items WHERE cid='$cid'";
    $res =mysqli_query($GLOBALS["conn"],$sql);
    if(mysqli_num_rows($res)>0){
        return $res;
    }
    else {
        return false;
    }
}
catch(mysqli_sql_exception){
    echo "ERROR COULDN'T FETCH THE ITEMS";
}
}



?>