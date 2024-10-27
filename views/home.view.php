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

    <title>Fobia - Bootstrap5 Admin Template</title>
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
                                        <h4 class="title wow fadeInUp">Khu vực và thiết bị </h4>
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
                                                $midleArea = count($v) / 2;
                                            
                                                ?>
                                               
                                                <div class="col-md-5 ">
                                                <?php 
                                                   for($j=0;$j<$midleArea;$j++){
                                                    ?>
                                                       <div class="   d-flex mb-2 align-items-center justify-content-between theme-icons shadow-sm p-2 cursor-pointer rounded">
                                                        <div class="font-22 d-flex align-items-center">
                                                            <?=$v[$j]['image']?>
                                                            <span style="font-size: 15px;" class="ms-1">     <?=$v[$j]['ten_thiet_bi']?></span>
                                                        </div>

                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                            onchange="setTrangThaiThietBi(<?= $v[$j]['id'] ?>)"
                                                            <?php if($v[$j]['trangthai']==1) echo 'checked';   ?>
                                                            type="checkbox" id="statusTrangThai<?=$v[$j]['id']?>">

                                                        </div>
                                                    </div>
                                                    <?php
                                                   }
                                                ?>

                                                 
                                                </div>
                                                <div class="col-md-5">
                                                <?php 
                                                   for($j=$midleArea;$j<count($v);$j++){
                                                    ?>
                                                       <div class="   d-flex mb-2 align-items-center justify-content-between theme-icons shadow-sm p-2 cursor-pointer rounded">
                                                        <div class="font-22 d-flex align-items-center">
                                                            <?=$v[$j]['image']?>
                                                            <span style="font-size: 15px;" class="ms-1">     <?=$v[$j]['ten_thiet_bi']?></span>
                                                        </div>

                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input"
                                                                 onchange="setTrangThaiThietBi(<?= $v[$j]['id'] ?>)"
                                                            <?php if($v[$j]['trangthai']==1) echo 'checked';   ?>
                                                            type="checkbox" id="statusTrangThai<?=$v[$j]['id']?>">

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

                <section id="dashboard-voice" class="portfolio-area mt-2">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-title text-center pb-20">
                                    <h3 class="title">Điều khiển giọng nói</h3>

                                    <form method="post">
                                        <p style="margin-top:14px;margin-bottom:14px;text-align: center;"><button class="cck btn btn-primary" type="button" onclick="speech()"><span>Click vào để nói</span></button> &nbsp; <span id="action"></span></p>
                                        <input class="text-xuly" type="text" id="textt" name="import" value="" style="display:none" />
                                        <input class="button-xuly btn btn-sm btn-info" type="submit" name="btnClick" value="Xử lý"></button>
                                    </form>
                                    <div id="output" class="hide"></div>

                                </div> <!-- row -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </section>

                <!--====== portfolio PART ENDS ======-->

                <!--====== PRINICNG STYLE EIGHT START ======-->

                <section id="parameter" class="pricing-area">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="section-title text-center pb-20">
                                    <h3 class="title">PARAMETER </h3>
                                    <button id="button">Cập nhật dữ liệu</button>
                                </div> <!-- section title -->
                            </div>
                        </div> <!-- row -->
                        <div class="row justify-content-center">

                            <div class="col-lg-4 col-md-7 col-sm-9">
                                <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                    <div class="pricing-icon text-center">
                                        <img src="img/nhietdo.png" alt="" style="width: 120px;">
                                    </div>
                                    <div class="pricing-header text-center">
                                        <h2 class="sub-title">Nhiệt độ: <div id="data1" style="display:inline"> 20</div>
                                        </h2>
                                    </div>
                                    <div class="pricing-btn rounded-buttons text-center">
                                        <img class="<?php echo "$hieuung" ?> " src="img/<?php echo "$img" ?>.png" alt="" style="width: 140px;">
                                    </div>
                                </div> <!-- pricing style one -->
                            </div>

                            <div class="col-lg-4 col-md-7 col-sm-9">
                                <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.8s">
                                    <div class="pricing-icon text-center">
                                        <img src="img/doam.png" alt="" style="width: 120px;">
                                    </div>
                                    <div class="pricing-header text-center">
                                        <h2 class="sub-title">Độ ẩm: <div id="data2" style="display:inline"> <?php echo "$doam"; ?></div>
                                        </h2>
                                    </div>
                                    <div class="pricing-btn rounded-buttons text-center">
                                        <img class="<?php echo "$hieuung" ?>" src="img/<?php echo "$img2" ?>.png" alt="" style="width: 140px;">
                                    </div>
                                </div> <!-- pricing style one -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                </section>
            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">
                Copyright © 2023. All right reserved.
            </div>
        </footer>
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
            </button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
                tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
                        <label class="form-check-label" for="SemiDark">Semi Dark</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end switcher-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->


    <!-- JS Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

    <script src="assets/js/home.js"></script>


</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>