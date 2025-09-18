        <?php

    include "../classes/database.php";
    include "../classes/sets.php";



    $image = "";
    if (!empty($_FILES["bestand"]["name"])) {
        $image = $_FILES["bestand"]["name"];



        $target = "../images/sets/" . basename($image);


        move_uploaded_file($_FILES["bestand"]["tmp_name"], $target);
    }



        if (isset($_POST["name"])) {
            

            $newset = new Sets();
            $newset->setName = $_POST["name"];
            $newset->setDescription = $_POST["description"];
            $newset->setBrandId = (int)$_POST["Brand"];
            $newset->setThemeId = (int)$_POST["theme"];
            $newset->setImage = $image;
            $newset->setPrice = (int)$_POST["price"];
            $newset->setAge = (int)$_POST["age"];
            $newset->steentjes = (int)$_POST["steentjes"];
            $newset->setStock = (int)$_POST["Stock"];
            $newset->insert();
            
            exit;
        }
            
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
                <div class="row-g4">
                    <div class="col"></div>




                        <br>
                        <form  method="post" enctype="multipart/form-data">>
                        <a class="letters">Set naam:</a> <br />
                            <input type="text" name="name" value="" /><br />
                            <br>

                            <a class="letters">Set  omschrijving:</a> <br />
                            <input type="text" name="description" value="" /><br />
                            <br>

                            <a class="letters">Set merk</a> <br />
                            <input type="text" name="Brand" value="" /><br />
                            <br>

                            <a class="letters">Thema:</a> <br />
                            <input type="text" name="theme" value="" /><br />
                            <br>
                            <label for="bestand">
                                Bestand:
                            </label>
                            <br />
                            <input type="file" id="bestand" name="bestand">
                            <br><br />

                            <?php if (!empty($sets->image)) { ?>
                                <img src="../images/sets/<?= $sets->image; ?>" alt="Afbeelding" style="max-width: 200px;">
                            <?php } ?>
                            <br>
                                            <a class="letters">Set prijs:</a> <br />
                            <input type="text" name="price" value="" /><br />
                            <br>
                                            <a class="letters">Set Leeftijd:</a> <br />
                            <input type="text" name="age" value="" /><br />
                            <br>
                                            <a class="letters">Set steentjes</a> <br />
                            <input type="text" name="steentjes" value="" /><br />
                            <br>
                                            <a class="letters">Inventaris:</a> <br />
                            <input type="text" name="Stock" value="" /><br />
                            <br>

                        <button type="submit" name="submit" value="doen" id="liveToastBtn" class="btn btn-primary">Verzenden</button>
                        </form>







                    </div>

                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        </body>

        </html>