<?php
class c_customersManage{
    protected $repository;
    public function __construct() {
        require_once "mvc/model/m_customersManage.php";
    }
    public function getAllUsers()
    {
        
        $this->repository = new m_customersManage();

        $data = $this->repository->getAllUsers();

        $dataToHTML = "";
        if (!empty($data)) {
            foreach ($data as $product) {
                $dataToHTML .= "<div class='dataRow'><div> Mã: " . $product->getMaKH() . "</div><div> Tên Khách Hàng: " . $product->getTenKH() . "</div><div> Địa chỉ: " . $product->getDiaChi() . "</div><div> Ngày Sinh: " . $product->getNgaySinh() . "</div><div> Điện thoại: " . $product->getNgaySinh() . "</div><div> Email: " . $product->getEmail() . "</div></div>";
            }
        }
        return $dataToHTML;

    }
}
?>