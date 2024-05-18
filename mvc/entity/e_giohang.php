<?php
class e_giohang{
    protected $maKH;
    protected $maSP;

    public function __construct(){
        $this->maKH = null;
        $this->maSP = null;
    }

    public function getMaKH(){
        return $this->maKH;
    }
    public function getMaSP(){
        return $this->maSP;
    }
    public function setMaKH($maKH){
        $this->maKH = $maKH;
    }
    public function setMaSP($maSP){
        $this->maSP = $maSP;
    }
}
?>