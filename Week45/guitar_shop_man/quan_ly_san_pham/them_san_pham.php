<br>
Loại Sản Phẩm :  
<form action="?action=add_product" method="post" enctype="multipart/form-data">
<?php foreach($danh_muc as $value) {?>

<input type="radio" name="danh_muc_id" value="<?php echo $value->getID();?>"> <?php echo $value->getName(); ?>
<?php } ?>
<ul>
<li>Tên sản phẩm:  <input type="text" name="ten_sp"> </li>
<li> Mã sản phẩm:   <input type="text" name="ma_sp">(trùng với tên file ảnh)</li>
<li>Giá Tiền:  <input type="text" name="gia_tien"> </li>
<li>Tải file ảnh lên : <input type="file" name="file_anh">   </li>
<input type="submit" name="btn_them" value="Thêm vào cơ sở dữ liệu">
</form>
</ul>