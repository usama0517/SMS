

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
    
        <form class="main-form">
            <div class="cntr">
            <div class="recive">
            <label>Catagory</label>
        <select>
        <option></option>
            <option>None</option>
            <option>option 2</option>
        </select>
        <label class="plus">+</label>
         
     </div>
     <!--The Form Bellow is to recive the name of new Catagory -->
     <form class="inner-form">
            <label>Name</label>
            <input type="text"/>
            <input type="submit" value="Post"/>
         </form>
        </div>
        <div class="cntr">
    <div class="recive">
            <label>Item</label>
        <select>
        <option></option>
            <option>None</option>
            <option>option 2</option>
        </select>
        <label class="plus">+</label>
    </div>

    <!--The Form Bellow is to recive the name of new Catagory -->
    <form class="inner-form">
        <div>
            <label>Name</label>
            <input type="text"/>
        </div>
        <div>
            <label>Ammount</label>
            <input type="number"/>
        
            <input type="submit" value="Post"/>
        </div>
         </form>
        </div>
     
    <div class="recive">
        <label>Sold Ammount</label>
<input type="number"/>    
    </div>
</form>
    
</body>
</html>

