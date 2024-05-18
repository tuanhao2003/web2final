<?php
class m_customersManage
{
    protected $sql;
    public function __construct()
    {
        require 'mvc/config/database.php';
        require 'mvc/entity/e_khachhang.php';
        $this->sql = new database();
    }

    public function getAllUsers()
    {
        try {
            $conn=$this->sql->connect();
            $query = "select * from khachhang";
            $data = $conn->query($query);
            $arr = array();
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_khachhang();
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setTenKH($row["TenKH"]);
                    $entity->setDiaChi($row["DiaChi"]);
                    $entity->setngaySinh($row["NgaySinh"]);
                    $entity->setEmail($row["Email"]);
                    $entity->setSdt($row["SDT"]);
                    $entity->setMaTK($row["MaTK"]);
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
}
?>