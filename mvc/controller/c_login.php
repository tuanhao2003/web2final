<?php
class c_login{
    protected $m_login;
    public function __construct(){
        require_once "mvc/model/m_login.php";
        require_once "mvc/entity/e_taikhoan.php";
        require_once "mvc/entity/e_khachhang.php";
        $this->m_login = new m_login();
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $this->m_login->login($username, $password);
        }
    }

    public function register(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer = $this->m_login->getCustomerByPhone($_POST['phone']);
            if($customer != null){
                $account = $this->m_login->getAccountByID($customer->getMaTK());
                if($account != null){
                    echo "<script>alert('Customer with phone number ".$customer->getSdt()." already registed account, please login')</script>";
                    echo "<script>document.querySelector('a .login-link').click();</script>";
                }else{
                    $account = new e_taikhoan();
                    $account->setTenDangNhap($_POST['registAccount']);
                    $account->setMatKhau($_POST['registPass']);
                    $this->m_login->register($account, $customer);
                }
            }else{
                $account = new e_taikhoan();
                $customer = new e_khachhang();
                $customer->setEmail($_POST['email']);
                $customer->setSdt($_POST['phone']);
                $account->setTenDangNhap($_POST['registAccount']);
                $account->setMatKhau($_POST['registPass']);
                $this->m_login->register($account, $customer);
            }
        }
    }
}
?>