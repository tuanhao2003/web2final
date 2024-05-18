<?php
class e_giaohang{
    protected $maVanDon;
    protected $ngayGiao;
    protected $ngayNhan;
    protected $tinhTrang;
    protected $diaDiem;
    protected $maHD;

    public function __construct(){
        $this->maVanDon = null;
        $this->ngayGiao = null;
        $this->ngayNhan = null;
        $this->tinhTrang = null;
        $this->diaDiem = null;
        $this->maHD = null;
    }

    public function setMaVanDon($maVanDon){
        $this->maVanDon = $maVanDon;
    }
    public function setNgayGiao($ngayGiao){
        $this->ngayGiao = $ngayGiao;
    }
    public function setNgayNhan($ngayNhan){
        $this->ngayNhan = $ngayNhan;
    }
    public function setTinhTrang($tinhTrang){
        $this->tinhTrang = $tinhTrang;
    }
    public function setDiaDiem($diaDiem){
        $this->diaDiem = $diaDiem;
    }
    public function setMaHoaDon($maHD){
        $this->maHD = $maHD;
    }

    public function getMaVanDon(){
        return $this->maVanDon;
    }
    public function getNgayGiao(){
        return $this->ngayGiao;
    }
    public function getNgayNhan(){
        return $this->ngayNhan;
    }
    public function getTinhTrang(){
        return $this->tinhTrang;
    }
    public function getDiaDiem(){
        return $this->diaDiem;
    }
    public function getMaHoaDon(){
        return $this->maHD;
    }
}
?>