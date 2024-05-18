<?php

class m_statistic{
    protected $sql;
    public function __construct(){
        require 'mvc/config/database.php';
        require_once 'mvc/entity/e_hoadon.php';
        require_once 'mvc/entity/e_khachhang.php';
        $this->sql = new database();
    }
    public function getAllTop5(){
        try {
            $conn = $this->sql->connect();
            $query = "select * from KhachHang";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $e_kh= new e_khachhang();
                    $e_kh->setMaKH($row["MaKH"]);
                    $e_kh->setTenKH($row["TenKH"]);
                    $arr[] = $e_kh;
                }
            }

            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function getTenKHById($id){
        try {
            $conn = $this->sql->connect();
            $query1 = "select TenKH from KhachHang where MaKH='" . $id . "'";
            $data1 = $conn->query($query1);
            if ($data1->num_rows > 0){
                while($row1 = $data1->fetch_assoc()){
                    $arr = $row1['TenKH'];
                }
            }
            
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function getTongTien($id){
        try {
            $conn = $this->sql->connect();
            $query1 = "select Sum(TongGiaGoc) as TongTien from HoaDon where MaKH='" . $id . "'";
            $data1 = $conn->query($query1);
            if ($data1->num_rows > 0){
                while($row1 = $data1->fetch_assoc()){
                    $arr = $row1['TongTien'];
                }
            }
            
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function getAllbills(){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM hoadon ORDER BY TongGiaGoc DESC";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setNgayLap($row["NgayLap"]);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $entity->setHinhThucTra($row["HinhThucTra"]);
                    $arr[] = $entity;
                }
            }

            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function getMaKHcaonhat(){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT *, SUM(TongGiaGoc) AS TongTien FROM HoaDon GROUP BY MaKH ORDER BY TongTien DESC LIMIT 5";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaKH($row['MaKH']);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $arr[] = $entity;
                }
            }
    
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function getMaKHcaonhatFromStart($startdate){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT *, SUM(TongGiaGoc) AS TongTien FROM HoaDon WHERE NgayLap >= '" . $startdate . "' GROUP BY MaKH ORDER BY TongTien DESC LIMIT 5";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaKH($row['MaKH']);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $arr[] = $entity;
                }
            }
    
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getMaKHcaonhatFromEnd($enddate){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT *, SUM(TongGiaGoc) AS TongTien FROM HoaDon WHERE NgayLap <= '" . $enddate . "' GROUP BY MaKH ORDER BY TongTien DESC LIMIT 5";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaKH($row['MaKH']);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $arr[] = $entity;
                }
            }
    
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function getMaKHcaonhatFromStartandEnd($startdate,$enddate){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT *, SUM(TongGiaGoc) AS TongTien FROM HoaDon WHERE NgayLap BETWEEN '" . $startdate . "' AND '" . $enddate . "' GROUP BY MaKH ORDER BY TongTien DESC LIMIT 5";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaKH($row['MaKH']);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $arr[] = $entity;
                }
            }
    
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    public function get5MaKHcaoNhat(){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM HoaDon GROUP BY MaKH ORDER BY SUM(TongGiaGoc) DESC LIMIT 5";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $arr[] = $row['MaKH'];
                }
            }
    
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    
    public function getCountBill(){
        try {
            $conn = $this->sql->connect();
            // Truy vấn SQL để đếm số lượng hóa đơn
            $query = "SELECT COUNT(*) AS count FROM HoaDon";
            $result = $conn->query($query);
            
            $count = 0; // Khởi tạo biến đếm
    
            // Kiểm tra xem truy vấn đã thành công và có kết quả không
            if ($result && $result->num_rows > 0) {
                // Lấy dữ liệu từ kết quả truy vấn
                $row = $result->fetch_assoc();
                $count = $row["count"]; // Lấy giá trị đếm từ cột "count"
            }
            
            // Đóng kết nối
            $conn->close();
    
            return $count;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>"; // Xử lý ngoại lệ nếu có lỗi
            $conn->close(); // Đóng kết nối
            return 0; // Trả về 0 nếu có lỗi
        }
    }

    public function getTongTienHoaDon(){
        try {
            $conn = $this->sql->connect();
            // Truy vấn SQL để tính tổng số tiền của tất cả hóa đơn
            $query = "SELECT SUM(TongGiaGoc) AS totalAmount FROM HoaDon";
            $result = $conn->query($query);
            
            $totalAmount = 0; // Khởi tạo biến tổng số tiền
    
            // Kiểm tra xem truy vấn đã thành công và có kết quả không
            if ($result && $result->num_rows > 0) {
                // Lấy dữ liệu từ kết quả truy vấn
                $row = $result->fetch_assoc();
                $totalAmount = $row["totalAmount"]; // Lấy giá trị tổng số tiền từ cột "totalAmount"
            }
            
            // Đóng kết nối
            $conn->close();
    
            return $totalAmount;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>"; // Xử lý ngoại lệ nếu có lỗi
            $conn->close(); // Đóng kết nối
            return 0; // Trả về 0 nếu có lỗi
        }
    }
    public function getCountCustomers(){
        try {
            $conn = $this->sql->connect();
            // Truy vấn SQL để đếm số lượng khách hàng
            $query = "SELECT COUNT(*) AS count FROM KhachHang";
            $result = $conn->query($query);
            
            $count = 0; // Khởi tạo biến đếm số lượng khách hàng
    
            // Kiểm tra xem truy vấn đã thành công và có kết quả không
            if ($result && $result->num_rows > 0) {
                // Lấy dữ liệu từ kết quả truy vấn
                $row = $result->fetch_assoc();
                $count = $row["count"]; // Lấy giá trị đếm từ cột "count"
            }
            
            // Đóng kết nối
            $conn->close();
    
            return $count;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>"; // Xử lý ngoại lệ nếu có lỗi
            $conn->close(); // Đóng kết nối
            return 0; // Trả về 0 nếu có lỗi
        }
    }
    
    
    
    
    
}


?>