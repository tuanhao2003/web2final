<?php
class c_bill{
    protected $m_bill;
    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->view;
            require_once $this->model;
            
        }
        require_once "mvc/model/m_bill.php";
        require_once "mvc/entity/e_hoadon.php";
        $this->m_bill = new m_bill();
    }

    public function getBillid($MaHD){

        $data = $this->m_bill->getbillid($MaHD);
        return $data;
    }

    public function getbillid_byMaKH($ma){
        $data = $this->m_bill->getbillid_byMaKH($ma);
        return $data;
    }
    public function getDeliveryInfo($MaHD){
        $data = $this->m_bill->getDeliveryInfo($MaHD);
        return $data;
    }

    public function getBilldetail_byMaHD_inHD($MaHD){
        $data = $this->m_bill->getBilldetail_byMaHD_inHD($MaHD);
        return $data;
    }

    public function getProductName_byMaSP_inHD($MaSP){
        $data = $this->m_bill->getProductName_byMaSP_inHD($MaSP);
        return $data;
    }

    public function autoIDHD(){
        $listHD = $this->m_bill->getAllbills();
        $length = count($listHD);
        return "HD" . ($length + 1);
    }
    
    public function addBill($arr){
        $id = $this->autoIDHD();
        $this->m_bill->addBill($id,$arr);
    }

    public function autoIDGH(){
        $listHD = $this->m_bill->getAllbills();
        $length = count($listHD);
        return "VD" . ($length);
    }

    public function addDeliveryInfo($arr){
        $maVanDon = $this->autoIDGH();
        echo($maVanDon);
        echo($arr[2]);
        $this->m_bill->addDeliveryInfo($maVanDon,$arr);
    }

    public function getUser_byid_inhd($id){
        $data = $this->m_bill->getUser_byid_inhd($id);
        return $data;
    }
 
    public function getAccountInfo_byMaTK($maTK){
        $data = $this->m_bill->getAccountInfo_byMaTK($maTK);
        return $data;
    }

    public function getProductInfo_byMaSP($maSP) {
        $data = $this->m_bill->getProductInfo_byMaSP($maSP);
        return $data;
    }
}


