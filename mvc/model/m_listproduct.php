<?php
require_once('mvc/config/database.php');
require_once('mvc/entity/e_sanpham.php');

class m_listproduct {
    public function getProducts($offset, $limit) {
        $db = new database();
        $conn = $db->connect();

        $sql = "SELECT * FROM sanpham LIMIT ?, ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new e_sanpham(); // Tạo một đối tượng e_sanpham mới
                // Thiết lập các thuộc tính cho đối tượng từ dữ liệu trong $row
                $product->setMasp($row['MaSP']);
                $product->setTensp($row['TenSP']);
                $product->setDonGia($row['DonGia']);
                $product->setmoTa($row['MoTa']);
                $product->setHinhAnh($row['HinhAnh']);
                $product->setTrangThaiTonTai($row['TrangThaiTonTai']);
                $product->setMaHang($row['MaHang']);
                
                // Thêm đối tượng sản phẩm vào mảng $products
                $products[] = $product;
            }
        }

        $stmt->close();
        $conn->close();

        return $products;
    }

    public function getTotalProducts() {
        $db = new database();
        $conn = $db->connect();

        $sql = "SELECT COUNT(*) AS total FROM sanpham";
        $result = $conn->query($sql);
        $total = $result->fetch_assoc()['total'];

        $conn->close();

        return $total;
    }
}
?>
