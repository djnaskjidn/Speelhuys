<?php


class Sets
{

    public int $setId;
    public string $setName; 
    public string $setDescription;
    public float $setBrandId;
    public ?float $setThemeId;
    public string $setImage;
    public int $setPrice;
    public int $setAge;
    public int $steentjes;
    public int $setStock;





    public static function setsLatenZienInDeIndex()
    {
        
        $conn = Database::start();
        // voorbeeld
        $query = "SELECT * FROM sets ";
        $resultaat = $conn->query($query);

        $setss =[];

        if ($resultaat->num_rows > 0) 
        {
            while ($row = $resultaat->fetch_assoc()) 
            {
                $set = new Sets();

                $set->setId = $row['set_id'];
                $set->setName = $row['set_name'];
                $set->setDescription = $row['set_description'];
                $set->setBrandId = $row['set_brand_id'];
                $set->setThemeId = $row['set_theme_id'];
                $set->setImage = $row['set_image'];
                $set->setPrice = $row['set_price'];
                $set->setAge = $row['set_age'];
                $set->steentjes = $row['set_pieces'];
                $set->setStock = $row['set_stock'];
                
                $setss[] = $set;
            }
            $conn->close(); // sluit de verbinding

            return $setss;
        }




    }







    

    public static function hoi($hamburger)
    {
        
        $conn = Database::start();

        // voorbeeld
        $query = "SELECT * FROM sets LIMIT 10 OFFSET $hamburger";
        $resultaat = $conn->query($query);

        $setss =[];

        if ($resultaat->num_rows > 0) 
        {
            while ($row = $resultaat->fetch_assoc()) 
            {
                $set = new Sets();

                $set->setId = $row['set_id'];
                $set->setName = $row['set_name'];
                $set->setDescription = $row['set_description'];
                $set->setBrandId = $row['set_brand_id'];
                $set->setThemeId = $row['set_theme_id'];
                $set->setImage = $row['set_image'];
                $set->setPrice = $row['set_price'];
                $set->setAge = $row['set_age'];
                $set->steentjes = $row['set_pieces'];
                $set->setStock = $row['set_stock'];
                
                $setss[] = $set;
            }
            $conn->close(); // sluit de verbinding

            return $setss;
        }




    }


    public static function hallo($hoi)
    {
        $conn = Database::start();

        $query = "SELECT * FROM sets WHERE set_id = $hoi";
        $resultaat = $conn->query($query);

        $set = null;

        while ($row = $resultaat->fetch_assoc()) 
            {
                $set = new Sets();

                $set->setId = $row["set_id"];
                $set->setName = $row['set_name'];
                $set->setDescription = $row['set_description'];
                $set->setBrandId = $row['set_brand_id'];
                $set->setThemeId = $row['set_theme_id'];
                $set->setImage = $row['set_image'];
                $set->setPrice = $row['set_price'];
                $set->setAge = $row['set_age'];
                $set->steentjes = $row['set_pieces'];
                $set->setStock = $row['set_stock'];


                $conn->close(); // sluit de verbinding

                return $set;
                
            }


    
    
        }

        public function insert() 
        {
    
    
            $conn = Database::start(); // start de database
    
            $name = mysqli_real_escape_string($conn, $this->setName); // veiligheid
            $description = mysqli_real_escape_string($conn, $this->setDescription);// veiligheid
            $Brand = mysqli_real_escape_string($conn, $this->setBrandId);// veiligheid
            $theme = mysqli_real_escape_string($conn, $this->setThemeId);// veiligheid
            $image = mysqli_real_escape_string($conn, $this->setImage);// veiligheid
            $price = mysqli_real_escape_string($conn, $this->setPrice);// veiligheid
            $age = mysqli_real_escape_string($conn, $this->setAge);// veiligheid
            $steen = mysqli_real_escape_string($conn, $this->steentjes);// veiligheid
            $stock = mysqli_real_escape_string($conn, $this->setStock);// veiligheid
    
            $sql = "INSERT INTO sets
                (
                    set_name,
                    set_description,
                    set_brand_id,
                    set_theme_id,
                    set_image,
                    set_price,
                    set_age,
                    set_pieces,
                    set_stock

    
        
        
        
        
                ) VALUES 
                (
                    '" . $name . "',
                    '" . $description . "',
                    '" . $Brand . "',
                    '" . $theme . "',
                    '" . $image . "',
                    '" . $price . "',
                    '" . $age . "',
                    '" . $steen . "',
                    '" . $stock . "'
        
                )";
    
    
            $conn->query($sql);// sluit de verbinding
    
            $conn->close();
        }


        public function aanpas($hoi) // update de blog of niet licht er aan of de gebruiker dat heeft gedaan
        {
            $conn = Database::start(); // start de database
    
            $id = mysqli_real_escape_string($conn, $hoi); // veiligheid
            $name = mysqli_real_escape_string($conn, $this->setName); // veiligheid
            $description = mysqli_real_escape_string($conn, $this->setDescription);// veiligheid
            $Brand = mysqli_real_escape_string($conn, $this->setBrandId);// veiligheid
            $theme = mysqli_real_escape_string($conn, $this->setThemeId);// veiligheid
            $image = mysqli_real_escape_string($conn, $this->setImage);// veiligheid
            $price = mysqli_real_escape_string($conn, $this->setPrice);// veiligheid
            $age = mysqli_real_escape_string($conn, $this->setAge);// veiligheid
            $steen = mysqli_real_escape_string($conn, $this->steentjes);// veiligheid
            $stock = mysqli_real_escape_string($conn, $this->setStock);// veiligheid
    
    
            $sql = "
            UPDATE 
                sets 
            SET 
                set_name = '" . $name . "', 
                set_description = '" . $description . "',
                set_brand_id = '". $Brand ."',
                set_theme_id = '".$theme . "',
                set_image = '" . $image . "',
                set_price = '".$price."',
                set_age = '". $age."',
                set_pieces = '".$steen."',
                set_stock = '".$stock."'
            
            WHERE 
                set_id = " . $id . "
            ";
    
    
            $conn->query($sql);// sluit de verbinding
    
            $conn->close();
        }






        public function doei($id) // deze zorgt dat de blog permanent verwijderd word 👍
    {
        $conn = Database::start(); // start de database

        $sql = "
        DELETE FROM 
        sets
        WHERE 
            set_id = " . $id. "
        ";


        $conn->query($sql);// sluit de verbinding

        $conn->close();
    
    
    }
    
    
  
    


}





























?>