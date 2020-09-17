<br>
Loại Sản Phẩm :  
<form action="?action=add_product" method="post">
<?php foreach($danh_muc as $value) {?>

<input type="radio" name="danh_muc_id" value="<?php echo $value['categoryID']?>"> <?php echo $value['categoryName'] ?>
<?php } ?>
<ul>
<li>Tên sản phẩm:  <input type="text" name="ten_sp"> </li>
<li> Mã sản phẩm:   <input type="text" name="ma_sp">(trùng với tên file ảnh)</li>
<li>Giá Tiền:  <input type="text" name="gia_tien"> </li>
<input type="submit" name="btn_them" value="Thêm vào cơ sở dữ liệu">
</form>
</ul>