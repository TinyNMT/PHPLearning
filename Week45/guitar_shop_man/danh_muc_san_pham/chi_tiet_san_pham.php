<h1>Danh mục sản phẩm:</h1>
<ul>
<?php
    foreach($danh_muc_san_pham as $value)
        {
      ?>
    <li>
    <a href="?category=<?php echo $value->getID() ?>"> <?php echo $value->getName() ?> </a>
    </li>
<?php   } ?>
</ul>
<h1>Xem chi tiết sản phẩm</h1>
    <ul>
        <img src="<?php echo $link_anh; ?>" alt="">
        <li>Tên sản phẩm : <?php echo $ten_san_pham; ?> </li>
        <li>Mã sản phẩm:  <?php echo $ma_san_pham ;?> </li>
        <li>Giá bán: <?php echo $gia_san_pham; ?></li>
        <li>Giảm giá:  <?php echo $phan_tram_giam_gia; ?></li>
        <li>Số tiền được giảm:  <?php echo $so_tien_duoc_giam; ?></li>
        <li>Thành tiền:  <?php echo $so_tien_phai_tra; ?></li>
        <form action="" method="post"></form>
    </ul>
