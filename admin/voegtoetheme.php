        <?php

    include "../classes/database.php";
    include "../classes/themes.php";






        if (isset($_POST["name"])) {
            

            $newtheme = new Themes();
            $newtheme->theme_name = $_POST["name"];
            $newtheme->insert();
            
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


            <div class="container">
                <div class="row-g4">
                    <div class="col"></div>




                        <br>
                        <form  method="post" enctype="multipart/form-data">>
                        <a class="letters">Set naam:</a> <br />
                            <input type="text" name="name" value="" /><br />
                            <br>


                            

                        <button type="submit" name="submit" value="doen" id="liveToastBtn" class="btn btn-primary">Verzenden</button>
                        </form>







                    </div>

                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        </body>

        </html>