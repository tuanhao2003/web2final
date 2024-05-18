<?php
class e_sanpham
{
    protected $masp;
    protected $tensp;
    protected $donGia;
    protected $hinhAnh;
    protected $moTa;
    protected $trangThaiTonTai;
    protected $maHang;

    public function __construct()
    {
        $this->masp=null;
        $this->tensp=null;
        $this->donGia=0;
        $this->hinhAnh=null;
        $this->moTa=null;
        $this->trangThaiTonTai=null;
        $this->maHang=null;
    }

    public function getMasp(){
        return $this->masp;
    }
    public function setMasp($masp){
        $this->masp = $masp;
    }

    public function getTensp(){
        return $this->tensp;
    }
    public function setTensp($tensp){
        $this->tensp = $tensp;
    }

    public function getDonGia(){
        return $this->donGia;
    }
    public function setDonGia($donGia){
        $this->donGia = $donGia;
    }


    public function getHinhAnh(){
        return $this->hinhAnh;
    }
    public function setHinhAnh($hinhAnh){
        $this->hinhAnh = $hinhAnh;
    }

    public function getMoTa(){
        return $this->moTa;
    }
    public function setMoTa($MoTa){
        $this->moTa = $MoTa;
    }

    public function getTrangThaiTonTai(){
        return $this->trangThaiTonTai;
    }
    public function setTrangThaiTonTai($trangThaiTonTai){
        $this->trangThaiTonTai = $trangThaiTonTai;
    }

    public function getMaHang(){
        return $this->maHang;
    }
    public function setMaHang($maHang){
        $this->maHang = $maHang;
    }

}
?>