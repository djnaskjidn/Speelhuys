<?php
 
class Brands 
{
    public int $brand_id;
    public string $brand_name;
    public string $brand_logo;

    public static function brandsLatenZienInDeIndex()
    {
        $conn = Database::start();

        $query = "SELECT * FROM brands";
        $resultaat = $conn->query($query);

        $brandss = [];

        if ($resultaat->num_rows > 0) 
        {
            while ($row = $resultaat->fetch_assoc()) 
            {
                $brand = new Brands();

                $brand->brand_id = $row['brand_id'];
                $brand->brand_name = $row['brand_name'];
                $brand->brand_logo = $row['brand_logo'];

                $brandss[] = $brand;
            }
        }

        $conn->close(); 

        return $brandss;
    }


 public static function ideetjepakken($ideetje)
    {
        $conn = Database::start();

        $query = "SELECT * FROM brands WHERE brand_id = $ideetje";
        $resultaat = $conn->query($query);

        $brand = null;

        if ($resultaat->num_rows > 0) 
        {
            while ($row = $resultaat->fetch_assoc()) 
            {
                $brand = new Brands();

                $brand->brand_id = $row['brand_id'];
                $brand->brand_name = $row['brand_name'];
                $brand->brand_logo = $row['brand_logo'];

                
            }
        }

        $conn->close(); 

        return $brand;
    }


  public function aanpas($hoi) // update de blog of niet licht er aan of de gebruiker dat heeft gedaan
        {
            $conn = Database::start(); // start de database
    
            $id = mysqli_real_escape_string($conn, $hoi); // veiligheid
            $name = mysqli_real_escape_string($conn, $this->brandname); // veiligheid
            $logo = mysqli_real_escape_string($conn, $this->brandlogo);// veiligheid

    
    
            $sql = "
            UPDATE 
                brands 
            brand
                 brand_name = '" . $name . "', 
                brand_id  = '" . $id . "',
                brand_logo = '"$logo . "'
            
            WHERE 
                brand_id = " . $id . "
            ";
    
    
            $conn->query($sql);// sluit de verbinding
    
            $conn->close();
        }
















}
?>
