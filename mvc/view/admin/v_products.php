<?php
$controller = new c_productsManage();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add'])) {
        $controller->addProduct();
    }

    if (isset($_POST['update'])) {
        $controller->updateProduct();
    }

    if (isset($_POST['delete'])) {
        $controller->deleteProduct();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <script src="/web2/public/js/productsManage.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- #####bs5##### -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- ############ -->

    <title>Manage</title>
</head>

<body>
    <section>
        <div class="container-fluid p-0">
            <div class="row h-100 w-100">
                <div class="col-12 p-0">
                    <div class="d-flex h-100">

                        <?php require "mvc/view/absolutePart/adminSideBar.php"; ?>

                        <div class="w-100 vh-100">
                            <div class="row w-100 align-items-center bg-dark" style="height: 10%;">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex justify-content-start">
                                            <a class="btn btn-light h-100 bg-transparent text-light sideBarControl border-second"
                                                data-bs-toggle="collapse" data-bs-target="#adminSideBar"
                                                aria-controls="adminSideBar" aria-label="Toggle navigation"
                                                aria-expanded="true">
                                                <i class="bi bi-caret-left-fill"></i>
                                            </a>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <a class="btn toggle">
                                                <i class="bi bi-lightbulb text-main text-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-fill overflow-scroll" style="overflow-x: hidden !important; height: 90%;">
                                <div class="row addFunction d-none">
                                    <div class="col-12">
                                        <form method="POST" class="productForm">

                                            <div class="container text-black">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <h2>Add Product</h2>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-key"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <input type="text" name="masp" required>
                                                                <label>ID</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-tag"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <input type="text" name="tensp" required>
                                                                <label>Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-cash"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <input type="text" name="donGia" required>
                                                                <label>Price</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-keypad"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <select name="maHang">
                                                                    <option value="H001">H001</option>
                                                                    <option value="H002">H002</option>
                                                                    <option value="H003">H003</option>
                                                                </select>
                                                                <label>Type Product</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-reader"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <input type="text" name="moTa">
                                                                <label>Describe</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-reader"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <input type="text" name="hinhAnh" hidden>
                                                                <div class="img-area" data-img="hello.png">
                                                                    <i class='bx bxs-cloud-upload icon'></i>
                                                                    <h3>Upload Image</h3>
                                                                    <p>Image size must be less than <span>2MB</span></p>

                                                                </div>
                                                                <input type="text" name="trangThai" class="d-none">
                                                                <button class="select-image">Select Image</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-1 text-center"><i class="bi bi-reader"></i>
                                                            </div>
                                                            <div class="col-5">
                                                                <button type="submit" class="btn btn-submit"
                                                                    name="add">Add</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                                <div class="row w-100 d-none updateFunction">
                                    <div class="col-12">
                                        <div class="dataContainer">
                                            <div
                                                class="card mb-3 text-center border-0 rounded-0 border-bottom border-light text-second">
                                                <div class="row m-0">
                                                    <div class="col-2">
                                                        <h5>
                                                            Image
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            ID
                                                        </h5>
                                                    </div>
                                                    <div class="col-2">
                                                        <h5>
                                                            Name
                                                        </h5>
                                                    </div>
                                                    <div class="col-2">
                                                        <h5>
                                                            Price
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            Type
                                                        </h5>
                                                    </div>
                                                    <div class="col-2">
                                                        <h5>
                                                            Description
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            Status
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            Delete
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo $controller->getAllProducts(); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="row w-100 d-none deleteFunction">
                                    <div class="col-12">
                                        <div class="dataContainer">
                                            <div
                                                class="card mb-3 text-center border-0 rounded-0 border-bottom border-light text-second">
                                                <div class="row m-0">
                                                    <div class="col-2">
                                                        <h5>
                                                            Image
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            ID
                                                        </h5>
                                                    </div>
                                                    <div class="col-2">
                                                        <h5>
                                                            Name
                                                        </h5>
                                                    </div>
                                                    <div class="col-2">
                                                        <h5>
                                                            Price
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            Type
                                                        </h5>
                                                    </div>
                                                    <div class="col-3">
                                                        <h5>
                                                            Description
                                                        </h5>
                                                    </div>
                                                    <div class="col-1">
                                                        <h5>
                                                            Delete
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo $controller->getAllProducts(); ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script>
    (function () {
        document.addEventListener("DOMContentLoaded", function () {
            <?php
            echo 'let func = document.querySelector(".' . json_decode($_COOKIE["paramObj"])->func . 'Function");
                if(func!=null){
                    func.classList.remove("d-none");
                }
                document.querySelector(".productForm .btn-submit").name="' . json_decode($_COOKIE["paramObj"])->func . '"';
            ?>
    });
    })();
</script>
