<?php
 include("../controller/catagoryController.php");
 include("../controller/itemController.php");
 include("../controller/ammountController.php");

//===========After Choosing Catagory The Items Fetch Logic
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  if(isset($_POST["value"])){
   // $Items;
    $val = $_POST["value"];
    $_COOKIE["val"]=$val;
    $result= fetchItem($val);
    $options=array();
    if(isset($result)&&$result){
    while ($row = $result->fetch_assoc()) {
      $options[] = array("value" => $row['id'], "text" => $row['name']);
  }
  // Return JSON encoded options
  header("Content-Type: application/json; charset=utf-8", true);
  exit( json_encode( $options ) );#terminate

  }
  else{
    $options[]=array("vale"=>"none","text"=>"none");
    header("Content-Type: application/json; charset=utf-8", true);
    exit( json_encode( $options ) );#terminate
  
  }
  }
  //------------------------------------------------------------------------
  //MaiForm Submit Processing...............................
  if(isset($_POST["mainSubmit"])){
    $iid=$_POST["selectItem"];
    $sold=$_POST["soldAmmount"];
    if(isset($sold)&&isset($iid)){
      $res=addSoldAmmount($iid,$sold);
      if($res){
        
        echo '<script language="javascript">';
        echo 'alert("succsessfully added")';
        echo '</script>';
      }
      else{
        
        echo '<script language="javascript">';
        echo 'alert("Try Again!!!")';
        echo '</script>';
      }
    }
    if(isset($_POST["newAmmount"])){
      $new=$_POST["newAmmount"];
    if(isset($iid)&&isset($new)){
      $res=addNewAmmount($iid,$new);
      if($res){
        echo '<script language="javascript">';
       echo 'alert("New Ammount Succsesfully added")';
          echo '</script>';
      }
      else{
        
        echo '<script language="javascript">';
        echo 'alert("Try Again!!!")';
        echo '</script>';
      }
    }
  }

  }
 //--------------------------------------------------------
 //Adding New Catagory..........................
  elseif(isset($_POST["newCatagorySubmit"])){
    $name = $_POST["newCatagoryName"];
    $res=addCatagory($name);
    if($res){
        
      echo '<script language="javascript">';
      echo 'alert("succsessfully added")';
      echo '</script>';
    }
    else{
      
      echo '<script language="javascript">';
      echo 'alert("Try Again!!!")';
      echo '</script>';
    }

  }
  //-------------------------------------------------
  //Adding New Item----------------------------------------------------
 elseif (isset($_POST["newItemSubmit"])){
    $name= $_POST["newItemName"];
    $cid=$_POST["catagoryHolder"];
    $ammt=$_POST["newItemAmmount"];
    if(isset($cid)&&isset($name)&&isset($ammt)){
      $res=addItem($cid,$name,$ammt);
      if($res){
        
        echo '<script language="javascript">';
        echo 'alert("succsessfully added")';
        echo '</script>';
      }
      else{
        
        echo '<script language="javascript">';
        echo 'alert("Try Again!!!")';
        echo '</script>';
      }
    }
    else{
      echo "<h1 style=\"color:red;\">A Variable is Missing</h1>";
    }
    
  }

}
//---------------------------------------------------------------

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
     
    </script> 
</head>
<body>
    <?php include("./components/header.php");?>
    
      <div class="container">
       
        <form class="main-form" name="mainform" id="main-form" action="main.php" method="POST" onsubmit=" return mainValidator()">
            
            <div class="recive">
            <label>Catagory</label>
<!-- Catagory OPtions Go Here-->
        <select name="selectCatagory" required id="selectCatagory">
          <option value="" onclick="cid()" ></option>
           <?php

         $res=fetchCatagory();
         while($row=mysqli_fetch_assoc($res))
         echo"
           
           <option value={$row['id']} onclick=\"cid()\" > {$row['name']} </option>
          
            "
       
        ?> 
        </select>
<!------------------------------------>
        <label class="plus" id="catagoryPlus" onclick="addCatagoryForm()">+</label>

      
     </div>
    
        
    <div class="recive">
            <label>Item</label>
<!-------  Items option goes here------------->
        <select name="selectItem" id="selectItem" required >
        <option value="none"></option>
        
          
        </select>
        <label class="plus" id="itemPlus" onclick="addItemForm()">+</label>
    </div>

    
       
     
    <div class="recive">
        <label>Sold Ammount</label>
<input type="number" min="0" name="soldAmmount" id="soldAmmount" />    
    </div>

    <div class="recive recive2"> 
    <label >New Ammount</label>
    <input type="number" min="0" class="new-input" disabled id="newAmmount" name="newAmmount" />
    <label class="plus" id="newAmmountPlus" onclick="addNewAmmount()">+</label>
    </div>
    
    <p style="color: red;" id="result"></p>
    <input type="submit" value="submit" name="mainSubmit" />
  
</form>

<!--  Form for New Catagory  -->

    
  <form class="inner-form invisible" id="newCatagoryForm" method="post" action="main.php">
    <label>New Catagory</label>
    <div >
    <label for="name">Name</label>
    <input type="text" name="newCatagoryName" required/>
    </div>
    <input type="submit"  name="newCatagorySubmit" value="POST"/>
 
 </form>
   
  <!--  Form for New Item  -->
    
  <form class="inner-form invisible" id="newItemForm" method="post" action="main.php" onchange="itemChecker()">
    <label>New Item</label>
    <div >
    <label for="name">Name</label>
    <input type="text" name="newItemName" required/>
 </div>
    <div class="ammount" id="item'sAmmount">
    <label for="name">Ammount</label>
    <input type="number" min="0" name="newItemAmmount" required />
   </div> 
   <input type="hidden" id="hidden" name="catagoryHolder"/>
   <p id="warning" class="invisible" style="color: red;"></p>
<input type="submit" value="POST" name="newItemSubmit" id="newItemSubmit"/>
</a>
  </form>
   
  
 </div>
<?php include("./components/footer.php") ?>
 <script>
  
  function addCatagoryForm(){
    let newCatagoryForm=document.getElementById("newCatagoryForm");
    newCatagoryForm.classList.toggle("invisible");
    let plus = document.getElementById("catagoryPlus");
    if(plus.innerText==="+"){
      plus.innerText="-";
    }
    else{
      plus.innerText="+"
    }
  }
  function addItemForm(){
    let innerForm = document.getElementById("newItemForm");
   innerForm.classList.toggle("invisible");
   let plus=document.getElementById("itemPlus");
   if(plus.innerText==="+"){
    plus.innerText="-";
   }
   else{
    plus.innerText="+";
   }
  }
  function addNewAmmount(){
    let inputField=document.getElementById("newAmmount");
    if(inputField.disabled===true){
   inputField.disabled=false;
  }
  else{
    inputField.disabled=true;
  }
    let plus=document.getElementById("newAmmountPlus");
   if(plus.innerText==="+"){
    plus.innerText="-";
   }
   else{
    plus.innerText="+";
   }
  }
  function itemChecker(){
    var value = document.getElementById("selectCatagory").value;
    if((!value|| value==="none")){
      document.getElementById("newItemSubmit").disabled=true;
      document.getElementById("warning").innerText="Please Select a Catagory";
      document.getElementById("warning").classList.toggle("invisible");
    }
    else{
      document.getElementById("newItemSubmit").disabled=false;
      document.getElementById("hidden").value=value;
      document.getElementById("warning").innerText="";
      document.getElementById("warning").classList.toogle("invisible");
    }
  }
  function mainValidator(){
    console.log("main Submitted");
    let newValue = document.getElementById("newAmmount").value;
    let soldValue= document.getElementById("soldAmmount").value;
    let cid= document.getElementById("selectCatagory").value;
    let iid= document.getElementById("selectItem").value;
    if((!newValue&&!soldValue)||!cid||!iid){
      document.getElementById("result").innerText="Please Re-enter the Form Correctly";
      return false
    }
    else{
      document.mainform.submit();
    }
  }
  $(document).ready(function() { 
        $('#selectCatagory').change(function() { 
            var selectedValue = $(this).val(); 

            //new code 
            $('#selectItem').empty().append('<option value="">Choose...</option>');
            $.ajax({ 
                url: 'main.php', // URL to your PHP script 
                type: 'POST', 
                data: { value: selectedValue }, 
                cache: false,
                success: function(response) { 
                    console.log("Succsessfull");
                    //New Code
                    let options = JSON.stringify(response);
                    
                    options=JSON.parse(options);
                    
                    
                    options.forEach(option => {
                      $('#selectItem').append(`<option value="${option.value}">${option.text}</option>`);
                    });
                    
                  
                },
                error: function(xhr,status,error){
                  console.error(xhr);
                }
            }); 
        }); 
    }); 
  
  
 </script>


</body>
</html>

