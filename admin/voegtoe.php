<?php



include "./classes/database.php";
include "./classes/product.php";



/*
if (isset($_POST["name"])) {
    

    $newproduct = new Product();
    $newproduct->name = $_POST["name"];
    $newproduct->category = $_POST["category"];
    $newproduct->price = $_POST["price"];
    $newproduct->instock = $_POST["stock"];
    $newproduct->insert();
    header("Location: products.php?message=Item is toegevoegd");
    exit;
}
    */
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>


    <div class="container">
        <div class="row-g4">
            <div class="col"></div>


            <div class="col-md-12">
                <nav id="navbar" class="navbar">
                    <div class="container-fluid">


                        <a class="link" href="index.php">Klanten <i class="bi bi-person"></i></a>
                        <a class="link" href="invoice.php">Factuuren <i class="bi bi-receipt"></i></a>
                        <a class="link" href="orders.php">Orders <i class="bi bi-box-seam"></i></a>
                        <a class="link" href="products.php">producten <i class="bi bi-archive"></i></a>
                    </div>
                </nav>


                <br>
                <form  method="post">
                <a class="letters">Product naam:</a> <br />
                    <input type="text" name="name" value="" /><br />
                    <br>

                    <a class="letters">Product category:</a> <br />
                    <input type="text" name="category" value="" /><br />
                    <br>

                    <a class="letters">Product prijs:</a> <br />
                    <input type="text" name="price" value="" /><br />
                    <br>

                    <a class="letters">Product instock:</a> <br />
                    <input type="text" name="stock" value="" /><br />
                    <br>

                <button type="submit" name="submit" value="doen" id="liveToastBtn" class="btn btn-primary">Verzenden</button>
                </form>







            </div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>