<?php

function get_categories ()
    {
        global $db;
        $query = "SELECT * FROM categories";
        $statement = $db -> prepare($query);
        $statement -> execute();
        $categories = $statement->fetchAll();
        $statement-> closeCursor();

            return $categories;
    }
function selected_cat ($categoryID)
    {
        global $db;
        $query = "SELECT * FROM categories WHERE categoryID = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$categoryID);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        $selected_name= $result['categoryName'];

        return $selected_name;
    }

?>    