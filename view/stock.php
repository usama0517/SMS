<?php 
include("../controller/catagoryController.php");
include("../controller/stockViewItems.php");
$catagories=fetchCatagory();


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stock.css"/>
    <title>Stock View</title>
</head>
<body>
    <?php include("./components/header.php") ?>
    <div class="container">
      
        
            <?php 
            $i=1;
            $array=array();
            array_push($array,"open");
            array_push($array,"nothing");
            array_push($array,"close");
            while($catagory=mysqli_fetch_assoc($catagories)){
               $i++;
               $a=$i%2;
               if($array[$a]=="open"){
                echo"<div class=\"segment\">";
               }
                echo"<div class=\"holder\">";
                echo"<h1>{$catagory['name']}</h1> <br>";
                $items=fetchItem($catagory['id']);
                if($items){
                while($item =mysqli_fetch_assoc($items)){
                     echo "<h3>{$item['ItemName']}: {$item['remainingAmount']}</h3>" ;
                }
            }
                echo" </div>";
                if($array[$a]=="close"){
                    echo"</div>";
                   }
                 
            }
            
            ?>
   
    </div>
    <?php include("./components/footer.php") ?>
</body>
</html>