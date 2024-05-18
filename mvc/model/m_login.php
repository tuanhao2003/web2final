<?php
class m_login
{
    protected $sql;
    public function __construct()
    {
        require_once 'mvc/config/database.php';
        require_once 'mvc/entity/e_taikhoan.php';
        require_once 'mvc/entity/e_khachhang.php';
        $this->sql = new database();
    }
    public function login($username, $password)
    {
        try {
            $conn = $this->sql->connect();
            if (empty($username)) {
                echo "<script>alert('Please do not leave the username field blank!');</script>";
                header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
            } else if (empty($password)) {
                echo "<script>alert('Please do not leave the password field blank!');</script>";
                header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
            } else {
                $check = $this->getAccountByName($username);
                if ($check != null) {
                    if($check->getMatKhau()==$password){
                        $queryClassify = "select PhanQuyen from quyen where MaTK='" . $check->getMatk() . "'";

                        setcookie('isLoggedIn', true, path:"/");
                        setcookie('loginingAccount', $check->getMatk(), path:"/");

                        if ($conn->query($queryClassify)->fetch_assoc()["PhanQuyen"] == "admin") {
                            header("Location: /web2/admin");
                            echo "<script>alert('Welcome to admin page');</script>";
                        } else {
                            header("Location: /web2/home");
                            echo "<script>alert('Welcome!');</script>";
                        }
                    } else{
                        echo "<script>alert('Invalid password!');</script>";
                    }
                } else {
                    echo "<script>alert('Invalid username!');</script>";
                }
            }
        } catch (Exception $e) {
            echo "<script>alert('Error');</script>";
        }
        $conn->close();
    }

    public function register(e_taikhoan $newAccount, e_khachhang $customer) {
        try {
            $conn = $this->sql->connect();
            $queryAccount = "INSERT INTO taikhoan(MaTK, TenDangNhap, MatKhau, TrangThai, URLHinh) VALUES (null, '".$newAccount->getTenDangNhap()."','".$newAccount->getMatKhau()."', 0, '')";
            $conn->query($queryAccount);

            $queryCustomer = "INSERT INTO khachhang(null, 'anonymous customer', '', null, '".$customer->getEmail()."', '".$customer->getSdt()."', '".$this->getAccountByName($newAccount->getTenDangNhap())->getMatk()."') VALUES (value-1 ,value-2 ,value-3 ,value-4 ,value-5 ,value-6 ,value-7)";
            $conn->query($queryCustomer);
            $conn->close();
        } catch (Exception $e) {
            echo "<script>alert('Error');</script>";
            $conn->close();
        }
    }

    public function getAccountByName($username)
    {
        try {
            $conn = $this->sql->connect();
            $query = "select * from taikhoan where TenDangNhap='" . $username . "';";
            $data = $conn->query($query);
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()){
                    $account = new e_taikhoan;
                    $account->setMatk($row["MaTK"]);
                    $account->setTenDangNhap($row["TenDangNhap"]);
                    $account->setMatKhau($row["MatKhau"]);
                    $account->setTrangThai($row["TrangThai"]);
                    $account->setUrlHinh($row["URLHinh"]);
                    $conn->close();
                    return $account;
                }
            } else {
                $conn->close();
                return null;
            }
        } catch (Exception $e) {
            echo "<script>alert('error while check account" . $e . "');</script>";
            $conn->close();
            return null;
        }
    }

    // public function logout(){
    //     setcookie('isLoggedIn', false, path:"/");
    // }

    public function getAccountByID($ID)
    {
        try {
            $conn = $this->sql->connect();
            $query = "select * from taikhoan where MaTK='" . $ID . "';";
            $data = $conn->query($query);
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()){
                    $account = new e_taikhoan;
                    $account->setMatk($row["MaTK"]);
                    $account->setTenDangNhap($row["TenDangNhap"]);
                    $account->setMatKhau($row["MatKhau"]);
                    $account->setTrangThai($row["TrangThai"]);
                    $account->setUrlHinh($row["URLHinh"]);
                    $conn->close();
                    return $account;
                }
            } else {
                $conn->close();
                return null;
            }
        } catch (Exception $e) {
            echo "<script>alert('error while check account" . $e . "');</script>";
            $conn->close();
            return null;
        }
    }

    public function getCustomerByPhone($phone){
        try {
            $conn = $this->sql->connect();
            $query = "select * from khachhang where Sdt='" . $phone . "';";
            $data = $conn->query($query);
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()){
                    $customerInfor = new e_khachhang;
                    $customerInfor->setMaKH($row["MaKH"]);
                    $customerInfor->setTenKH($row["TenKH"]);
                    $customerInfor->setDiaChi($row["DiaChi"]);
                    $customerInfor->setNgaySinh($row["NgaySinh"]);
                    $customerInfor->setEmail($row["Email"]);
                    $customerInfor->setSdt($row["SDT"]);
                    $customerInfor->setMatk($row["MaTK"]);
                    $conn->close();
                    return $customerInfor;
                }
            } else {
                $conn->close();
                return null;
            }
        } catch (Exception $e) {
            echo "<script>alert('error while check account" . $e . "');</script>";
            $conn->close();
            return null;
        }
    }

    public function getCustomerByAccountID($id){
        try {
            $conn = $this->sql->connect();
            $query = "select * from khachhang where MaTK='" . $id . "';";
            $data = $conn->query($query);
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()){
                    $customerInfor = new e_khachhang;
                    $customerInfor->setMaKH($row["MaKH"]);
                    $customerInfor->setTenKH($row["TenKH"]);
                    $customerInfor->setDiaChi($row["DiaChi"]);
                    $customerInfor->setNgaySinh($row["NgaySinh"]);
                    $customerInfor->setEmail($row["Email"]);
                    $customerInfor->setSdt($row["SDT"]);
                    $customerInfor->setMatk($row["MaTK"]);
                    $conn->close();
                    return $customerInfor;
                }
            } else {
                $conn->close();
                return null;
            }
        } catch (Exception $e) {
            echo "<script>alert('error while check account" . $e . "');</script>";
            $conn->close();
            return null;
        }
    }
}
?>