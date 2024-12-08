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

        <form class="card p-3" action="?action=cap-nhat&id=<?= $detail['id'] ?>" method="POST">
          <div class="title d-flex justify-content-center">
            <div class="d-flex align-items-center gap-3">
              <div class="product-box border">
              <img class="img-loathietbi" src="<?= $detail['image'] ?>" alt="Image LoaiThietBi">
              </div>
              <div class="product-info">
                <?php
                $parts = [
                  $listThietBi[$j]['ten_loai_thietbi'] ?? "",
                  $listThietBi[$j]['ten_khu_vuc'] ?? "",
                  $listThietBi[$j]['ten_vi_tri'] ?? ""
                ];

                // Sử dụng implode để nối các phần tử lại với nhau
                $listThietBi[$j]['ten'] = implode(" - ", array_filter($parts));
                ?>
                <h6 class="product-name mb-1"> <?= $detail['ten'] ?? "Trống" ?> </h6>
              </div>
            </div>
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
                    <?= $detail['loai_id'] == $listLoaiThietBi[$j]['id'] ? 'selected' : '' ?>
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
              <i class="lni lni-apartment"></i>
              Khu vực
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
                    <?= $detail['khuvuc_id'] == $listKhuVuc[$j]['id'] ? 'selected' : '' ?>
                    value="<?= $listKhuVuc[$j]['id'] ?>">

                    <?= $listKhuVuc[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
            </div>

          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-apartment"></i>
              Vị Trí
            </label>
            <div class="mb-3">

              <select
                required
                class="form-select "
                name="vitri_id"
                id="">
                <option value="">Chọn vị trí</option>
                <?php
                for ($j = 0; $j < count($listViTri); $j++) {
                ?>

                  <option
                    <?= $detail['vitri_id'] == $listViTri[$j]['id'] ? 'selected' : '' ?>
                    value="<?= $listViTri[$j]['id'] ?>">

                    <?= $listViTri[$j]['ten'] ?> </option>

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
                    <?= $detail['chanpin_id'] == $listChanPin[$j]['id'] ? 'selected' : '' ?>
                    value="<?= $listChanPin[$j]['id'] ?>">

                    <?= $listChanPin[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
            </div>

          </div>
         
          <div class="col-12 mt-2">
            <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Miêu tả</label>
            <textarea type="text" rows="4" name="mieu_ta" class="form-control" placeholder="Miêu tả thiết bị">
            <?= $detail['mieu_ta'] ?? '' ?>
            </textarea>
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