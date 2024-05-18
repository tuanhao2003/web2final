<?php 
    $controller = new c_customersManage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <script src="/web2/public/js/index.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Manage</title>
</head>

<body>
    <section>
        <div class="d-flex">
            <?php require "mvc/view/absolutePart/adminSideBar.php"; ?>
            <div class="dataContainer">
                <?php echo $controller->getAllUsers();?>
                <div class="tools">
                    <h1 style="color: white">Núc 1</h1>
                    <h1 style="color: white">Núc 2</h1>
                    <h1 style="color: white">Núc 3</h1>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

<style>
    .adminSideBar li:nth-child(1){
        background-color: black;
    }

    .adminSideBar li:nth-child(1) a{
        color: white;
    }
</style>