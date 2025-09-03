<?php


class Sets
{

    public int $setId;
    public string $setName; 
    public string $setDescription;
    public int $setBrandId;
    public int $setThemeId;
    public string $setImage;
    public int $setPrice;
    public int $setAge;
    public int $steentjes;
    public int $stock;



    public static function setsLatenZienInDeIndex()
    {
        
        $conn = Database::start();

        // voorbeeld
        $query = "SELECT * FROM sets";
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
               




                $setss[] = $set;
            }
            $conn->close(); // sluit de verbinding

            return $setss;
        }




    }



    
    
  
    


}




















?>