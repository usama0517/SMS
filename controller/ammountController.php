<?php
include("../model/connect.php");

function addSoldAmmount($iid,$ammt){
    try{
    $sql="INSERT INTO solditem(iid,amt) value('$iid','$ammt')";
    $res=mysqli_query($GLOBALS["conn"],$sql);
    return $res;
    }
    catch(mysqli_sql_exception){
        echo "couldn't add Sold Item please try again";
        return false;
    }
}

function addNewAmmount($iid,$ammt){
    try{
    $sql="INSERT INTO newitem(iid,ammt) value('$iid','$ammt')";
    $res=mysqli_query($GLOBALS["conn"],$sql);
    return $res;
    }
    catch(mysqli_sql_exception){
        echo "couldn't add to New Item please try again";
        return false;
    }
}

?>