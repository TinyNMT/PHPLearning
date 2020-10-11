<h1>QUẢN LÝ SẢN PHẨM</h1> <br>
<h2>Danh mục</h2>

<ul>
    <?php foreach($danh_muc_san_pham as $value) {?>
        <li>
            <a href="?category_id=<?php echo $value->getID(); ?>">
            <?php echo $value->getName(); ?></a>
        </li>

    <?php } ?>
</ul>
<h2><?php echo $danh_muc_duoc_chon->getName(); ?></h2>

<table>
        <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá bán</td>
            <td>Ảnh</td>
        </tr>
        <?php foreach($san_pham_theo_danh_muc as $value){ ?>
        <tr>
            <td><?php echo $value->getMa_sp(); ?></td>
            <td><?php echo $value->getTen_sp(); ?></td>
            <td><?php echo $value->getGia_tien(); ?> </td>
            <td><img src="../images/<?php echo $value->getMa_sp(); ?>.png" alt=""> </td>
           
           <td> <form action="" method="post">
                <input type="hidden" name="action" value="delete_product">
                <input type="hidden" name="product_id" value="<?php echo $value->getID();  ?>">
                <input type="hidden" name="category_id" value="<?php echo $value->getDanh_muc();  ?>">
                <input type="submit" name="xoa_btn" value="Xóa">
                <input type="submit" name="sua_btn" value="Sửa">
                
            </form>
            </td>

        </tr>
        <?php } ?>


</table>



<a href="?action=show_add_form"><h2>Thêm sản phẩm</h2></a>