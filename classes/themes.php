<?php
class Themes 
{
 public int $theme_id;
  public string $theme_name;
  

 public static function themeslatenzien($Mo)
  { 
    $conn = Database::start() ; 
    $query = "select * from themes WHERE theme_id = $Mo"; 
    $resultaat = $conn->query($query); 
    $theme = null; 
    
    
    
     while ($row = $resultaat->fetch_assoc()) 
     { 
      $theme = new Themes ();
      $theme-> theme_id = $row ['theme_id'];
      $theme-> theme_name = $row ['theme_name'];
       
       
     }

      $conn->close();
      
      return $theme; 
    }  
  }
     




?>