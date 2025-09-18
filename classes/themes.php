<?php
class Themes 
{
 public int $theme_id;
  public string $theme_name;
  


  public static function allethemeslatenzien()
  {
      $conn = Database::start();

      $query = "SELECT * FROM themes";
      $resultaat = $conn->query($query);

      $themess = [];

      if ($resultaat->num_rows > 0) 
      {
          while ($row = $resultaat->fetch_assoc()) 
          {
              
              $theme = new Themes ();
              $theme-> theme_id = $row ['theme_id'];
              $theme-> theme_name = $row ['theme_name'];

              $themess[] = $theme;
          }
      }

      $conn->close(); 

      return $themess;
  }

 public static function themeslatenzien($Mo)
  { 
    $conn = Database::start() ; 
    $query = "select * from themes WHERE theme_id = $Mo"; 
    $resultaat = $conn->query($query); 
    $theme = null; 
    
    
    
     while ($row = $resultaat->fetch_assoc()) 
     { 
      $theme = new Themes ();
      $theme->theme_id = $row ['theme_id'];
      $theme->theme_name = $row ['theme_name'];
       
       
     }

        $conn->close();
        return $theme; 
    }  

    public function aanpas($hoi)
    {
        $conn = Database::start(); 
        $id = mysqli_real_escape_string($conn, $hoi); 
        $name = mysqli_real_escape_string($conn, $this->theme_name);  


        $sql = "
            UPDATE
                themes
            SET
                theme_name = '" . $name . "'  
            WHERE
                theme_id = " . $id . "
        ";
        $conn->query($sql);
        $conn->close();
    }

    public function doei($id) // deze zorgt dat de blog permanent verwijderd word 👍
    {
        $conn = Database::start(); // start de database

        $sql = "

        DELETE FROM 
        themes
        WHERE 
            theme_id = " . $id . "
            
        ";


        $conn->query($sql);// sluit de verbinding

        $conn->close();
    
    
    }

    public function insert() 
    {


        $conn = Database::start(); // start de database

        $name = mysqli_real_escape_string($conn, $this->theme_name); // veiligheid


        $sql = "INSERT INTO themes
            (
                theme_name

            ) VALUES 
            (
                '" . $name . "'
            )";


        $conn->query($sql);// sluit de verbinding

        $conn->close();
    }
    
}




?>