<?php
require('../model/database.php');
require('../model/danh_muc_db.php');
require('../model/san_pham_db.php');

$action = filter_input(INPUT_GET, 'action');
    if($action==NULL)
        {
            $action="list_product";
        }

    
    if($action == "list_product")
        {
            $category_id=filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
            if($category_id==NULL || $category_id == FALSE )  {  $category_id=1;  }
            $categories= get_categories();
            $selected_cat = selected_cat($category_id);
            $products=san_pham_theo_danh_muc($category_id);
            include('danh_sach_san_pham.php');
        }   
    else if($action == 'view_product')  
        {
            $product_id=filter_input(INPUT_GET,'product_id', FILTER_VALIDATE_INT);
            $product_info= chi_tiet_san_pham($product_id);
            $id_san_pham=$product_info['productID'];
            $id_danh_muc=$product_info['categoryID'];
            $danh_muc_san_pham = get_categories();
            $ma_san_pham=$product_info['productCode'];
            $ten_san_pham = $product_info['productName'];
            $gia_san_pham = $product_info['listPrice'];
            $phan_tram_giam_gia = 15;
            $so_tien_duoc_giam = ($gia_san_pham * $phan_tram_giam_gia) /100;
            $so_tien_phai_tra = $gia_san_pham - $so_tien_duoc_giam;
            $link_anh="../images/".$ma_san_pham.".png";
            echo"MÃ SẢN PHẨM ĐƯỢC CHỌN".$product_id;
            include('chi_tiet_san_pham.php');


        }
        echo"action hiện tại".$action;
?>