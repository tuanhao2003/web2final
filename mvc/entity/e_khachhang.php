<?php
class e_khachhang{
    protected $maKH;
    protected $tenKH;
    protected $diaChi;
    protected $ngaySinh;
    protected $email;
    protected $sdt;
    protected $maTK;

    public function __construct(){
        $this->maKH = null;
        $this->tenKH = null;
        $this->diaChi = null;
        $this->ngaySinh = null;
        $this->email = null;
        $this->sdt = 0;
        $this->maTK = null;
    }

    public function setMaKH($maKH){ 
        $this->maKH = $maKH;
    }
    public function setTenKH($tenKH){
        $this->tenKH = $tenKH;
    }
    public function setDiaChi($diaChi){
        $this->diaChi = $diaChi;
    }
    public function setNgaySinh($ngaySinh){
        $this->ngaySinh = $ngaySinh;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSdt($sdt){
        $this->sdt = $sdt;
    }
    public function setMaTK($maTK){
        $this->maTK = $maTK;
    }

    public function getMaKH(){
        return $this->maKH;
    }
    public function getTenKH(){
        return $this->tenKH;
    }
    public function getDiaChi(){
        return $this->diaChi;
    }
    public function getNgaySinh(){
        return $this->ngaySinh;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSdt(){
        return $this->sdt;
    }
    public function getMaTK(){
        return $this->maTK;
    }

}
?>