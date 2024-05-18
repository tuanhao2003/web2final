<?php
class c_billdetail{
    protected $m_billdetail;
    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->model;
            require_once $this->view;
        }
            $this->m_billdetail = new m_billdetail();
    }

    public function allfunction($ma){
        return $this->getAllbillsdetail().$this->getBilldetail_byMaHD($ma);
    }


    public function getAllbillsdetail(){
        $data = $this->m_billdetail->getAllbillsdetail();
        return $data;
    }


    public function getbill_toview(){
        $data = $this->m_billdetail->getAllbillsdetail();
        return $data;
    }

    public function getBilldetail_byMaHD($MaHD){

        $data = $this->m_billdetail->getBilldetail_byMaHD($MaHD);
        return $data;
    }

    public function getProductName_byMaSP($MaSP){
        $data = $this->m_billdetail->getProductName_byMaSP($MaSP);
        return $data;
    }

    public function getProductInfo_byMaSP($MaSP){
        $data = $this->m_billdetail->getProductInfo_byMaSP($MaSP);
        return $data;
    }

    public function getbillid_fromdetail($MaHD){
        $data = $this->m_billdetail->getbillid_fromdetail($MaHD);
        return $data;
    }

    public function getDeliveryInfo($MaHD){
        $data = $this->m_billdetail->getDeliveryInfo($MaHD);
        return $data;
    }

    public function getCustomerInfoFromBill($MaHD){
        $data = $this->m_billdetail->getCustomerInfoFromBill($MaHD);
        return $data;
    }

    public function addBilldetail($id, $arr){
        $this->m_billdetail->addBilldetail($id,$arr);
    }

    public function getAccountInfo_byMaTK($maTK){
        $data = $this->m_billdetail->getAccountInfo_byMaTK($maTK);
        return $data;
    }

    public function getProductInfo_byMaSP_detail($maSP) {
        $data = $this->m_billdetail->getProductInfo_byMaSP_detail($maSP);
        return $data;
    }
}