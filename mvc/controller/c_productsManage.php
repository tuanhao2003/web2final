<?php
class c_productsManage
{
    protected $repository;
    public function __construct()
    {
        require_once "mvc/model/m_productsManage.php";
        require_once "mvc/entity/e_sanpham.php";
        $this->repository = new m_productsManage();
    }

    public function getProduct($params)
    {
        $dataToHTML = "";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (!empty($params->id)) {
                $id = $params->id;
                $data = $this->repository->getProduct($id);
                if (!empty($data)) {
                    $status = $data->getTrangThaiTonTai() == 0 ? 'unchecked' : 'checked';
                    $dataToHTML .= '<tr>
                    <td><div><img class="img-flu" alt="noImg" src="' . $data->getHinhAnh() . '"></div></td>
                    <td style="display:none;"><p>' . $data->getMasp() . '</p></td>
                    <td><p>' . $data->getTensp() . '</p></td>
                    <td><p>' . $data->getDonGia() . '</p></td>
                    <td><p>' . $data->getMoTa() . '</p></td>
                    <td><p>' . $data->getMaHang() . '</p></td>
                    <td>
                        <label class="toggle">
                            <input class="statusSetToggle" type="checkbox" ' . $status . '>
                            <span class="toggleCircle"></span>
                        </label>
                    </td>
                </tr>';
                }
            }
        }
        return $dataToHTML;
    }
    public function getAllProducts()
    {
        $dataToHTML = "";
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $data = $this->repository->getAllProducts();
            if (!empty($data)) {
                foreach ($data as $product) {
                    $status = $product->getTrangThaiTonTai() == 0 ? 'unchecked' : 'checked';
                    $dataToHTML .= '
                        <div class="card mb-3 border-0 text-center">
                            <div class="row m-0 text-black py-3 align-items-center">
                                <div class="col-2">
                                    <div><img class="img-flu" alt="noImg" src="' . $product->getHinhAnh() . '"></div>
                                </div>
                                <div class="col-1 masp"><p>' . $product->getMasp() . '</p></div>
                                <div class="col-2 tensp"><p>' . $product->getTensp() . '</p></div>
                                <div class="col-2 dongia"><p>' . $product->getDonGia() . '</p></div>
                                <div class="col-1 mahang"><p>' . $product->getMaHang() . '</p></div>
                                <div class="col-2 mota"><p>' . $product->getMoTa() . '</p></div>
                                <div class="col-1 trangthai">
                                    <label class="toggle">
                                        <input class="statusSetToggle" type="checkbox" ' . $status . '>
                                        <span class="toggleCircle"></span>
                                    </label>
                                </div>
                                <div class="col-1 mota"><a class="btn delBtn btn-danger"><i class="bi bi-trash"></i></a></div>
                            </div>
                        </div>
                    ';
                }
            }
        }
        return $dataToHTML;
    }

    public function addProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sanpham = new e_sanpham();
            $sanpham->setMasp($_POST['masp']);
            $sanpham->setTensp($_POST['tensp']);
            $sanpham->setDonGia($_POST['donGia']);
            $sanpham->setMoTa($_POST['moTa']);
            $sanpham->setHinhAnh($_POST['hinhAnh']);
            $sanpham->setTrangThaiTonTai(1);
            $sanpham->setMaHang($_POST['maHang']);

            $success = $this->repository->addProduct($sanpham);
            if ($success) {
                echo "<script>alert('Add product successfully')</script>";
                header("Location: /web2/admin/products?func=update");
            } else {
                echo "<script>alert('That product was 
                existing')</script>";
            }
        }
    }

    public function deleteProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $success = $this->repository->deleteProduct($_POST['masp']);
            if ($success) {
                echo "<script>alert('Delete successfully')</script>";
                header("Location: /web2/admin/products?func=delete");
            } else {
                echo "<script>alert('Some error while deleting')</script>";
            }
        }
    }
    public function updateProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sanpham = new e_sanpham();
            $sanpham->setMasp($_POST['masp']);
            $sanpham->setTensp($_POST['tensp']);
            $sanpham->setDonGia($_POST['donGia']);
            $sanpham->setMoTa($_POST['moTa']);
            $sanpham->setHinhAnh($_POST['hinhAnh']);
            $sanpham->setTrangThaiTonTai($_POST['trangThai']);
            $sanpham->setMaHang($_POST['maHang']);
           
            $success = $this->repository->updateProduct($sanpham);
            if ($success) {
                echo "<script>alert('update successfully')</script>";
                header("Location: /web2/admin/products?func=update");
            } else {
                echo "<script>alert('Some error while updating')</script>";
            }
        }
    }
}
?>