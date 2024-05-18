<?php
class e_hoadon{
    protected $maHD;
    protected $maKH;
    protected $ngayLap;
    protected $tongGiaGoc;
    protected $hinhThucTra;

    public function __construct(){
        $this ->maHD = null;
        $this ->maKH = null;
        $this ->ngayLap = null;
        $this ->tongGiaGoc = 0;
        $this ->hinhThucTra = null;
    }

    public function setMaHD($maHD){
        $this ->maHD = $maHD;
    }
    public function setMaKH($maKH){
        $this ->maKH = $maKH;
    }
    public function setNgayLap($ngayLap){
        $this ->ngayLap = $ngayLap;
    }
    public function setTongGiaGoc($TongGiaGoc){
        $this ->tongGiaGoc = $TongGiaGoc;
    }
    public function setHinhThucTra($hinhThucTra){
        $this ->hinhThucTra = $hinhThucTra;
    }

    public function getMaHD(){
        return $this->maHD;
    }
    public function getMaKH(){
        return $this->maKH;
    }
    public function getNgayLap(){
        return $this->ngayLap;
    }
    public function getTongGiaGoc(){
        return $this->tongGiaGoc;
    }
    public function getHinhThucTra(){
        return $this->hinhThucTra;
    }

}
?>