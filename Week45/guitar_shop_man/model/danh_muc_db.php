<?php
class danh_muc_db
{

public static function get_categories ()
    {
        $db=database::getDB();
        $query = "SELECT * FROM categories";
        $statement = $db -> prepare($query);
        $statement -> execute();
        $result = $statement-> fetchAll();
        $statement-> closeCursor();
        $categories = array();
        foreach($result as $row)
            {
                $category = new danh_muc($row['categoryID'], $row['categoryName']);
                $categories[]=$category;
            }

       

            return $categories;
    }
public static function selected_cat ($categoryID)
    {
        $db=database::getDB();
        $query = "SELECT * FROM categories WHERE categoryID = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$categoryID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        $selected_name= new danh_muc($result['categoryID'],$result['categoryName']); 

        return $selected_name;
    }

}    

?>    