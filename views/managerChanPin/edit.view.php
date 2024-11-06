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

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Chỉnh sửa </div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin chân pin </li>
              </ol>
            </nav>
          </div>

        </div>
        <!--end breadcrumb-->
        <form class="card p-3" action="?action=cap-nhat&idCu=<?=$detailChanPin['id']?>" method="POST">
        <div class="col-12 mt-2">
        <input type="text" value="<?= $detailChanPin['id'] ?>" name="idCu" class="form-control" id="inputPassword" placeholder="ID thiết bị" hidden ></input>
            <label for="inputPassword" class="form-label"><b>#</b>ID</label>
            <input type="text" value="<?= $detailChanPin['id'] ?>" name="id" class="form-control" id="inputPassword" placeholder="ID thiết bị"></input>
          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-codesandbox">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
              </svg>
              Tên chân pin </label>
            <input type="text" class="form-control" name="ten" value="<?= $detailChanPin['ten'] ?>" placeholder="Nhập tên thiết bị " required>
          </div>
          <div class="col-12 mt-2">
            <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Miêu tả</label>
            <input type="text" rows="4" value="<?= $detailChanPin['mieu_ta'] ?>" name="mieu_ta" class="form-control" id="inputPassword" placeholder="Miêu tả thiết bị"></input>
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