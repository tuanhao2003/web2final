<!DOCTYPE html> 
<?php
    require_once "mvc/controller/c_admin.php";
    $controller = new c_customer();
    $userid = json_decode($_COOKIE["paramObj"])->userid;
    $data = $controller->getUser_byid($userid);
    $account = $controller->getAccountInfo_byMaTK($data->getMaTK());
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fileName = $_POST["fileName"];
        $controller->updateAccountImageUrl($data->getMaTK(), $fileName);
        
        if (isset($_POST['update_cus'])) {
            $controller->save_info();
        }
    }

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">

    <link rel="stylesheet" href="/web2/public/css/customer.css">
    <title>Information_Customer</title>
</head>
<body >
    <?php require "mvc/view/absolutePart/header.php"; ?>
    <section>

        <?php
            $html = '<div class="infor_column">
            <div class="img_text">
                <div>
                    <img class="infor_img" src="/web2/public/data/'.$account->getUrlHinh().'" alt=""><br>
                </div>
                <div class="infor_text">
                    <p>'.$data->getTenKH().'</p>
                </div>
            </div>
            <div class="infor_personal">
                <img src="/web2/public/data/address.png" alt="">
                <a href="http://localhost/web2/customer?userid='.$data->getMaKH().'">Thông Tin</a>
            </div>

            <div class="infor_personal">
                <img src="/web2/public/data/bill.png" alt="">
                <a href="bill?userid='.$data->getMaKH().'">Hóa đơn</a>
            </div>
        </div>';

        echo($html);
        
            $html = 
            '<div class="information_customer">
                <div class="information_customer_text">
                    <form method = "POST">
                    <h1 class="title_form">Thông tin khách hàng</h1>
                        <table>
                            <tr><input type="text" style="display:none" name="userid" value="'.$userid.'" required><br>
                                    
                                <td class="td_name">
                                    <label for="username">Tên</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="name" name="name" value="'.$data->getTenKH().'" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="email">Email</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="email" name="email" value="'.$data->getEmail().'" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="address">Địa chỉ</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="address" name="address" value="'.$data->getDiaChi().'"><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="SĐT">Số điện thoại</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="SĐT" name="phone" value="'.$data->getSdt().'"><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="ngaysinh">Ngày sinh</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="date" name="ngaysinh" value="'.$data->getNgaySinh().'"><br>
                                </td>
                            </tr>
                        </table>
                        <button class="save_btn" type="submit" name="update_cus">Cập nhật</button>
                        
                    </form>
                </div>
                <div class="information_customer_image">
                    <img id="selectedImage" src="/web2/public/data/'.$account->getUrlHinh().'" alt=""><br>
                    <button id="selectImageBtn">Chọn ảnh</button>
                    <input type="file" id="fileInput" style="display: none;" accept=".jpg, .jpeg, .png">
                    <div>
                        <p>Dung lượng file tối đa 1MB</p>
                        <p>Định dạng: JPG, PNG</p>
                    </div>
                </div>
            </div>';

            echo($html);
            // $controller->updateAccountImageUrl($data->getMaTK(),"url ảnh")

    ?>
    </section>

<script>

var selectedFileName = ""; // Biến để lưu trữ tên của file được chọn


document.getElementById('selectImageBtn').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    if (file) {
        selectedFileName = file.name; // Lưu trữ tên của file trong biến selectedFileName
        document.getElementById('selectedImage').src = URL.createObjectURL(file);
        alert("Tên của ảnh: " + selectedFileName);
    }
});


    document.querySelector('[name="update_cus"]').addEventListener('click', function(event) {

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'updateImageUrl.php'); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Xử lý phản hồi từ server nếu cần
        }
    };
    xhr.send('fileName=' + selectedFileName); // Gửi tên của file dưới dạng tham số POST
});


</script>


    <?php require "mvc/view/absolutePart/footer.php"; ?>
</body>
</html>