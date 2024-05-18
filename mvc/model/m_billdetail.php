<?php

class m_billdetail{

    protected $sql;

    public function __construct(){
        require 'mvc/config/database.php';
        require 'mvc/entity/e_cthoadon.php';
        require 'mvc/entity/e_hoadon.php';
        require 'mvc/entity/e_giaohang.php';
        require 'mvc/entity/e_khachhang.php';
        require_once 'mvc/entity/e_taikhoan.php';
        require_once 'mvc/entity/e_sanpham.php';
        $this->sql = new database();
    }

    public function getAllbillsdetail(){
        try {
            $conn= $this->sql->connect();
            $query = "select * from cthoadon";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_cthoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaSP($row["MaSP"]);
                    $entity->setSoLuong($row["SoLuong"]);
                    $entity->setGiaTien($row["GiaTien"]);
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

    public function getBilldetail_byMaHD($MaHD){
        try {
            $conn= $this->sql->connect();
            $query = "SELECT * FROM cthoadon WHERE MaHD = '". $MaHD ."'";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_cthoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaSP($row["MaSP"]);
                    $entity->setSoLuong($row["SoLuong"]);
                    $entity->setGiaTien($row["GiaTien"]);
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

    public function getProductName_byMaSP($MaSP){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT cthd.MaHD, sp.TenSP 
                      FROM cthoadon cthd 
                      INNER JOIN sanpham sp ON cthd.MaSP = sp.MaSP 
                      WHERE cthd.MaSP = '$MaSP'";
                      
            $data = $conn->query($query);
            $productName = null;
            if($data->num_rows > 0){
                $row = $data->fetch_assoc();
                $productName = $row["TenSP"];
            }
            $conn->close();
            return $productName;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getProductInfo_byMaSP($MaSP){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT sp.*, cthd.SoLuong, cthd.GiaTien
                      FROM sanpham sp 
                      INNER JOIN cthoadon cthd ON sp.MaSP = cthd.MaSP
                      WHERE sp.MaSP = '$MaSP'";

            $data = $conn->query($query);
            $productInfo = null;
            if($data->num_rows > 0){
                $row = $data->fetch_assoc();
                $productInfo = $row;
            }
            $conn->close();
            return $productInfo;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    
    public function getbillid_fromdetail($ma){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM hoadon WHERE MaHD = '". $ma ."'";
            $data = $conn->query($query);
            $entity = new e_hoadon();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {

                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setNgayLap($row["NgayLap"]);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $entity->setHinhThucTra($row["HinhThucTra"]);

                }
            }

            $conn->close();
            return $entity;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getDeliveryInfo($maHD){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM giaohang WHERE MaHD = '". $maHD ."'";
            $data = $conn->query($query);
            $entity = new e_giaohang();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {

                    $entity->setMaVanDon($row["MaVanDon"]);
                    $entity->setNgayGiao($row["NgayGiao"]);
                    $entity->setTinhTrang($row["TinhTrang"]);
                    $entity->setDiaDiem($row["DiaDiem"]);
                    $entity->setMaHoaDon($row["MaHD"]);
                    $arr[] = $entity;

                }
            }
    
            $conn->close();
            return $entity;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getCustomerInfoFromBill($maHD){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT khachhang.* 
                      FROM khachhang 
                      INNER JOIN hoadon ON khachhang.MaKH = hoadon.MaKH 
                      WHERE hoadon.MaHD = '". $maHD ."'";
            $data = $conn->query($query);
            $entity = new e_khachhang();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setTenKH($row["TenKH"]);
                    $entity->setDiaChi($row["DiaChi"]);
                    $entity->setngaySinh($row["NgaySinh"]);
                    $entity->setEmail($row["Email"]);
                    $entity->setSdt($row["SDT"]);
                    $entity->setMaTK($row["MaTK"]);
                    
                }
            }
    
            $conn->close();
            return $entity;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    
    public function addBilldetail($maHD, $arr){
        try {
            $conn = $this->sql->connect();
            
            $query = "INSERT INTO cthoadon (MaHD, MaSP, SoLuong, GiaTien) 
                      VALUES ('". $maHD ."',
                        '". $arr[0] ."', 
                        '". $arr[1] ."', 
                        '". $arr[2] ."')";
            
            $conn->query($query);
            $conn->close();
            return true;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }
    
    public function getAccountInfo_byMaTK($maTK) {
        try {
            $conn = $this->sql->connect();
            $query = "SELECT tk.MaTK, tk.TenDangNhap, tk.MatKhau, tk.TrangThai, tk.URLHinh
                      FROM TaiKhoan tk
                      JOIN KhachHang kh ON kh.MaTK = tk.MaTK
                      WHERE kh.MaTK = '" . $maTK . "'";
            $data = $conn->query($query);
            $account = new e_taikhoan(); 
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    $account->setMaTK($row["MaTK"]);
                    $account->setTenDangNhap($row["TenDangNhap"]);
                    $account->setMatKhau($row["MatKhau"]);
                    $account->setTrangThai($row["TrangThai"]);
                    $account->setURLHinh($row["URLHinh"]);
                }
            }
            $conn->close();
            return $account;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getProductInfo_byMaSP_detail($maSP) {
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM SanPham WHERE MaSP = '" . $maSP . "'";
            $data = $conn->query($query);
            $product = new e_sanpham(); // Giả định rằng bạn có một lớp e_sanpham để chứa thông tin sản phẩm
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    $product->setMaSP($row["MaSP"]);
                    $product->setTenSP($row["TenSP"]);
                    $product->setDonGia($row["DonGia"]);
                    $product->setHinhAnh($row["HinhAnh"]);
                    $product->setMoTa($row["MoTa"]);
                    $product->setTrangThaiTonTai($row["TrangThaiTonTai"]);
                    $product->setMaHang($row["MaHang"]);
                }
            }
            $conn->close();
            return $product;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
}