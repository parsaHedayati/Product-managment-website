<?php
include "includes/class.autoload.inc.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style1.css">


</head>
<body>
    <header class="header">
    
    <h1>Add product</h1>
    
    
    </header>
    <hr>

    
    <main class="main-content">


<form action="includes/addproduct.inc.php" id="product_form" method="post">
<div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="sku" class="col-form-label"><span>Sku:</span></label> 
        </div>
        <div class="col-auto">
          <input type="text" id="sku" class="form-control" placeholder="sku" name="sku" required>
        </div>

    
      </div>
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="name" class="col-form-label"><span>Name:</span></label>
        </div>
        <div class="col-auto">
          <input  type="text" id="name" class="form-control" placeholder="Name" name="name" required>
        </div>
    
      </div>    
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label  for="price" class="col-form-label"><span>Price ($):</span></label>
        </div>
        
        <div class="col-auto">
        <input type="number" id="price" class="form-control" placeholder="Price" name="price" required min="0" step="0.01">

        </div>
    
      </div>
      <div class="row g-3 align-items-center">
      <div class="col-auto">
          <label for="productType" class="col-form-label"><span>Type Switcher</span></label>
        </div>
        <div class="col-auto">
        <select class="form-select form-select"  id="productType" required name="type">
        <option value="" selected>Type Switcher</option>
        <option value="disk" id="DVD">DVD</option>
        <option value="furniture" id="Furniture">Furniture</option>
        <option value="book" id="Book">Book</option>
        
        
 
    </select>
    </div>
    </div>
    <div id="additional-fields">


</div>


    </form>
    <div class="button-container">
    <button type="submit" value="Add" class="btn btn-outline-primary homebutton"  form="product_form" name="submit" aria-hidden="false">Save</button>
    <button  type="submit" value="cancle" class="btn btn-outline-danger homebutton" id="btnADD" aria-hidden="false" 
    onClick="document.location.href='index.php'" >Cancel</button>
    
</div>
    </div>
</main>
    
       <footer class="footer">
       <hr>
        <p>Inventory Management</p>
       </footer>
    
    
    
    <script src="js/inputs.js"></script>
    <script src="js/dynamic-inputvalidation.js"></script>
    <script src="js/product-type-control.js"></script>
 
    
</body>
</html>


