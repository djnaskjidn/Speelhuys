<?php


include "../classes/database.php";
include "../classes/themes.php";
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


$themess = Themes::allethemeslatenzien();


$nummer = 0;


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Themes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


 
    <nav class="navbar bg-primary" data-bs-theme="dark">        
        <div class="container-fluid">
            <a class="navbar-brand" href="setsadmin.php">Sets</a>
            <a class="navbar-brand" href="themeadmin.php">Themes</a>
            <a class="navbar-brand" href="brandadmin.php">Brands</a>
            <a class="navbar-brand" href="voegtoetheme.php">Voeg toe</a>
            <a class="navbar-brand" href="index.php">Home</a>



            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-light" type="submit">Logout <i class="bi bi-box-arrow-right"></i></a>







            </div>
        </div>  

</nav>



    <div class="container my-4">
        <div class="row g-3">
            <?php foreach ($themess as $themes) : ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($themes->theme_name) ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                Theme id: <?= htmlspecialchars($themes->theme_id) ?>
                            </h6>
                            <p class="card-text">
                                <?= "Theme " . (++$nummer) ?>
                            </p>
                            <a href="./bewerk/bewerkthemes.php?id=<?= $themes->theme_id ?>" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i> Bewerken
                            </a>
                            <a href="./groetjes/groetjesThemes.php?id=<?= $themes->theme_id ?>" class="btn btn-sm btn-primary">
                                <i class="bi bi-trash"></i> verwijderen
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>