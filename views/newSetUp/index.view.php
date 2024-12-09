<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:54:47 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <?php
    include('views/components/head.component.php')
    ?>
    <link href="assets/css/newSetUp.css" rel="stylesheet" />

    <title>HNMU - IOT SmartHome</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper toggled">

        <!--start sidebar -->

        <!--end sidebar -->

        <!--start top header-->
        <?php include('views/components/header.component.php')  ?>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">


            <!-- start page content-->
            <div class="page-content">
                <!--start breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"> Thiết lập mới </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Cài đặt dữ liệu cho ngôi nhà của bạn </li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->

                <div class="page-content">
                    <div id="container" class="container mt-5">



                        <form action="?action=them-moi" method="POST" id="multi-step-form">


                            <!-- Step 2 form fields here -->
                            <h3>Nhập dữ liệu bên dưới </h3>
                            <div class="mb-3">
                                <div class="col-12 mt-2 ">
                                    <label for="inputPassword" class="form-label"> <i class="lni lni-apartment"></i> Tên nhà </label>
                                    <input type="text" name="ten_nha" class="form-control" placeholder="Nhập tên nhà">
                                </div>
                                <div class="col-12 mt-2 " id="khuvuc">
                                    <div class="col-12 mt-2 ">
                                        <label for="inputPassword" class="form-label"> <i class="lni lni-page-break"></i> Tên phòng (Khu vực lắp đặt ) </label>
                                        <input type="text" name="ten_khuvuc[]" class="form-control" placeholder="Tên phòng">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="themKhuVuc()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <span>Thêm khu vực</span>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div>
                                    <button type="button" onclick="window.history.back()" class="btn btn-primary prev-step" class="btn btn-primary prev-step">Hủy</button>
                                </div>
                                <div class="ms-2">
                                    <button type="submit" class="btn btn-success">Hoàn thành</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
                <!-- end page content-->
            </div>

            <!--end page content wrapper-->



            <?php include('views/components/footer.component.php'); ?>

            <script src="assets/js/home.js"></script>
            <script src="assets/js/newSetUp.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>