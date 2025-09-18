<?php


if (isset($_GET["id"])) {
  $geenIdee = $_GET["id"];
} else {
  $geenIdee = 1;
}


include "./classes/database.php";
include "./classes/sets.php";
include "./classes/brands.php";
include "./classes/themes.php";

$totalitems = 0;

$delen = 10;


$pagina = 0;
$hamburger = 0;

$setss = Sets::setsLatenZienInDeIndex();
foreach ($setss as $set) {
  $totalitems = $totalitems + 1;
}

$pagina = $totalitems / $delen;




if ($geenIdee == 1) {
  $hamburger = 0;
} else {
  $hamburger = $geenIdee * 10 - 10;
}



$ietss = Sets::hoi($hamburger);

$brands = Brands::brandsLatenZienInDeIndex();
$themes = Themes::allethemeslatenzien();
$sets = Sets::setsLatenZienInDeIndex();

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
  <!-- offcanvas filter tab -->
  <!-- prijs slider moet nog toegevoegd worden + links/hrefs naar de juiste pagina's -->

  <a id="button" class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    Filter producten
  </a>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="select">Selecteer jouw keuzen</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <!-- brands -->
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Merken
      </button>
      <ul class="dropdown-menu">
        <?php foreach ($brands as $brand) { ?>
          <li><a class="dropdown-item" href="index.php?id=<?= $brand->brand_name?>"> <?= $brand_name; ?></a></li>
        <?php } ?>
      </ul>
    </div>

    <!-- themes -->
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Thema's
      </button>
      <ul class="dropdown-menu">
        <?php foreach ($themes as $theme) { ?>
          <li><a class="dropdown-item" href="index.php?id=<?= $theme->theme_id ?>"> <?= $theme->theme_name; ?></a></li>
        <?php } ?>
      </ul>
    </div>

    <!-- sets -->
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Sets
      </button>
      <ul class="dropdown-menu">
        <?php foreach ($sets as $set) { ?>
          <li><a class="dropdown-item" href="index.php?id=<?= $set->setBrandId ?>"> <?= $set->setName; ?></a></li>
        <?php } ?>
      </ul>
    </div>

    <!-- age -->
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Leeftijd
      </button>
      <ul class="dropdown-menu">
         <li><a class="dropdown-item" href="index.php?id=<?= $set->setAge ?>">0 - 3</a></li>
        <li><a class="dropdown-item" href="index.php?id=<?= $set->setAge ?>">3 - 6</a></li>
        <li><a class="dropdown-item" href="index.php?id=<?= $set->setAge ?>">6 - 8</a></li>
      </ul>
    </div>

    <!-- bricks -->
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Steentjes
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="index.php?id=<?= $set->steentjes ?>">0 - 100</a></li>
        <li><a class="dropdown-item" href="index.php?id=<?= $set->steentjes ?>">100 - 500</a></li>
        <li><a class="dropdown-item" href="index.php?id=<?= $set->steentjes ?>">500 - 1000</a></li>
        <li><a class="dropdown-item" href="index.php?id=<?= $set->steentjes ?>">1000+</a></li>

      </ul>
    </div>

  </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col text-center"> <!-- werkt beter voor centeren dan css gedoe -->

        <div class="d-flex flex-wrap justify-content-center gap-3">
          <?php foreach ($ietss as $set): ?>


            <a href="detail.php?id=<?= $set->setId; ?>">
              <div class="card h-100 d-flex flex-column" style="width: 18rem;">
                <img src="images/sets/<?= $set->setImage; ?>" alt="geen foto" onerror="this.src='./images/sets/stock.ong'; class=" card-img-top img-fluid" style="max-height: 250px; object-fit: cover;">

                <div id="card-body" class="card-body d-flex flex-column">
                  <p id="card-text" class="card-text flex-grow-1"><?= $set->setName; ?></p>
                  <p id="card-text" class="card-text flex-grow-1">€<?= $set->setPrice; ?></p>
                </div>
              </div>
            </a>

          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
















  <div class="row">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">


        <?php
        for ($i = 1; $i <= round($pagina); $i++) : ?>

          <li class="page-item"><a class="page-link" href="index.php?id=<?= $i; ?>"><?php echo $i; ?> </a></li>

        <?php endfor ?>


        </li>
      </ul>
    </nav>
  </div>
















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>