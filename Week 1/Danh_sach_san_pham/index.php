<?php
include'Database.php';

$query="SELECT * FROM categories";
$statement = $db->prepare($query);
$statement->execute();
$categories=$statement->fetchAll();
$statement->closeCursor();

?>
<ul>
<?php foreach($categories as $value) {?>
<li>
<a href="?category_id=<?php echo $value['categoryID']; ?>">
<?php echo $value['categoryName']; ?>
</a>
</li>
<?php } ?> 



</ul>

<table>

<tr>

<td>Mã sản phẩm</td>
<td>Tên sản phẩm</td>
<td>Giá bán</td>
</tr>

<?php
$id=1;
    $id=filter_input(INPUT_GET,'category_id',FILTER_VALIDATE_INT);
    $query_cat="SELECT * FROM categories WHERE categoryID = :id";
    $statement2 = $db -> prepare($query_cat);
    $statement2->bindValue(':id', $id);
    $statement2->execute();
    
    $result_name= $statement2->fetch();
    $selected_name= $result_name['categoryName'];
    $statement2->closeCursor();
    echo $selected_name;
















    $query1="select * from products where categoryID = :id";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':id',$id);
    $statement1->execute();
    
    $result = $statement1->fetchAll();
    $statement1 -> closeCursor();
    foreach($result as $value)
    {
        echo"<tr>";
        echo"<td>";
        echo $value['productCode'];
        echo"</td>";

        echo"<td>";
        echo $value['productName'];
        echo"</td>";

        echo"<td>";
        echo $value['listPrice'];
        echo"</td>";
        echo"</tr>";
    }
?>

</table>




