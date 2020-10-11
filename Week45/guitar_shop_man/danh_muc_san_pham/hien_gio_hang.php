<form action="." method="post">
<input type="hidden" name="action" value="cap_nhat_gio_hang">
<table>
<tr>
<th>Sản Phẩm</th>
<th></th>
<th>Giá Bán</th>
<th>Số Lượng</th>
<th>Thành tiền</th>

</tr>
<?php foreach($_SESSION['gio_hang'] as $key => $value) {  ?>
<tr>
    <td><?php echo $value['ten_sp_chon'];?></td>
    <td> <img src="../images/<?php echo $value['ma_sp_chon'] ?>.png" alt=""></td>  
    <td><?php echo $value['gia_tien_chon']; ?></td>
   <td><input type="text" name="so_luong[<?php echo $value['ma_sp_chon'] ?>]" value="<?php echo $value['so_luong']; ?>"> </td>
    <td><?php echo number_format( $value['gia_tien_chon'] * $value['so_luong']);  ?></td>              
                    
                    
</tr>
<?php } ?>
<tr> 
<td> Tổng tiền = <?php echo number_format( thanh_tien()); ?> </td>
</tr>
</table>
<input type="submit" name="btn_cap_nhat" value="cập nhật giỏ hàng">
</form> 
<a href="?action=xoa_gio_hang"> Làm sạch giỏ hàng</a>
