<!DOCTYPE html> 
<?php 
    require_once "mvc/controller/c_admin.php";
    $controller = new c_bill();
    $account = $controller->getAccountInfo_byMaTK("TK001");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/bill1.css">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <title>Hóa đơn</title>
</head>
<body>
<?php require "mvc/view/absolutePart/header.php"; ?>
    <section>
        <?php

            $khachhang = $controller->getUser_byid_inhd(json_decode($_COOKIE["paramObj"])->userid);

            $html = '<div class="infor_column">
            <div class="img_text">
                <div>
                    <img class="infor_img" src="/web2/public/data/'.$account->getUrlHinh().'" alt=""><br>
                </div>
                <div class="infor_text">
                    <p>'.$khachhang->getTenKH().'</p>
                </div>
            </div>
            <div class="infor_personal">
                <img src="/web2/public/data/address.png" alt="">
                <a href="http://localhost/web2/customer?userid='.$khachhang->getMaKH().'">Thông Tin</a>
            </div>
            
            <div class="infor_personal">
                <img src="/web2/public/data/bill.png" alt="">
                <a href="bill?userid='.$khachhang->getMaKH().'">Hóa đơn</a>
            </div>
        </div>';
        echo($html);
        ?>
        
        <div class="infor_bill">
            <h2 class="title_name">Lịch sử mua hàng</h2>
            <a href=""></a>
            <div class="bill">
                <?php 
                    $mang = array();
                    $mang = $controller->getbillid_byMaKH(json_decode($_COOKIE["paramObj"])->userid);
                    foreach($mang as $bill){
                        $html = 
                        '<div class="bill_items2">
                            <div class="bill_details">
                                <div class="id_bill">
                                    <p>' . $bill->getMaHD() . '</p>
                                </div>
                                <button><a href="/web2/billdetail?billid=' . $bill->getMaHD() . '">Xem chi tiết</a></button>
                            </div>';

                            echo($html);

                            $mangsp = array();
                            $mangsp = $controller->getBilldetail_byMaHD_inHD($bill->getMaHD());
                            foreach($mangsp as $sanpham){
                            
                                $data_sp = $controller->getProductInfo_byMaSP($sanpham->getMaSP());
                                $html2 = 
                                '<div class="bill_product">
                                <img class="img_product" src="public/data/' . $data_sp->getHinhAnh() . '" alt="">
                                <div class="product_infor">
                                    <p> ' . $data_sp->getTensp() . '</p>
                                    <p> Số lượng: ' . $sanpham->getSoLuong() . '</p>
                                </div>
                                </div>';
                                echo($html2);
                            };

                            $giaohang = $controller->getDeliveryInfo($bill->getMaHD());

                            $html3 =

                            '<div class="bill_total">
                                <div class="bill_time">
                                    <p>Ngày Lập: ' . $bill->getNgayLap() . '</p>
                                    <p>Ngày Giao: ' . $giaohang->getNgayGiao() . '</p>
                                    <p>Hình thức thanh toán: ' . $bill->getHinhThucTra() . '</p>
                                </div>
                                <div class="bill_tong">
                                    <p>Trạng thái: '.$giaohang->getTinhTrang().'</p>
                                    <p>Thành tiền: '. $bill->getTongGiaGoc() .'</p>
                                </div>
                            </div>
                        </div>';
                        echo($html3);
                    }

                    $mang2 = array("KH002","Momo","2024-01-01 00:00:00",200000); 
                    // $controller->addBill($mang2);  // Thêm hóa đơn mới khi thanh toán

                    $mang3 = array("2024-01-01 00:00:00","2024-01-01 00:00:00", "Đang giao", "Đường A, Phường B","HD003");
                    // $controller->addDeliveryInfo($mang3); // Thêm giao hàng mới kèm theo hóa đơn
                ?>
            </div>
        </div>
    </section>
    <?php require "mvc/view/absolutePart/footer.php"; ?>
</body>
</html>