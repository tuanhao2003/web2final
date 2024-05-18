<?php
class e_cthoadon{
    protected $maHD;
    protected $maSP;
    protected $soLuong;
    protected $giaTien;


    public function __construct(){
        $this->maHD = null;
        $this->maSP = null;
        $this->soLuong = 0;
        $this->giaTien = 0;
    }

    public function setMaHD($maHD){
        $this->maHD = $maHD;
    }
    public function setMaSP($maSP){
        $this->maSP = $maSP;
    }
    public function setSoLuong($soLuong){
        $this->soLuong = $soLuong;
    }
    public function setGiaTien($giaTien){
        $this->giaTien = $giaTien;
    }


    public function getMaHD(){
        return $this->maHD;
    }
    public function getMaSP(){
        return $this->maSP;
    }
    public function getSoLuong(){
        return $this->soLuong;
    }
    public function getGiaTien(){
        return $this->giaTien;
    }
}
?>