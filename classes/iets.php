<?php

include "database.php";
include "sets.php";

$setss = Sets::setsLatenZienInDeIndex();




foreach ($setss as $set)
{
    echo  $set->setId;
    echo  $set->setName;
    //echo $set->setDescription;
    echo $set->setThemeId;
    echo "<br>";
}






?>