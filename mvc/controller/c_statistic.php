<?php

class c_statistic{
    protected $m_statistic;

    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->view;
            require_once $this->model;
            
        }
        require_once "mvc/model/m_statistic.php";
        require_once "mvc/model/m_bill.php";
        require_once "mvc/entity/e_hoadon.php";
        require_once "mvc/model/m_customer.php";
        require_once "mvc/entity/e_khachhang.php";
        


        $this->m_statistic = new m_statistic();
    }

    public function getAllTop5(){
        $data = $this->m_statistic->getAllTop5();
        return $data;
    }
    public function getTongTien($id){
        $data = $this->m_statistic->getTongTien($id);
        return $data;
    }
    public function getAllbills(){
        $data = $this->m_statistic->getAllbills();
        return $data;
    }
    public function getTenKHById($id){
        $data = $this->m_statistic->getTenKHById($id);
        return $data;
    }
    public function getMaKHcaonhat(){
        $data = $this->m_statistic->getMaKHcaonhat();
        return $data;
    }
    public function get5MaKHcaonhat(){
        $data = $this->m_statistic->get5MaKHcaonhat();
        return $data;
    }

    public function KiemTraNgay(){
        $data = $this->m_statistic->getMaKHcaonhat();
        echo "<script>alert('helllooooooooooo');</script>";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["startDate"]) && !empty($_POST["startDate"]) && isset($_POST["endDate"]) && !empty($_POST["endDate"])) {
                $startDate = $_POST["startDate"];
                $endDate = $_POST["endDate"];
                $data = $this->m_statistic->getMaKHcaonhatFromStartandEnd($startDate, $endDate);
            } elseif(isset($_POST["endDate"]) && !empty($_POST["endDate"])) {
                $endDate = $_POST["endDate"];
                $data = $this->m_statistic->getMaKHcaonhatFromEnd($endDate);
            } elseif(isset($_POST["startDate"]) && !empty($_POST["startDate"])) {
                $startDate = $_POST["startDate"];
                $data = $this->m_statistic->getMaKHcaonhatFromStart($startDate);
            }
            // Xử lý dữ liệu ở đây (nếu cần)
    
            // Trả về dữ liệu dưới dạng JSON
            header('Content-Type: application/json');
            echo json_encode($data);
            exit;
        }
        // Trả về dữ liệu hoặc thực hiện các hành động khác cần thiết
        return $data;
    }
    

    public function getTongTienHoaDon(){
        $data = $this->m_statistic->getTongTienHoaDon();
        return $data;
    }
    public function getCountBill(){
        $data = $this->m_statistic->getCountBill();
        return $data;
    }
    public function getCountCustomers(){
        $data = $this->m_statistic->getCountCustomers();
        return $data;
    }
    
    
}

?>