<?php
session_start();
require('../model/database.php');
require('../model/danh_muc_db.php');
require('../model/san_pham_db.php');
require('chuc_nang_gio_hang.php');


    if(!isset($_SESSION['gio_hang']))
        {
            $_SESSION['gio_hang']=array();
        }




        $action = filter_input(INPUT_POST, 'action');
        if ($action == NULL) {
            $action = filter_input(INPUT_GET, 'action');
            if ($action == NULL) {
                $action = 'list_product';
            }
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
    else if($action == "them_vao_gio")
        {
            $ma_sp_chon=  filter_input(INPUT_POST , 'ma_sp_chon');  
            $ten_sp_chon=  filter_input(INPUT_POST , 'ten_sp_chon');  
            $gia_tien_chon=  filter_input(INPUT_POST , 'gia_tien_chon' , FILTER_VALIDATE_FLOAT);  
            $so_luong =   filter_input(INPUT_POST , 'so_luong', FILTER_VALIDATE_INT);  
            them_vao_gio($ma_sp_chon,$ten_sp_chon,$gia_tien_chon,$so_luong);
            header("location: ?action=list_product");
        }  
        
        
    else if($action == "hien_gio_hang") 
        {
           
            foreach($_SESSION['gio_hang'] as $key => $value )
                {
                    echo $value['ma_sp_chon'];
                    echo $value['ten_sp_chon'];
                    echo $value['gia_tien_chon'];
                    echo $value['so_luong'];
                }
            include("hien_gio_hang.php");    
           
        }
    else if($action=="cap_nhat_gio_hang")
        {
            $so_luong_moi = filter_input(INPUT_POST, 'so_luong', FILTER_DEFAULT, 
            FILTER_REQUIRE_ARRAY);
            foreach($so_luong_moi as $key => $value)
                {
                    if($_SESSION['gio_hang'][$key]['so_luong']!=$value)
                        {cap_nhat_gio($key,$value);}
                }
            include("hien_gio_hang.php");   
        }
        
    if($action == "xoa_gio_hang")
        {
            session_destroy(); 
            header("location: ?action=list_product");  
        }   
        
?>
