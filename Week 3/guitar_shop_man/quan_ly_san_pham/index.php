
<?php
require('../model/database.php');
require('../model/danh_muc_db.php');
require('../model/san_pham_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_product';
    }
}
        
        if($action=="list_product")
            {
                $id_danh_muc = filter_input(INPUT_GET , 'category_id', FILTER_VALIDATE_INT);
                if($id_danh_muc == NULL || $id_danh_muc == FALSE) 
                    {  
                        $id_danh_muc =1;
                    }

                $danh_muc_san_pham = get_categories();
                $danh_muc_duoc_chon = selected_cat($id_danh_muc);
                $san_pham_theo_danh_muc = san_pham_theo_danh_muc($id_danh_muc);
                include("danh_sach_san_pham.php");
            }

         else if($action=="delete_product")
            {
                $id_san_pham_can_xoa = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
                $id_danh_muc_san_pham = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

                if($id_danh_muc_san_pham == NULL || $id_danh_muc_san_pham == FALSE
                || $id_san_pham_can_xoa == NULL || $id_san_pham_can_xoa == FALSE)
                {
                    echo "Không tồn tại";
                }
                else    
                    {
                        xoa_san_pham($id_san_pham_can_xoa);
                        header("location: .?category_id=$id_danh_muc_san_pham"); 
                    }
            }  
        else if($action == "show_add_form")
            {
                $danh_muc = get_categories();
                include("them_san_pham.php");
            }
        else if($action == "add_product")
            {
                
              
                $id_danh_muc = filter_input(INPUT_POST, 'danh_muc_id', FILTER_VALIDATE_INT );
                $ten_san_pham = filter_input(INPUT_POST, 'ten_sp' );
                $ma_san_pham = filter_input(INPUT_POST, 'ma_sp' );
                $gia_tien = filter_input(INPUT_POST, 'gia_tien', FILTER_VALIDATE_FLOAT );
                $check=check_ma_sp($ma_san_pham);
                echo $id_danh_muc. $ten_san_pham .$ma_san_pham. $gia_tien;
                if($id_danh_muc == NULL || $id_danh_muc == FALSE || $ten_san_pham == NULL 
                ||$ma_san_pham == NULL || $gia_tien==NULL || $gia_tien == FALSE
                ) { echo "Vui lòng nhập đầy đủ thông tin";}
                else
                {
                    if($check==NULL)
                        {
                            them_san_pham($id_danh_muc,$ma_san_pham,$ten_san_pham,$gia_tien);
                           header("location: .?categoryID=$id_danh_muc");
                            echo"<br> thêm thành công";
                        }
                    else
                        {
                            echo"mã sản phẩm đã tồn tại, vui lòng nhập mã khác!!!!!";
                        }    
                }
            }         

?>