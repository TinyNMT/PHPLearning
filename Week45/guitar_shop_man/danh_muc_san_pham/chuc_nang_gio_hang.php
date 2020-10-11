<?php
    function them_vao_gio($ma_sp_chon,$ten_sp_chon,$gia_tien_chon,$so_luong)
        {
            if(isset($_SESSION['gio_hang'][$ma_sp_chon]))
                {
                    $_SESSION['gio_hang'][$ma_sp_chon]['so_luong'] += $so_luong;
                }
            else    
                {
                    $_SESSION['gio_hang'][$ma_sp_chon]=array('ma_sp_chon' => $ma_sp_chon,
                    'ten_sp_chon' => $ten_sp_chon,'gia_tien_chon' => $gia_tien_chon,
                    'so_luong' => $so_luong);
                }    


        }
    function cap_nhat_gio($ma_sp_chon,$so_luong)
        {
            $so_luong = (int)($so_luong) ; 
            if(isset($_SESSION['gio_hang'][$ma_sp_chon]))
                {
                    if($so_luong <= 0)
                        {
                            unset($_SESSION['gio_hang'][$ma_sp_chon]['so_luong']);

                        }
                    else
                        {
                            $_SESSION['gio_hang'][$ma_sp_chon]['so_luong']=$so_luong;
                        }    
                }
 
        }    
    function thanh_tien()
        {
            $thanh_tien=0;

            foreach($_SESSION['gio_hang'] as $key => $value )
                {
                    $thanh_tien += $value['gia_tien_chon']*$value['so_luong'];
                }
                return $thanh_tien;
        }    
?>