<?php
class e_taikhoan{
    protected $matk;
    protected $phanQuyen;

    public function __construct(){
        $this->matk = null;
        $this->phanQuyen = null;
    }

    public function setMatk($matk){
        $this->matk = $matk;
    }

    public function getMatk(){
        return $this->matk;
    }

    public function setPhanQuyen($PhanQuyen){
        $this->phanQuyen = $PhanQuyen;
    }

    public function getPhanQuyen(){
        return $this->phanQuyen;
    }
}
?>