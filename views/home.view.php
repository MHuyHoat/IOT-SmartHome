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

    <title>HNMU - IOT SmartHome</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        <?php include('views/components/nav.component.php')  ?>
        <!--end sidebar -->

        <!--start top header-->
        <?php include('views/components/header.component.php')  ?>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                <section id="dashboard-button" class="about-area">
                    <form method="post">
                        <div class="container">
                            <div class="row mb-3 ">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="section-title  mt-30 pb-40">
                                        <h4 class="title wow fadeInUp">Dữ liệu nhiệt độ và độ ẩm </h4>
                                    </div> <!-- section title -->
                                </div>
                            </div> <!-- row -->
                            <div class="row">
                                <div class="col-12 col-lg-12 col-xl-6 d-flex">
                                    <div class="card radius-10 w-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <h6 class="mb-0">Độ ẩm trong nhà</h6>
                                                <div class="dropdown options ms-auto">
                                                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                                        <ion-icon name="ellipsis-horizontal-outline" role="img" class="md hydrated" aria-label="ellipsis horizontal outline"></ion-icon>
                                                    </div>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                                        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                                        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                                                <div class="col-lg-7 col-xl-7 col-xxl-7 order-2" style="position: relative;">
                                                    <div id="chart6" style="min-height: 253.7px;">

                                                    </div>
                                                    <div class="resize-triggers">
                                                        <div class="expand-trigger">
                                                            <div style="width: 286px; height: 255px;"></div>
                                                        </div>
                                                        <div class="contract-trigger"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-xl-5 col-xxl-5">
                                                    <div class="">
                                                        <div class="mb-4">
                                                            <h2 class="mb-0">Độ ẩm hiện tại</h2>
                                                            <p class="mb-0">Theo thời gian thực</p>
                                                        </div>
                                                        <div class="d-flex align-items-start gap-3 mb-3">
                                                            <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                                <ion-icon name="gift-outline" role="img" class="md hydrated" aria-label="gift outline"></ion-icon>
                                                            </div>
                                                            <div>
                                                                <p class="mb-1">Số lượng thiết bị ghi </p>
                                                                <p class="mb-0 h5">1</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-start gap-3 mb-3">
                                                            <div class="widget-icon-small rounded bg-light-info text-info">
                                                                <ion-icon name="briefcase-outline" role="img" class="md hydrated" aria-label="briefcase outline"></ion-icon>
                                                            </div>
                                                            <div>
                                                                <p class="mb-1">Ghi lại dữ liệu độ ẩm </p>
                                                                <p class="mb-0 h5">Có</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 d-flex">
                                    <div class="card radius-10 overflow-hidden w-100">
                                        <div class="card-body">
                                            <div class="d-flex flex-column gap-3">
                                                <div class="card border shadow-none radius-10 flex-grow-1 mb-0">
                                                    <div class="card-body" style="position: relative;">
                                                        <div class="d-flex align-items-start gap-2">
                                                            <div>
                                                                <h5 class="mb-0 ">Nhiệt độ trong ngày</h5>
                                                            </div>
                                                            <div class="ms-auto widget-icon-2 text-white bg-info rounded-circle">
                                                                <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <h3 class="mb-2">Hiện tại :  <?=  $thietBiNhietDo['du_lieu'] ?></h3>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <div class="widget-icon-small bg-light-danger text-danger">
                                                                    <ion-icon name="arrow-down-outline" role="img" class="md hydrated" aria-label="arrow down outline"></ion-icon>
                                                                </div>
                                                                <p class="mb-0">+9% so với ngày hôm qua</p>
                                                            </div>
                                                        </div>
                                                        <div id="chart4" style="min-height: 80px;">

                                                        </div>
                                                        <div class="resize-triggers">
                                                            <div class="expand-trigger">
                                                                <div style="width: 295px; height: 243px;"></div>
                                                            </div>
                                                            <div class="contract-trigger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card border shadow-none radius-10 mb-0">
                                                    <div class="card radius-10 mb-0">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-start gap-2">
                                                                <div>
                                                                    <p class="mb-0 fs-6">Số lượng thiết bị theo dõi </p>
                                                                </div>
                                                                <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                                                                    <ion-icon name="bar-chart-outline" role="img" class="md hydrated" aria-label="bar chart outline"></ion-icon>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center mt-3">
                                                                <div>
                                                                    <h4 class="mb-0"> <?= count($dataThietBi)?> thiết bị </h4>
                                                                </div>
                                                           
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="col-xl-6 col-lg-8">
                                    <div class="section-title  mt-30 pb-40">
                                        <h4 class="title wow fadeInUp"> Các thiết bị trong nhà  </h4>
                                    </div> <!-- section title -->
                                </div>
                            </div> <!-- row -->
                            <div class="d-flex">
                                <div id="khuVuc" class="d-flex flex-wrap w-100">
                                    <?php
                                    foreach ($dataThietBiKhuVuc ?? [] as $k => $v) {
                                    ?>
                                        <div class="area">
                                            <div class="title">
                                                <i class="fadeIn animated bx bx-door-open"></i>
                                                <span style="font-size: 15px; font-weight:bold"> <?= $v[0]['ten_khu_vuc'] ?> </span>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $midleArea =  count($v)>2? ((int)( count($v) / 2)):count($v);

                                                ?>

                                                <div class="col-md-5 <?=$midleArea?> ">
                                                    <?php
                                                    for ($j = 0; $j < $midleArea; $j++) {
                                                    ?>
                                                        <div class="   d-flex mb-2 align-items-center justify-content-between theme-icons shadow-sm p-2 cursor-pointer rounded">
                                                            <div class="font-22 d-flex align-items-center">
                                                                <?= $v[$j]['image'] ?>
                                                                <span style="font-size: 15px;" class="ms-1"> <?= $v[$j]['ten'] ?></span>
                                                            </div>

                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input"

                                                                    onchange="setTrangThaiThietBi(<?= $v[$j]['id'] ?>)"
                                                                    <?php if ($v[$j]['trangthai'] == 1) echo 'checked';   ?>
                                                                    <?php if ($v[$j]['permission_type'] == 'view') echo 'disabled';   ?>
                                                                    type="checkbox" id="statusTrangThai<?= $v[$j]['id'] ?>">

                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>


                                                </div>
                                                <div class="col-md-5">
                                                    <?php
                                                    for ($j = $midleArea; $j < count($v); $j++) {
                                                    ?>
                                                        <div class="   d-flex mb-2 align-items-center justify-content-between theme-icons shadow-sm p-2 cursor-pointer rounded">
                                                            <div class="font-22 d-flex align-items-center">
                                                                <?= $v[$j]['image'] ?>
                                                                <span style="font-size: 15px;" class="ms-1"> <?= $v[$j]['ten'] ?></span>
                                                            </div>

                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input"
                                                                    onchange="setTrangThaiThietBi(<?= $v[$j]['id'] ?>)"
                                                                    <?php if ($v[$j]['trangthai'] == 1) echo 'checked';   ?>
                                                                    <?php if ($v[$j]['permission_type'] == 'view') echo 'disabled';   ?>
                                                                    type="checkbox" id="statusTrangThai<?= $v[$j]['id'] ?>">

                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>



                                </div>

                            </div>
                        </div> <!-- container -->
                    </form>

                </section>

                <!--====== ABOUT PART ENDS ======-->

                <!--====== portfolio PART START ======-->



                <!--====== portfolio PART ENDS ======-->


            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <?php include('views/components/footer.component.php'); ?>

        <script src="assets/js/home.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>