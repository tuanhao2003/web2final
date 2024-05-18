<?php
class e_giohang{
    protected $maHang;
    protected $tenHang;

    public function __construct(){
        $this->maHang = null;
        $this->tenHang = null;
    }

    public function getMaHang(){
        return $this->maHang;
    }
    public function getTenHang(){
        return $this->tenHang;
    }
    public function setMaHang($maHang){
        $this->maHang = $maHang;
    }
    public function setTenHang($tenHang){
        $this->tenHang = $tenHang;
    }
}
?>