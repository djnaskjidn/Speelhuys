<?php


include "../classes/database.php";
include "../classes/brands.php";
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


$brandss = Brands::brandsLatenZienInDeIndex();


$nummer = 0;


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
            <a class="navbar-brand" href="voegbrand.php">Voeg toe</a>
            <a class="navbar-brand" href="home.php">Home</a>



            <div class="d-flex">
                <a href="index.php" class="btn btn-outline-light" type="submit">Logout <i class="bi bi-box-arrow-right"></i></a>







            </div>
        </div>  

</nav>

<div class="container my-4">
        <div class="row g-3">
            <?php foreach ($brandss as $brands) : ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($brands->brand_name) ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                Theme id: <?= htmlspecialchars($brands->brand_id) ?>
                            </h6>
                            <p class="card-text">
                                <?= "Theme " . (++$nummer) ?>
                            </p>
                            <a href="./bewerk/bewerkbrand.php?id=<?= $brands->brand_id ?>" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> Bewerken
                            </a>
                            <a href="./groetjes/groetjesBrand.php?id=<?= $brands->brand_id ?>" class="btn btn-sm btn-primary">
                                <i class="bi bi-trash"></i> verwijderen
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>