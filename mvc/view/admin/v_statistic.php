<!DOCTYPE html>
<html lang="en">
<?php 
    // require_once "mvc/controller/c_admin.php";
    $controller = new c_statistic();
    
    // $controller2 = new c_billdetail();
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/web2/public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body id="page-op">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Money Bill</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                        echo $controller->getTongTienHoaDon(); // Đoạn mã PHP để lấy tổng số tiền hóa đơn
                                                    ?>
                                                    USD
                                                </div>

                                        </div>
                                        
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Count Bill</div>
                                            <?php
                                                    $html = 
                                                    '<div class="h5 mb-0 font-weight-bold text-gray-800">'. $controller->getCountBill() .'
                                                     BILL</div>';
                                                    echo($html);
                                            ?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Customer</div>
                                                <?php
                                                    $html = 
                                                    '<div class="h5 mb-0 font-weight-bold text-gray-800">'. $controller->getCountCustomers() .'
                                                     Customer </div>';
                                                    echo($html);
                                            ?>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 ">
                        <div class="col-5">
                            <label>Ngày Bắt Đầu: </label>
                            <input type="date" id="StartDateChoice" class="form-control bg-light border-0 small"
                                    aria-describedby="basic-addon2">
                        </div>
                        <div class="col-5">
                            <label>Ngày Kết Thúc: </label>&nbsp&nbsp&nbsp
                            <input type="date" id="EndDateChoice" class="form-control bg-light border-0 small"
                                    aria-describedby="basic-addon2">
                        </div>
                        
                    </div>
                    <div>
                    <h1>Danh Sách Top 5 Khách Hàng Mua Nhiều Nhất</h1>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-pagination="false">
	                                <thead>
		                                <tr>
                                            <td>Số Thứ Tự</td>
		                                    <th>Mã Khách Hàng</th>
		                                    <th>Tên Khách Hàng</th>
		                                    <!-- <th>Email</th>
		                                    <th>SDT</th> -->
		                                    <th>Tổng số tiền mua hàng</th>
		                                </tr>
	                                </thead>
	                                <tbody>
                                        <?php
                                            $mang = array();
                                            $mang = $controller->KiemTraNgay();
                                            $i = 0;
                                            
                                            foreach ($mang as $kh) {
                                                $i = $i + 1;
                                                $html = '
                                                    <tr>
                                                        <td>' . $i . '</td>
                                                        <td>' . $kh->getMaKH() . '</td>
                                                        <td>' . $controller->getTenKHById($kh->getMaKH()) . '</td>
                                                        <td>' . $controller->getTongTien($kh->getMaKH()) . '</td>
                                                    </tr>';
                                                    
                                                echo $html;
                                                
                                            }
                                        ?>

	                                </tbody>
	                            </table>
                                
                        <h1>Danh Sách Những Khách Hàng Mua Hàng</h1>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-pagination="false">
	                                <thead>
		                                <tr>
                                            <th>Số Thứ Tự</th>
		                                    <th>Mã Khách Hàng</th>
		                                    <th>Tên Khách Hàng</th>
		                                    <!-- <th>Email</th>
		                                    <th>SDT</th> -->
		                                    <th>Tổng số tiền mua hàng</th>
		                                </tr>
	                                </thead>
	                                <tbody>
                                        <?php
                                            $mang = array();
                                            $mang = $controller->getAllTop5();
                                            $tongtien = $controller->getTongTien("KH001");
                                            $i = 0;
                                            
                                            foreach($mang as $kh){
                                                $i=$i+1;
                                                $html = 
                                                '<tr>
                                                    <td ">'. $i .'</td>
                                                    <td ">'. $kh->getMaKH() .'</td>
                                                    <td ">'. $kh->getTenKH() .'</td>
                                                    <td ">'. $controller->getTongTien($kh->getMaKH()) .'</td>
                                                </tr>';
                                                   
                                                    echo($html);}
                                        ?>
	                                </tbody>
	                            </table>
                                <h1>Danh Sách các đơn hàng</h1>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-pagination="false">
	                                <thead>
		                                <tr>
                                            <th>Số Thứ Tự</th>
		                                    <th>Mã Hóa Đơn</th>
		                                    <th>Mã Khách Hàng</th>
                                            <th>Hình Thức Trả</th>
                                            <th>Ngày Lập</th>
                                            <th>Tổng giá gốc</th>
                                            <th>Chi tiết hóa đơn</th>
		                                </tr>
	                                </thead>
	                                <tbody>
                                        <?php
                                            $mang = array();
                                            $mang = $controller->getAllbillS();
                                            $i = 0;        
                                            foreach($mang as $bill){
                                                $i=$i+1;
                                                $html = 
                                                '<tr>
                                                    <td ">'. $i .'</td>
                                                    <td ">'. $bill->getMaHD() .'</td>
                                                    <td ">'. $bill->getMaKH() .'</td>
                                                    <td ">'. $bill->getHinhThucTra() .'</td>
                                                    <td ">'. $bill->getNgayLap() .'</td>
                                                    <td ">'. $bill->getTongGiaGoc() .'</td>
                                                    <td>
                                                        <a href="/web2/billdetail?billid=' . $bill->getMaHD() . '"  class="btn btn-primary btn-circle btn-lg"> <!-- Thay đổi màu nền của nút thành màu xanh dương -->
                                                            <i class="fas fa-toolbox"></i> <!-- Sử dụng biểu tượng "toolbox" thay vì "pencil-alt" -->
                                                        </a>
                                                    </td>
                                                </tr>';
                                                   
                                                    echo($html);}
                                        ?>
	                                </tbody>
	                            </table>
                    </div>

                    <!-- Content Row -->

                    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- <script>
        // Lắng nghe sự kiện khi giá trị của trường nhập ngày thay đổi
        document.getElementById("StartDateChoice").addEventListener("change", function() {
            sendDataToController();
        });

        document.getElementById("EndDateChoice").addEventListener("change", function() {
            alert("Đã gửi dữ liệu");
            sendDataToController();
        });

        // Hàm để gửi dữ liệu ngày đến bên controller bằng AJAX
        function sendDataToController() {
            var startDate = document.getElementById("StartDateChoice").value;
            var endDate = document.getElementById("EndDateChoice").value;

            // Tạo đối tượng XMLHTTPRequest
            var xhr = new XMLHttpRequest();

            // Mở kết nối với bên controller
            xhr.open("POST", "mvc/controller/c_statistic.php", true);

            // Thiết lập tiêu đề của request để thông báo về loại dữ liệu được gửi đi
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            // Gửi dữ liệu ngày đến bên controller
            xhr.send("startDate=" + startDate + "&endDate=" + endDate);
        }

    </script> -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("StartDateChoice").addEventListener("change", function() {
            sendDataToController();
        });

        document.getElementById("EndDateChoice").addEventListener("change", function() {
            sendDataToController();
        });
    });

    function sendDataToController() {
        var startDate = document.getElementById("StartDateChoice").value;
        var endDate = document.getElementById("EndDateChoice").value;

        let url = "http://localhost/web2/admin/statistic";
        let params = new URLSearchParams({ startDate : startDate , endDate: endDate  }); 
        fetch(url, { method: "POST", headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
        body: params.toString() 
        })
        .then(response => response.text())
            .then(data => {
                alert(data); // Hiển thị phản hồi từ PHP
            })
            .catch(err => alert("Lỗi: " + err));
        }

</script>


</body>

</html>