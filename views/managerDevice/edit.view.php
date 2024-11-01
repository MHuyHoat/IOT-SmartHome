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
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin thiết bị </li>
              </ol>
            </nav>
          </div>

        </div>
        <!--end breadcrumb-->

        <form class="card p-3" action="?action=cap-nhat&id=<?=$detailThietBi['id']?>" method="POST">
          <div class="title d-flex justify-content-center">
            <div class="d-flex align-items-center gap-3">
              <div class="product-box border">
                <?= $detailThietBi['image'] ?? "Trống" ?>
              </div>
              <div class="product-info">
                <h6 class="product-name mb-1"> <?= $detailThietBi['ten'] ?? "Trống" ?> </h6>
              </div>
            </div>
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
              Tên thiết bị </label>
            <input type="text" class="form-control" name="ten" value="<?= $detailThietBi['ten'] ?>" placeholder="Nhập tên thiết bị " required>
          </div>
          <div class="col-12 mt-3">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-arrow-down-circle"></i>
              Loại thiết bị
            </label>
            <div class="mb-3">

              <select
                required
                class="form-select "
                name="loai_id"
                id="">
                <option value="">Chọn loại thiết bị</option>
                <?php
                for ($j = 0; $j < count($listLoaiThietBi); $j++) {
                ?>

                  <option
                    <?= $detailThietBi['loai_id'] == $listLoaiThietBi[$j]['id'] ? 'selected' : '' ?>
                    value="<?= $listLoaiThietBi[$j]['id'] ?>">

                    <?= $listLoaiThietBi[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
            </div>

          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-chrome"></i>
              Chân pin ESP32
            </label>
            <div class="mb-3">

              <select
                required
                class="form-select "
                name="chanpin_id"
                id="">
                <option value="">Chọn chân pin cắm thiết bị</option>
                <?php
                for ($j = 0; $j < count($listChanPin); $j++) {
                ?>

                  <option
                    <?= $detailThietBi['chanpin_id'] == $listChanPin[$j]['id'] ? 'selected' : '' ?>
                    value="<?= $listChanPin[$j]['id'] ?>">

                    <?= $listChanPin[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
            </div>

          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-apartment"></i>
              Chọn nơi đặt thiết bị
            </label>
            <div class="mb-3">

              <select
                required
                class="form-select "
                name="khuvuc_id"
                id="">
                <option value="">Chọn khu vực</option>
                <?php
                for ($j = 0; $j < count($listKhuVuc); $j++) {
                ?>

                  <option
                    <?= $detailThietBi['khuvuc_id'] == $listKhuVuc[$j]['id'] ? 'selected' : '' ?>
                    value="<?= $listKhuVuc[$j]['id'] ?>">

                    <?= $listKhuVuc[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
            </div>

          </div>
          <div class="col-12 mt-2">
            <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Miêu tả</label>
            <textarea type="text" rows="4" value="<?= $detailThietBi['mieu_ta'] ?>" name="mieu_ta" class="form-control" id="inputPassword" placeholder="Miêu tả thiết bị"></textarea>
          </div>
          <div class="col-12 mt-2 d-none">
            <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Nhà </label>
            <input type="text" name="nha_id" class="form-control" value="<?= $user['nha_id'] ?>" placeholder="Miêu tả thiết bị">
          </div>
          <div class="col-12 mt-2 d-none">
            <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Thiết bị Điều khiển </label>
            <input type="text" name="parent_id" class="form-control" value="<?= $chipConnect['id'] ?>" placeholder="Miêu tả thiết bị">
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