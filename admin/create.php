<?php


include "../classes/sessie.php";

include "../classes/gebruiker.php";
include "../classes/database.php";

$username = $_POST["naam"];
$password = $_POST["ww"];





$gebruikertje = User::allUsers($username, $password);


if ($gebruikertje != null) {

    $sessie = new Sessie();

    $key = md5(uniqid(rand(), true));


    $sessie->userId = $gebruikertje->userId; //id van gebruiker
    $sessie->key = $key;
    $sessie->start = date("Y-m-d H:i:s");
    $sessie->end = date("Y-m-d H:i:s", strtotime("+1 month"));
    $sessie->insert();


    //koekjes

    setcookie("steptember-session", $key, strtotime("+1 month"), "/");
} else {
   
    echo 'Incorrect  <a href="index.php">klik hier</a> om terug te gaan naar inlog.';
    exit;
}



// sleutel aanmaken :)



// hoi




header("Location: home.php");
exit();


?>