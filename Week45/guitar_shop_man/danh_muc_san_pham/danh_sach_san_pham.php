<div id="danh_muc">
<h1>DANH SÁCH SẢN PHẨM</h1>


<ul>
<?php foreach($categories as $value) 
        {
?>
        <li>
            <a href="?category_id=<?php echo $value->getID(); ?> ">
            <?php echo $value->getName(); ?> </a>
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
    <form action="" method="post">
    <li>
        
        <img src="../images/<?php echo $value->getMa_sp(); ?>.png" alt="">

        <a href="?action=view_product&amp;product_id=<?php echo $value->getID(); ?>">

        <?php echo $value->getTen_sp(); ?>

        </a> <?php echo":  ".$value->getGia_tien() . "$"; ?>

        <input type="hidden" name="action" value="them_vao_gio">

        <input type="hidden" name="ma_sp_chon" value="<?php echo $value->getMa_sp(); ?>">

        <input type="hidden" name="ten_sp_chon" value="<?php echo $value->getTen_sp(); ?>">

        <input type="hidden" name="gia_tien_chon" value="<?php echo $value->getGia_tien(); ?>">

        <input type="text" name="so_luong" placeholder="Nhập số lượng">

        <input type="submit" name="btn_them" value="Thêm vào giỏ hàng">
    </li>
    </form>
<?php     

}


    ?>
    
   
<a href="?action=hien_gio_hang">Hiển thị giỏ hàng</a>
<a href="?action=xoa_gio_hang">Làm sạch giỏ hàng</a>
</ul>
</div>