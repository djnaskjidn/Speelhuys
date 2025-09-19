<?php
  
  

if (isset($_GET["id"])) {
  $geenIdee = $_GET["id"];
} else {
  $geenIdee = 1;
}


include "./classes/database.php";
include "./classes/brands.php";
include "./classes/sets.php";
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

// afronden om merk filter te laten werken.

//brand filter gedoe
if (isset($_GET["brandid"])) {
    $ja = $_GET["brandid"];

    $sets = Sets::wel($hamburger, $ja);
    if (!$sets)
    {
        $ventilator = false;
    }
    else
    {
        $ventilator = true;
    }
    
  } else {
    //niks
  }

  //theme
  if (isset($_GET["themeid"])) {
    $kaas = $_GET["themeid"];

    $sets = Sets::wel($hamburger, $kaas);
    if (!$sets)
    {
        $ventilator = false;
    }
    else
    {
        $ventilator = true;
    }
    
  } else {
    //niks
  }


  //leeftijd
  if (isset($_GET["lf"])) {
    $kaas = $_GET["lf"];

    $sets = Sets::leeftijd($hamburger, $kaas);
    if (!$sets)
    {
        $ventilator = false;
    }
    else
    {
        $ventilator = true;
    }
    
  } else {
    //niks
  }

/// steentjes
  if (isset($_GET["steentjes"])) {
    $steen = $_GET["steentjes"];
    
    $sets = Sets::steen($hamburger, $steen);

    if (!$sets)
    {
        $ventilator = false;
    }
    else
    {
        $ventilator = true;
    }
    
  } else {
    //niks
  }


















$ietss = Sets::hoi($hamburger);

$brands = Brands::brandsLatenZienInDeIndex();
$themes = Themes::allethemeslatenzien();


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

  <!-- Top button -->
  <div class="container my-3">
    <div class="row">
      <div class="col text-center">
        <div class="d-grid gap-3">
          <p>hoi</p>
          <a href="index.php" class="btn btn-primary btn-lg w-100">Keer terug naar overzicht</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Filter offcanvas -->
  <div class="container mb-3">
    <div class="row">
      <div class="col text-center">
        <a id="button" class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
          Filter producten
        </a>
      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="select">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Selecteer jouw keuzen</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <!-- Brands -->
      <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">Merken</button>
        <ul class="dropdown-menu w-100">
          <?php foreach ($brands as $brand): ?>
            <li><a class="dropdown-item" href="filter.php?brandid=<?= $brand->brand_id ?>"><?= $brand->brand_name ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Themes -->
      <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">Thema's</button>
        <ul class="dropdown-menu w-100">
          <?php foreach ($themes as $theme): ?>
            <li><a class="dropdown-item" href="filter.php?themeid=<?= $theme->theme_id ?>"><?= $theme->theme_name ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Sets -->
      <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">Sets</button>
        <ul class="dropdown-menu w-100">
          <?php foreach ($sets as $set): ?>
            <li><a class="dropdown-item" href="index.php?id=<?= $set->setBrandId ?>"><?= $set->setName ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Leeftijd -->
      <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">Leeftijd</button>
        <ul class="dropdown-menu w-100">
          <li><a class="dropdown-item" href="filter.php?lf=3">Tot 3</a></li>
          <li><a class="dropdown-item" href="filter.php?lf=6">Tot 6</a></li>
          <li><a class="dropdown-item" href="filter.php?lf=8">Tot 8</a></li>
          <li><a class="dropdown-item" href="filter.php?lf=99">9+</a></li>
        </ul>
      </div>

      <!-- Steentjes -->
      <div class="dropdown mb-3">
        <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown">Steentjes</button>
        <ul class="dropdown-menu w-100">
          <li><a class="dropdown-item" href="filter.php?steentjes=100">Tot 100</a></li>
          <li><a class="dropdown-item" href="filter.php?steentjes=500">Tot 500</a></li>
          <li><a class="dropdown-item" href="filter.php?steentjes=1000">Tot 1000</a></li>
          <li><a class="dropdown-item" href="filter.php?steentjes=99999999999967">1000+</a></li>
        </ul>
      </div>

    </div>
  </div>

  <!-- Sets cards -->
  <div class="container my-4">
    <div class="row justify-content-center">
      <?php if ($ventilator): ?>
        <?php foreach ($sets as $set): ?>
          <div class="col-md-3 col-sm-6 mb-4 d-flex">
            <a href="detail.php?id=<?= $set->setId ?>" class="w-100">
              <div class="card h-100 d-flex flex-column">
                <img src="images/sets/<?= $set->setImage ?>" class="card-img-top img-fluid" alt="geen foto" style="max-height: 250px; object-fit: cover;" onerror="this.src='./images/sets/stock.ong';">
                <div class="card-body d-flex flex-column">
                  <p class="card-text flex-grow-1"><?= $set->setName ?></p>
                  <p class="card-text flex-grow-1">€<?= $set->setPrice ?></p>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col text-center">
          <h1>Niet gevonden</h1>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Pagination -->
  <div class="container mb-4">
    <div class="row">
      <div class="col">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= round($pagina); $i++): ?>
              <li class="page-item"><a class="page-link" href="index.php?id=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>


</html>