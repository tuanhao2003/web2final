<?php
class c_admin
{
    public function __construct($url = null)
    {
        if ($url !== null) {
            require_once "mvc/view/admin/v_" . $url . ".php";
        }
    }
    // để controller lên trước view để được load trước

    public function login()
    {
        require_once "mvc/controller/c_login.php";
        require_once "mvc/view/absolutePart/v_login.php";
    }

    public function users()
    {
        require_once "mvc/controller/c_customersManage.php";
        require_once "mvc/view/admin/v_customers.php";
    }

    public function products()
    {
        require_once "mvc/controller/c_productsManage.php";
        require_once "mvc/view/admin/v_products.php";
    }

    public function test()
    {
        require_once "mvc/view/admin/v_test.php";
    }
    public function statistic()
    {
        require_once "mvc/controller/c_productsManage.php";
        require_once "mvc/view/admin/v_products.php";
    }
}
