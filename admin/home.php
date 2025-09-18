<?php

include "../classes/database.php";








?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Speelhuys</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" href="./css/style.css">
  </head>
  <body id="body">
  <?php if(isset($_GET["message"]))
{ ?>

    <div class="alert alert-success" role="alert">
        <?= $_GET["message"]; ?>
    </div>
    <?php
}?>

 

<div class="container">
<div class="row">
<br><p></p><br>
  <div class="col-4"></div>
  <div class="col-4">


  <div class="d-grid gap-3">
  <p class="text-center">hoi</p>
  <a href="setsadmin.php">
    <button class="btn btn-primary btn-lg w-100" type="button">Sets</button>
  </a>
  <a href="themeadmin.php">
    <button class="btn btn-primary btn-lg w-100" type="button">Themes</button>
  </a>
  <a href="brandadmin.php">
    <button class="btn btn-primary btn-lg w-100" type="button">Brands</button>
  </a>
</div>

  </div>
</div>


</div>

 
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>