<?php

class m_bill{

    protected $sql;
    public function __construct(){
        require 'mvc/config/database.php';
        require_once 'mvc/entity/e_hoadon.php';
        require_once 'mvc/entity/e_giaohang.php';
        require_once 'mvc/entity/e_cthoadon.php';
        require_once 'mvc/entity/e_khachhang.php';
        require_once 'mvc/entity/e_taikhoan.php';
        require_once 'mvc/entity/e_sanpham.php';
        $this->sql = new database();
    }

    public function getAllbills(){
        try {
            $conn = $this->sql->connect();
            $query = "select * from hoadon";
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

    public function getbillid($ma){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM hoadon WHERE MaHD = '". $ma ."'";
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

    public function getbillid_byMaKH($ma){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM hoadon WHERE MaKH = '". $ma ."'";
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
    
    public function getBilldetail_byMaHD_inHD($MaHD){
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

    public function getProductName_byMaSP_inHD($MaSP){
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

    public function addBill($maHD, $arr){
        try {
            $conn = $this->sql->connect();
            
            $query = "INSERT INTO hoadon (MaHD, MaKH, HinhThucTra, NgayLap, TongGiaGoc) 
                      VALUES ('". $maHD ."',
                        '". $arr[0] ."', 
                        '". $arr[1] ."', 
                        '". $arr[2] ."', 
                        '". $arr[3] ."')";
            
            $conn->query($query);
            $conn->close();
            return true;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }

    public function addDeliveryInfo($maVanDon, $arr){
        try {
            $conn = $this->sql->connect();

            $query = "INSERT INTO giaohang (MaVanDon, NgayGiao, NgayNhán, TinhTrang, DiaDiem, MaHD) 
                      VALUES ('". $maVanDon ."', 
                              '". $arr[0] ."', 
                              '". $arr[1] ."', 
                              '". $arr[2] ."', 
                              '". $arr[3] ."', 
                              '". $arr[4] ."')";
        
            $conn->query($query);
            $conn->close();
            return true;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }
    
    public function getUser_byid_inhd($id){
        try {
            $conn=$this->sql->connect();
            $query = "SELECT * from khachhang WHERE MaKH = '" . $id . "'";
            $data = $conn->query($query);
            $entity = new e_khachhang();
            if ($data->num_rows > 0) {
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

    public function getProductInfo_byMaSP($maSP) {
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
?>