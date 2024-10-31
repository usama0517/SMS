

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
    <?php include("./components/header.php");?>
    
      <div class="container">
        <form class="main-form">
            
            <div class="recive">
            <label>Catagory</label>
        <select>
        <option></option>
            <option>None</option>
            <option>option 2</option>
        </select>
        <label class="plus" id="catagoryPlus" onclick="addCatagoryForm()">+</label>

 
     </div>
    
        
    <div class="recive">
            <label>Item</label>
        <select>
        <option></option>
            <option>None</option>
            <option>option 2</option>
        </select>
        <label class="plus" id="itemPlus" onclick="addItemForm()">+</label>
    </div>

    
       
     
    <div class="recive">
        <label>Sold Ammount</label>
<input type="number" min="0" />    
    </div>

    <div class="recive recive2"> 
    <label >New Ammount</label>
    <input type="number" min="0" class="new-input" disabled id="newAmmount" />
    <label class="plus" id="newAmmountPlus" onclick="addNewAmmount()">+</label>
    </div>
    
    <input type="submit" value="submit" />
</form>
    
<!--  Form for New Catagory  -->


  <form class="inner-form invisible" id="newCatagoryForm">
    <label>New Catagory</label>
    <div >
    <label for="name">Name</label>
    <input type="text"/>
    </div>
<input type="submit" value="POST"/>
  </form>
  <!--  Form for New Item  -->
  <form class="inner-form invisible" id="newItemForm">
    <label>New Item</label>
    <div >
    <label for="name">Name</label>
    <input type="text"/>
 </div>
    <div class="ammount" id="item'sAmmount">
    <label for="name">Ammount</label>
    <input type="number" min="0" />
   </div> 
<input type="submit" value="POST"/>
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
  
 </script>
</body>
</html>

