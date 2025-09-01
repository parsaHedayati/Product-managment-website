<?php
include "includes/class.autoload.inc.php";

$productDisplay = new ProductView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles/styles.css">
    
</head>
<body>
<form id="delete-form" method="post">
    <header>
        <h1>Product list</h1>
        <div class="button-container">
            <input type="button" value="ADD" class="btn btn-outline-primary homebutton" id="btnADD" aria-hidden="false" 
                   onClick="document.location.href='productadd.php'" />
            <button type="submit" class="btn btn-outline-danger" aria-hidden="false" id="delete-product-btn">DELETE</button>
        </div>
    </header>
    <hr>
    <section class="main container-fluid">
        <?php $productDisplay->displayProducts(); ?>
    </section>
</form>

       <footer class="footer">
       <hr>
        <p>Inventory Management</p>
       </footer>
       <script src="js/product-delet.js"></script>
</body>
</html>

