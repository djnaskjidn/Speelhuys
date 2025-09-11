<?php

include "./classes/database.php";
include "./classes/sets.php";
include "./classes/brands.php";
include "./classes/themes.php";



$hoi = $_GET["id"];


$setje = Sets::hallo($hoi);


echo $hoi;


$brand = Brands::ideetjepakken($setje->setBrandId);



echo $setje->setBrandId;
$Mo = $setje->setThemeId;
if (!$Mo)
  {
    $Mo = 0;
  }    
  else
  {
$themes = Themes::themeslatenzien($Mo);
  }










?>







<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body id="body">

  <div class="container">
    <div class="row">
      <div class="col-5">

        <div class="card" style="width: 18rem;">


          <img src="images/sets/<?= $setje->setImage;  ?>" class="card-img-top" style="max-width: 500px;">

          <div class="card-body">
            <p class="card-text"><?= $setje->setName; ?></p>
            
          </div>

        </div>

      </div>



      <div class="col-5">

      



       <h1> <?= "Merk: " . $brand->brand_name; ?> </h1>
       <h2> <?php if ($Mo == 0)
       {
        echo "Geen thema";
       } 
       else
       {
        echo "Theme: " .  $themes->theme_name; 
       }
       


       ?> </h2>
<p> <?=  $setje->setDescription;  ?>  </p>
<p> Prijs:  &euro; <?= $setje->setPrice;  ?> </p>
<p> Aantal steentjes: <?= $setje->steentjes;  ?> </p>
<p> Leeftijd: vanaf <?= $setje->setAge;  ?> jaar </p>
<p> Op voorraad: <?= $setje->setStock;  ?> </p>

      </div>

    </div>
  </div>








  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>