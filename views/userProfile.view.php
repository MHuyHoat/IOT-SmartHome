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

             <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Pages</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Hồ sơ người dùng</li>
                  </ol>
                </nav>
              </div>
              <div class="ms-auto">
                <div class="btn-group">
                  <button type="button" class="btn btn-outline-primary">Cài đặt</button>
                  <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                  </div>
                </div>
              </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
              <div class="col-12 col-lg-8 col-xl-9">
                <div class="card overflow-hidden radius-10">
                  <div class="profile-cover bg-dark position-relative mb-4">
                    <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                      <img src="assets/images/avatars/0<?=(int)$_SESSION['USER_ID']%10?>.png" alt="...">
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="mt-5 d-flex align-items-start justify-content-between">
                      <div class="">
                        <h3 class="mb-2"> <?= $user['hoten'] ?> </h3>
                        <p class="mb-1" style="display: flex; align-items: center; justify-content: center;"  ><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16";>
  <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
  <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
</svg> <span style="margin-left:8px">Email: <?= $user['email'] ?></span></p>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="card">
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
                                                                    <h5 class="mb-0"> <?= count($dataThietBi)?> thiết bị </h5>
                                                                </div>
                                                           
                                                            </div>
                </div>
                </div>
                <div class="card">
                <div class="card-body">
                                                            <div class="d-flex align-items-start gap-2">
                                                                <div>
                                                                    <p class="mb-0 fs-6">Số lượng tài khoản con </p>
                                                                </div>
                                                                <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                                                                <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center mt-3">
                                                                <div>
                                                                    <h5 class="mb-0"> <?= ($soTK)?> tài khoản </h5>
                                                                </div>
                                                           
                                                            </div>
                </div>
                </div>
              </div>
              <div class="col-12 col-lg-4 col-xl-3">
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="mb-3">Thuộc nhà</h5>
                     <p class="mb-0"><ion-icon name="compass-sharp" class="me-2 md hydrated" role="img" aria-label="compass sharp"></ion-icon><?= $dataNha['ten']?></p>
                  </div>
                </div>

                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="mb-3">Thông tin</h5>
                     <p class=""><ion-icon name="globe-sharp" class="me-2 md hydrated" role="img" aria-label="globe sharp"></ion-icon>Quyền điều khiển: <?= count($quyenUser)?> thiết bị</p>
<ul class="list-group">
    <?php foreach ($soluong as $thietbi) { ?>
        <li class="list-group-item">
        <i class="bi bi-lightning-fill"></i><?php echo $thietbi['ten']; ?>: <?php echo $thietbi['device_count']; ?>
        </li>
    <?php } ?>
</ul>
<br>
                     <p class=""><ion-icon name="logo-facebook" class="me-2 md hydrated" role="img" aria-label="logo facebook"></ion-icon>Facebook</p>
                     <p class=""><ion-icon name="logo-twitter" class="me-2 md hydrated" role="img" aria-label="logo twitter"></ion-icon>Twitter</p>
                     <p class="mb-0"><ion-icon name="logo-linkedin" class="me-2 md hydrated" role="img" aria-label="logo linkedin"></ion-icon>LinkedIn</p>
                  </div>
                </div>

                

              </div>
            </div><!--end row-->


              


          </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <?php include('views/components/footer.component.php'); ?>

        <script src="assets/js/home.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>