<?php 
    require_once "mvc/controller/c_admin.php";
    
?>

<div style="max-width: 25%;" class="border-end border-1 border-light border-dash bg-dark text-main">
    <div class="collapse collapse-horizontal show vh-100 p-0 px-3 overflow-scroll" style="overflow-x: hidden !important;" id="adminSideBar">

        <div class="container position-sticky top-0 bg-dark" style="z-index:100;">
            <div class="row">
                <div class="col-12 my-3">
                    <h2><label>Watch <span class="text-second">Store</span></label></h2>
                </div>
            </div>

            <div class="row align-items-center rounded-4 pt-3 bg-golden-jelly">
                <div class="col-3 img-flu"><img src="/web2/composition/logotest.jpg" class="rounded-circle" alt=".">
                </div>

                <div class="col-6 text-start">
                    <b class="name">Tuấn Hào</b>
                    <div class="role"><i>Chúa</i></div>
                </div>

                <div class="col-3 text-center">
                    <a data-bs-toggle="collapse" data-bs-target="#accountSetting" aria-controls="accountSetting" aria-label="Toggle navigation" aria-expanded="false" class="btn text-main border-main text-lg">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col-12 mt-3">
                    <div class="collapse" id="accountSetting">
                        <ul class="list-style-none">
                            <li>
                                <a>
                                    <i class="bi bi-person-fill-gear"></i> <span>Account</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <i class="bi bi-power"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row my-3">
                <div class="col-12">
                    <div class="text-second">Products</div>
                    <ul class="list-style-none list-group p-0 rounded-3">
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/products?func=update">
                                <i class="bi bi-tools"></i> Update

                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/products?func=add">
                                <i class="bi bi-patch-plus"></i> Add
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/products?func=delete">
                                <i class="bi bi-trash3"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12">
                    <div class="text-second">User</div>
                    <ul class="list-style-none list-group p-0 rounded-3">
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/users">
                                <i class="bi bi-tools"></i> Update
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/users">
                                <i class="bi bi-patch-plus"></i> Add
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/users">
                                <i class="bi bi-trash3"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12">
                    <div class="text-second">Accounts</div>
                    <ul class="list-style-none list-group p-0 rounded-3">
                        <li class="d-flex list-group-item">
                            <a>
                                <i class="bi bi-tools"></i> Update
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a>
                                <i class="bi bi-patch-plus"></i> Add
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a>
                                <i class="bi bi-trash3"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <div class="text-second">Statistic</div>
                    <ul class="list-style-none list-group p-0 rounded-3">
                        <li class="d-flex list-group-item">
                            <a class="flex-fill" href="/web2/admin/statistic">
                                <i class="bi bi-tools"></i> Statistic

                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12">
                    <div class="text-second">Bills</div>
                    <ul class="list-style-none list-group p-0 rounded-3">
                        <li class="d-flex list-group-item">
                            <a>
                                <i class="bi bi-tools"></i> Update
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a>
                                <i class="bi bi-patch-plus"></i> Add
                            </a>
                        </li>
                        <li class="d-flex list-group-item">
                            <a>
                                <i class="bi bi-trash3"></i> Delete
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_URI"] != "/web2/admin/products") {
    if (isset($_COOKIE["paramObj"])) {
        if (isset(json_decode($_COOKIE["paramObj"])->func)) {
            $tmpString = ".list-group-item:has(a[href='/web2/admin/products?func=" . json_decode($_COOKIE["paramObj"])->func . "']";
            echo '<script>document.querySelector("' . $tmpString . '").classList.add("active");</script>';
        }
    }
}
?>