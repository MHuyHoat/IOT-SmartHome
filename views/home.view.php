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

                

                <!--====== portfolio PART ENDS ======-->

            
            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


  <?php include('views/components/footer.component.php');?>

  <script src="assets/js/home.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>