<?php
class e_taikhoan{
    protected $matk;
    protected $tenDangNhap;
    protected $matKhau;
    protected $trangThai;
    protected $urlHinh;

    public function __construct(){
        $this->matk = null;
        $this->tenDangNhap = null;
        $this->matKhau = null;
        $this->trangThai = 0;
        $this->urlHinh = null;
    }

    public function setMatk($matk){
        $this->matk = $matk;
    }
    public function setTenDangNhap($tenDangNhap){
        $this->tenDangNhap = $tenDangNhap;
    }
    public function setMatKhau($matKhau){
        $this->matKhau = $matKhau;
    }
    public function setTrangThai($trangThai){
        $this->trangThai = $trangThai;
    }
    public function setUrlHinh($urlHinh){
        $this->urlHinh = $urlHinh;
    }


    public function getMatk(){
        return $this->matk;
    }
    public function getTenDangNhap(){
        return $this->tenDangNhap;
    }
    public function getMatKhau(){
        return $this->matKhau;
    }
    public function getTrangThai(){
        return $this->trangThai;
    }
    public function getUrlHinh(){
        return $this->urlHinh;
    }
}
?>