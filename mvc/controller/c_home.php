<?php
class c_home{
    protected $url;
    public function __construct($url = null) {
        if ($url !== null) {
            require_once "mvc/view/user/v_" . $url . ".php";
        }
    }
}
?>