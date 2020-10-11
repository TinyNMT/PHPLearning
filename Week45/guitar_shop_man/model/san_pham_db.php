<?php
class san_pham_db
{

    public static function san_pham_theo_danh_muc($category_ID)
        {
            $db = database::getDB();
            $selected_cat = danh_muc_db::selected_cat($category_ID);

            $query="SELECT * FROM products WHERE categoryID = :id ORDER BY categoryID";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$selected_cat -> getID());
            $statement->execute();
            $result=$statement->fetchAll();
            $statement->closeCursor();

            $sanpham = array();
            foreach($result as $value)
                {
                   
                    $san_pham= new san_pham($value['categoryID'],$value['productCode'],$value['productName'],$value['listPrice']); //Khởi tạo đối tượng sản phẩm 
                    $san_pham->setID($value['productID']);
                    $sanpham[]=$san_pham;

                }
            return $sanpham;
        }

    public static function chi_tiet_san_pham($productID)
        {
            $db=database::getDB();
            $query="SELECT * FROM products WHERE productID = :id ";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$productID);
            $statement->execute();
            $result=$statement->fetch();
            $statement->closeCursor();

            $san_pham = new san_pham($result['categoryID'],        
            $result['productCode'],
            $result['productName'], 
            $result['listPrice']);
            $san_pham->setID($result['productID']);
            return $san_pham;

        }


    public static function xoa_san_pham($productID)
        {
            $db=database::getDB();
            $query="DELETE FROM products WHERE productID = :id ";
            $statement=$db->prepare($query);
            $statement->bindValue(':id',$productID);
            $statement->execute();
            $statement->closeCursor();
        }

    public static function them_san_pham($san_pham) // Tham số đầu vào là 1 đối tượng
        {
            $db=database::getDB();
            $query="INSERT INTO products(categoryID, productCode, productName, listPrice) 
            VALUES (:id, :code , :name , :price) ";
           

            $statement=$db->prepare($query);
            $statement->bindValue(':id',$san_pham -> getDanh_muc()); // Truy cập các thuộc tính của đối tượng
            $statement->bindValue(':code',$san_pham -> getMa_sp());
            $statement->bindValue(':name',$san_pham-> getTen_sp());
            $statement->bindValue(':price',$san_pham -> getGia_tien());
            $statement->execute();
            $statement->closeCursor();
        }        

    public static function sua_san_pham($categoryID, $productCode, $productName, $price)
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
    public static function check_ma_sp($productCode)
        {
            $db=database::getDB();
            $check = array();
            $query = "SELECT * FROM products WHERE productCode =:code";
            $statement = $db->prepare($query);
            $statement->bindValue(':code', $productCode);
            $statement->execute();
            $ket_qua = $statement->fetchAll();
            $statement-> closeCursor();
            foreach($ket_qua as $value)
                {
                    $check[]= new san_pham($value['categoryID'],
                    $value['productCode'], $value['productName'],
                    $value['listPrice']);
                }
            return $check;
        }       

} 
?>