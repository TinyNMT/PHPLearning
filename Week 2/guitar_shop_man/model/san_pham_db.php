<?php
 

    function san_pham_theo_danh_muc($categoryID)
        {
            global $db;
            $query="SELECT * FROM products WHERE categoryID = :id ORDER BY categoryID";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$categoryID);
            $statement->execute();
            $result=$statement->fetchAll();
            $statement->closeCursor();

            return $result;
        }

    function chi_tiet_san_pham($productID)
        {
            global $db;
            $query="SELECT * FROM products WHERE productID = :id ";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$productID);
            $statement->execute();
            $result=$statement->fetch();
            $statement->closeCursor();

            return $result;

        }


    function xoa_san_pham($productID)
        {
            global $db;
            $query="DELETE FROM products WHERE productID = :id ";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$productID);
            $statement->execute();
            $statement->closeCursor();
        }

    function them_san_pham($categoryID, $productCode, $productName, $price)
        {
            global $db;
            $query="INSERT INTO products(categoryID, productCode, productName, listPrice) 
            VALUES (:id, :code , :name , :price) ";


            $statement=$db->prepare($query);
            $statement->bindValue(':id',$categoryID);
            $statement->bindValue(':code',$productCode);
            $statement->bindValue(':name',$productName);
            $statement->bindValue(':price',$price);
            $statement->execute();
            $statement->closeCursor();
        }        

    function sua_san_pham($categoryID, $productCode, $productName, $price)
        {
            global $db;
            $query="UPDATE  products
            SET categoryID = :id, productCode = :code, productName= :pname, listPrice = :price 
             WHERE productID = :id ";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$categoryID);
            $statement->bindValue(':code',$productCode);
            $statement->bindValue(':pname',$productName);
            $statement->bindValue(':price',$price);

            $statement->execute();
            $statement->closeCursor();
        }
    function check_ma_sp($productCode)
        {
            global $db;
            $query = "SELECT * FROM products WHERE productCode =:code";
            $statement = $db->prepare($query);
            $statement->bindValue(':code', $productCode);
            $statement->execute();
            $check = $statement->fetch();
            $statement-> closeCursor();
            return $check;
        }       


?>