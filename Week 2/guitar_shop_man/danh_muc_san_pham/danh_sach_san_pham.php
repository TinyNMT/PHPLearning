<div id="danh_muc">
<h1>DANH SÁCH SẢN PHẨM</h1>


<ul>
<?php foreach($categories as $value) 
        {
?>
        <li>
            <a href="?category_id=<?php echo $value['categoryID']; ?> ">
            <?php echo $value['categoryName']; ?> </a>
        </li>


<?php   } ?> 
</ul>

</div>

<div id="danh_sach">
<ul>
<?php
    foreach($products as $value)
            {
?>

    <li>
        <img src="../images/<?php echo $value['productCode']; ?>.png" alt="">
        <a href="?action=view_product&amp;product_id=<?php echo $value['productID']; ?>">
        <?php echo $value['productName']; ?>
        </a>
    </li>
<?php       } ?>


</ul>
</div>