<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RichTextEditor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery-te-1.4.0.css">
</head>

    <?php



include "C:/xampp/htdocs/Speelhuys/classes/database.php";
include "C:/xampp/htdocs/Speelhuys/classes/sets.php";
include "C:/xampp/htdocs/Speelhuys/classes/gebruiker.php";
include "C:/xampp/htdocs/Speelhuys/classes/sessie.php";


$sessie = Sessie::vindActieveSessie();
if ($sessie == null) {
    header("location: index.php");
    exit;
}
$user_id = $sessie->userId;


$gebruikertje = User::zoekIdeeeee($user_id);

if ($gebruikertje->role == "employee")
{
    header("location: ../home.php?message= JIJ hebt GEEN toegang");  
}
else
{

}





    $hoi = $_GET["id"];
    $set = Sets::hallo($hoi);

    



    if ($hoi == null) {
        header("Location: ./home.php");
        exit;
    }
    






?>

        <div class="container">
            <div class="row">
                <div class="col text-center">
                <nav class="navbar bg-danger">
                    <div class="container-fluid">


                        <a href="../index.php"><button type="button" class="btn btn-warning" id="adminzooi">Homepage</button></a> <a></a><a href="insert.php"><button type="button" class="btn btn-warning" id="adminzooi">Voeg blog toe</button></a> <a></a><a href="admin.php"><button type="button" class="btn btn-warning" id="adminzooi">Admin</button></a>
                        </a>
                    </div>
                </nav>
                <br>    
            <br>    

                <p>Verwijdered uit DB :D</p>
                <a href="admin.php"><button type="button" class="btn btn-outline-danger btn-lg">Keer terug</button></a>

                </div>

            </div>

        </div>






   


        </form>


    </tr>
    



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

<?php
$id =0;
$id = $set->setId;

if(!$set)
{

}
else
{
$set->doei($id); // verwijderd
header("location: ../home.php?message= verwijderd denk ik");
}

?>
