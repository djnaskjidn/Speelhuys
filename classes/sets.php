<?php


class Sets
{

    public int $setId;
    public string $setName; 
    public string $setDescription;
    public int $setBrandId;
    public ?int $setThemeId;
    public string $setImage;
    public int $setPrice;
    public int $setAge;
    public int $steentjes;
    public int $setStock;





    public static function setsLatenZienInDeIndex()
    {
        
        $conn = Database::start();


        



        // voorbeeld
        $query = "SELECT * FROM sets LIMIT 10 OFFSET 0;";
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


    
    
  
    


}





























?>