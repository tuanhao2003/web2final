<?php
class m_productsManage
{
    protected $sql;
    public function __construct()
    {
        require_once 'mvc/config/database.php';
        require_once 'mvc/entity/e_sanpham.php';
        $this->sql = new database();
    }

    public function getAllProducts()
    {
        try {
            $conn = $this->sql->connect();
            $query = "select * from sanpham;";
            $data = $conn->query($query);
            $arr = array();
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_sanpham();
                    $entity->setMasp($row["MaSP"]);
                    $entity->setTensp($row["TenSP"]);
                    $entity->setDonGia($row["DonGia"]);
                    $entity->setHinhAnh($row["HinhAnh"]);
                    $entity->setMoTa($row["MoTa"]);
                    $entity->setTrangThaiTonTai($row["TrangThaiTonTai"]);
                    $entity->setMaHang($row["MaHang"]);
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

    public function getProduct($id)
    {
        try {
            $conn = $this->sql->connect();
            $query = "select * from sanpham where MaSP='" . $id . "';";
            $data = $conn->query($query);
            if ($data->num_rows > 0) {
                $row = $data->fetch_assoc();
                $entity = new e_sanpham();
                $entity->setMasp($row["MaSP"]);
                $entity->setTensp($row["TenSP"]);
                $entity->setDonGia($row["DonGia"]);
                $entity->setHinhAnh($row["HinhAnh"]);
                $entity->setMoTa($row["MoTa"]);
                $entity->setTrangThaiTonTai($row["TrangThaiTonTai"]);
                $entity->setMaHang($row["MaHang"]);
                $conn->close();
                return $entity;
            }else{
                echo "<script>alert('No product found');</script>";
                $conn->close();
                return null;
            }
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function addProduct(e_sanpham $entity)
    {
        try {
            $conn = $this->sql->connect();
            if ($this->getProduct($entity->getMasp()) == null) {
                $query = "insert into sanpham(MaSP, TenSP, DonGia, HinhAnh, MoTa, TrangThaiTonTai, MaHang) VALUES ('" . $entity->getMasp() . "','" . $entity->getTensp() . "'," . $entity->getDonGia() . "," . $entity->getHinhAnh() .",'" . $entity->getMoTa() .  "'," . $entity->getTrangThaiTonTai() . ",'" . $entity->getMaHang() . "');";

                $conn->query($query);
                $conn->close();
                return true;
            } else {
                echo "<script>alert('Product already stored');</script>";
                $conn->close();
                return false;
            }
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }

    public function deleteProduct($id)
    {
        try {
            $conn = $this->sql->connect();
            if ($this->getProduct($id) != null) {
                $query = "delete from sanpham where MaSP='".$id."';";

                $conn->query($query);
                $conn->close();
                return true;
            } else {
                echo "<script>alert('Product not found');</script>";
                $conn->close();
                return false;
            }
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }

    public function updateProduct(e_sanpham $entity){
        try {
            $conn = $this->sql->connect();
            if ($this->getProduct($entity->getMasp()) != null) {
                $query = "update sanpham set TenSP='".$entity->getTensp()."',DonGia=".$entity->getDonGia().",MoTa='".$entity->getMoTa()."',HinhAnh='".$entity->getHinhAnh()."',TrangThaiTonTai=".$entity->getTrangThaiTonTai().",MaHang='".$entity->getMaHang()."' where MaSP='".$entity->getMasp()."';";

                $conn->query($query);
                $conn->close();
                return true;
            } else {
                echo "<script>alert('Product not found');</script>";
                $conn->close();
                return false;
            }
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }
}
?>