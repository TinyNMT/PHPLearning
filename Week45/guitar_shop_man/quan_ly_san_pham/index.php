
<?php
require('../model/database.php');
require('../model/danh_muc.php');
require('../model/danh_muc_db.php');
require('../model/san_pham.php');
require('../model/san_pham_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
{
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

                $danh_muc_san_pham = danh_muc_db :: get_categories();
                $danh_muc_duoc_chon = danh_muc_db :: selected_cat($id_danh_muc);
                $san_pham_theo_danh_muc = san_pham_db :: san_pham_theo_danh_muc($id_danh_muc);
                include("danh_sach_san_pham.php");
            }

         else if($action=="delete_product")
            {
                $id_san_pham_can_xoa = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
                $id_danh_muc_san_pham = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
      
                san_pham_db:: xoa_san_pham($id_san_pham_can_xoa);
                header("location: .?category_id=$id_danh_muc_san_pham"); 
                   
            }  
        else if($action == "show_add_form")
            {
                $danh_muc = danh_muc_db::get_categories();
                include("them_san_pham.php");
            }
        else if($action == "add_product")
            {
            $ma_san_pham = filter_input(INPUT_POST, 'ma_sp' );    
            $target_dir = "../images/";
            //đường dẫn file sau khi upload
            $target_file = $target_dir. $ma_san_pham. ".png";//strtolower( pathinfo($_FILES['file_anh']['name'], PATHINFO_EXTENSION)); //basename($_FILES['file_anh']['name']); 
            //lấy đuôi file
            $file_type = pathinfo($_FILES['file_anh']['name'], PATHINFO_EXTENSION);
            //gán các loại file cho phép vào mảng
            $file_allow=array('jpg','jpeg','gif','png');
            // kiểm tra điều kiện upload(kích thước,loại file, sự tồn tại)
            if($_FILES['file_anh']['size']>10485760)
                {
                    
                    $error ="dung lượng file quá lớn. Chúng tôi chỉ cho phép upload dưới 10Mb";
                    include("../loi/loi.php");
                    return;
                }
  
            if(!in_array(strtolower($file_type),$file_allow))    
                {
                    $error="không hỗ trợ upload loại file này, được phép: .png .jpg .gif .jpeg";
                    include("../loi/loi.php");
                    return;
                }
            if(file_exists($target_file))
                {
                    $error="file đã tồn tại";
                    include("../loi/loi.php");
                    return;
                }  
            //Chuyển file lên bộ nhớ tạm của server

            if(move_uploaded_file($_FILES['file_anh']['tmp_name'],$target_file))
                {
                    echo"upload file thành công";

                }
            else
                {
                    $error ="upload thất bại";
                    include("../loi/loi.php");
                }    
            
            
            
                $id_danh_muc = filter_input(INPUT_POST, 'danh_muc_id', FILTER_VALIDATE_INT );
                $ten_san_pham = filter_input(INPUT_POST, 'ten_sp' );
                
                $gia_tien = filter_input(INPUT_POST, 'gia_tien', FILTER_VALIDATE_FLOAT );
                $check=san_pham_db :: check_ma_sp($ma_san_pham);
                echo $id_danh_muc. $ten_san_pham .$ma_san_pham. $gia_tien;

                //Kiểm tra các ô nhập đã đủ chưa
                if($id_danh_muc == NULL || $id_danh_muc == FALSE || $ten_san_pham == NULL 
                ||$ma_san_pham == NULL || $gia_tien==NULL || $gia_tien == FALSE
                ) { 
                    $error="VUI LÒNG NHẬP ĐẦY ĐỦ THÔNG TIN";
                    include("../loi/loi.php");
                    
                  }
                else
                {
                    if(empty($check))
                        {
                            $san_pham_moi = new san_pham($id_danh_muc, $ma_san_pham , $ten_san_pham,$gia_tien);
                            san_pham_db :: them_san_pham($san_pham_moi);
                           header("location: .?categoryID=$id_danh_muc");
                            echo"<br> thêm thành công";
                        }
                    else
                        {
                            echo"mã sản phẩm đã tồn tại, vui lòng nhập mã khác!!!!!";
                        }    
                }

                
            }         
echo"action hiện tại ". $action;

?>