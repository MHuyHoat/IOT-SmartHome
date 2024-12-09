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
          <div class="breadcrumb-title pe-3">Chỉnh sửa chip </div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa tài khoản kết nối của chip </li>
              </ol>
            </nav>
          </div>

        </div>
        <!--end breadcrumb-->

        <form class="card p-3" action="?action=cap-nhat&id=<?= $detail['id'] ?>" method="POST">
          <div class="title d-flex justify-content-center">
            <div class="d-flex align-items-center gap-3">
              <div class="product-box border">
              <img class="img-loathietbi" src="assets/images/chip.png" alt="Image LoaiThietBi">
              </div>
              <div class="product-info">
                <h6 class="product-name mb-1"> ESP32 - <?= $thietBi['id'] ?? "..." ?> </h6>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-angular"></i>
              Tên đăng nhập </label>
            <input type="text" class="form-control" value="<?= $detail['username'] ?>" name="username" placeholder="Tên đăng nhập" required>
          </div>
          <div class="col-12 mt-2">
            <label for="inputPassword" class="form-label">
              <i class="lni lni-cog"></i>
              Mật khẩu </label>
            <input type="password" name="password" value="<?= $detail['password'] ?>" class="form-control" id="inputPassword" placeholder="Mật khẩu " required>
          </div>
      </div>

      <div class="d-flex justify-content-center mt-4">
        <div>
          <button
            type="button"
            class="btn btn-secondary">
            Hủy
          </button>
          <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
      </div>



      </form>
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->



    <?php include('views/components/footer.component.php'); ?>

    <script src="assets/js/home.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>