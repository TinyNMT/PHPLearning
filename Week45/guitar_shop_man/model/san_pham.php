<?php
    class san_pham
    {
        private $danh_muc, $id , $ma_sp , $ten_sp, $gia_tien;
        
        public function __construct($danh_muc, $ma_sp , $ten_sp, $gia_tien)
        {
            $this->danh_muc = $danh_muc;
            $this->ma_sp = $ma_sp;
            $this->ten_sp = $ten_sp;
            $this->gia_tien = $gia_tien;           
        }


        public function getDanh_muc()
        {
            return $this->danh_muc;
        }
        public function setDanh_muc($danh_muc)
        {
            $this->danh_muc= $danh_muc;
        }
        
        public function getID()
        {
            return $this->id;
        }
        public function setID($id)
        {
            $this->id= $id;
        }

        public function getMa_sp()
        {
            return $this->ma_sp;
        }
        public function setMa_sp($ma_sp)
        {
            $this->ma_sp= $ma_sp;
        }

        public function getTen_sp()
        {
            return $this->ma_sp;
        }
        public function setTen_sp($ten_sp)
        {
            $this->ten_sp= $ten_sp;
        }

        public function getGia_tien()
        {
            return $this->gia_tien;
        }
        public function setGia_tien($gia_tien)
        {
            $this->gia_tien= $gia_tien;
        }

        public function dinh_dang_gia_tien()
        {
            return number_format($this->gia_tien,2);
        }
        public function phan_tram_giam_gia()
        {
            $phan_tram= 30;
            return $phan_tram;
        }

        public function so_tien_phai_tra ()
        {
            $phantram=$this->phan_tram_giam_gia();
            return (int)(($this->gia_tien*$phantram)/100);
        }

        public function so_tien_duoc_giam()
        {
            return (int)($this->gia_tien - $this->so_tien_phai_tra());
        }
        public function link_anh()
        {
            $link="../images/". $this->ma_sp . ".png";
            return $link;
        }
    }
?>