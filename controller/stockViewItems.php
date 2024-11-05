<?php
include("../model/connect.php");
function fetchItem($cid){
    try{
    $sql ="SELECT * FROM stock WHERE catagoryId='$cid'";
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