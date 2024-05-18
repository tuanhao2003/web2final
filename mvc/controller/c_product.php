<?php

class c_product {
    protected $m_listproduct;
    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->model;
            require_once $this->view;
            $this->m_listproduct = new m_listproduct();
        } else {
            $this->view = "mvc/view/absolutePart/v_notFound.php";
        }
    }

    public function index() {
        // Phân trang
        $limit = 9; // Số sản phẩm trên mỗi trang
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Lấy giá trị của tham số 'page' từ URL
        $currentPage = intval($currentPage); // Chuyển đổi giá trị sang kiểu số nguyên để đảm bảo an toàn
        $offset = ($currentPage -1) * $limit;
    
        // Kiểm tra xem $this->m_listproduct đã được khởi tạo chưa
        if ($this->m_listproduct) {
            // Sử dụng model được khởi tạo từ constructor
            $products = $this->m_listproduct->getProducts($offset, $limit);
            $totalProducts = $this->m_listproduct->getTotalProducts();
            $totalPages = ceil($totalProducts / $limit);
            echo $_GET['page'];
        } else {
            // Xử lý khi m_listproduct không tồn tại
            echo "Không thể tải danh sách sản phẩm.";
            return;
        }
    
        // Load view
        include($this->view);
    }
     
}

$controller = new c_product();
$controller->index();
?>
