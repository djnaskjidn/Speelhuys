<?php



include "./classes/database.php";
include "./classes/sets.php";

$totalitems = 0;

$delen = 10;


$pagina = 0;
$hamburger = 0;

$setss = Sets::setsLatenZienInDeIndex();
foreach ($setss as $set) {
  $totalitems = $totalitems + 1;
}

$pagina = $totalitems / $delen;

echo (round($pagina));

$hamburger = 0;

$ietss = Sets::hoi($hamburger);
foreach ($ietss as $set) {
  echo  $set->setName;

  
  echo "<br>";
}






?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Speelhuys</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <!-- icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body id="body">



  <div class="container">
    <div class="row">
      <div class="col text-center"> <!-- werkt beter voor centeren dan css gedoe -->

        <div class="d-flex flex-wrap justify-content-center gap-3">
          <?php foreach ($ietss as $set): ?>


            <a href="detail.php?id=<?= $set->setId; ?>">
              <div class="card" style="width: 18rem;">
                <img src="images/sets/<?= $set->setImage;  ?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                  <p class="card-text"><?= $set->setName; ?></p>
                </div>

              </div>
            </a>

          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>

















  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>

















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>