

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
        <label class="plus">+</label>

 
     </div>
    
        
    <div class="recive">
            <label>Item</label>
        <select>
        <option></option>
            <option>None</option>
            <option>option 2</option>
        </select>
        <label class="plus">+</label>
    </div>

    
       
     
    <div class="recive">
        <label>Sold Ammount</label>
<input type="number" min="0" />    
    </div>
    <input type="submit" value="submit" />
</form>
    
<!--  Inner Form  -->


  <form class="inner-form">
    
    <div >
    <label for="name">Name</label>
    <input type="text"/>
 </div>
    <div class="ammount">
    <label for="name">Ammount</label>
    <input type="number" min="0" />
   </div> 
<input type="submit" value="POST"/>
  </form>
 </div>
</body>
</html>

