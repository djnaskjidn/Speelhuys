<?php


include "../classes/database.php";
include "../classes/sets.php";
include "../classes/sessie.php";


$sessie = Sessie::vindActieveSessie();
if ($sessie == null) {
    header("location: index.php");
    exit;
}
$user_id = $sessie->userId;




if (isset($_GET["id"])) {
    $geenIdee = $_GET["id"];
} else {
    $geenIdee = 1;
}




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




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    
    <nav class="navbar bg-primary" data-bs-theme="dark">        
        <div class="container-fluid">
            <a class="navbar-brand" href="setsadmin.php">Sets</a>
            <a class="navbar-brand" href="themeadmin.php">Themes</a>
            <a class="navbar-brand" href="brandadmin.php">Brands</a>
            <a class="navbar-brand" href="voegtoesets.php">Voeg toe</a>
            <a class="navbar-brand" href="index.php">Home</a>



            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-light" type="submit">Logout <i class="bi bi-box-arrow-right"></i></a>







            </div>
        </div>  

</nav>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <?php foreach ($ietss as $set): ?>


                        <a href="detail.php?id=<?= $set->setId; ?>">
                            <div class="card h-100 d-flex flex-column" style="width: 18rem;">
                                <img src="../images/sets/<?= $set->setImage; ?>" alt="geen foto" onerror="this.src='../images/sets/stock.ong'; class=" card-img-top img-fluid" style="max-height: 250px; object-fit: cover;">

                                <div id="card-body" class="card-body d-flex flex-column">
                                    <p id="card-text" class="card-text flex-grow-1"><?= $set->setName; ?></p>
                                    <p id="card-text" class="card-text flex-grow-1">€<?= $set->setPrice; ?></p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="./bewerk/bewerksets.php?id=<?= $set->setId; ?>">Bewerken</a> <a href="./bewerk/bewerksets.php?id=<?= $set->setId; ?>"> <i class="bi bi-pencil"></i></a></li>
                                        <li class="list-group-item"> <a href="./groetjes/groetjesSets.php?id=<?= $set->setId; ?>">Verwijder</a> <a href="./groetjes/groetjesSets.php?id=<?= $set->setId; ?>"> <i class="bi bi-trash"></i></a></li>

                                    </ul>
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

                    <li class="page-item"><a class="page-link" href="setsadmin.php?id=<?= $i; ?>"><?php echo $i; ?> </a></li>

                <?php endfor ?>


                </li>
            </ul>
        </nav>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>