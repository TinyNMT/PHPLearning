<h1>QUẢN LÝ SẢN PHẨM</h1> <br>
<h2>Danh mục</h2>

<ul>
    <?php foreach($danh_muc_san_pham as $value) {?>
        <li>
            <a href="?category_id=<?php echo $value['categoryID'] ?>">
            <?php echo $value['categoryName'] ?></a>
        </li>

    <?php } ?>
</ul>
<h2><?php echo $danh_muc_duoc_chon; ?></h2>

<table>
        <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá bán</td>
            <td>Ảnh</td>
        </tr>
        <?php foreach($san_pham_theo_danh_muc as $value){ ?>
        <tr>
            <td><?php echo $value['productCode']; ?></td>
            <td><?php echo $value['productName']; ?></td>
            <td><?php echo $value['listPrice']; ?> </td>
            <td><img src="../images/<?php echo $value['productCode']; ?>.png" alt=""> </td>
           
           <td> <form action="", method="post">
                <input type="hidden" name="action" value="delete_product">
                <input type="hidden" name="product_id" value="<?php echo $value['productID'];  ?>">
                <input type="hidden" name="category_id" value="<?php echo $value['categoryID'];  ?>">
                <input type="submit" name="xoa_btn" value="Xóa">
                
            </form>
            </td>

        </tr>
        <?php } ?>


</table>



<a href="?action=show_add_form"><h2>Thêm sản phẩm</h2></a>