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
                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin người dùng </li>
              </ol>
            </nav>
          </div>

        </div>
        <!--end breadcrumb-->

        <form class="card p-3" action="?action=cap-nhat&id=<?= $detail['id'] ?>" method="POST">
          <div class="title d-flex justify-content-center">
            <div class="d-flex align-items-center gap-3">
              <div class="product-box border">
              <img src="assets/images/avatars/0<?= ((int) $detail['id'])%10?>.png" alt="">
              </div>
              <div class="product-info">
                <h6 class="product-name mb-1"> <?= $detail['hoten'] ?? "Trống" ?> </h6>
              </div>
            </div>
          </div>

          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="fadeIn animated bx bx-user-circle"></i>
              Họ tên</label>
            <input type="text" class="form-control" value="<?= $detail['hoten'] ?? "" ?>" name="hoten" placeholder="Họ tên người dùng " required>
          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-angular"></i>
              Tên đăng nhập </label>
            <input type="text" class="form-control" name="username" value="<?= $detail['username'] ?? "" ?>" placeholder="Tên đăng nhập" required>
          </div>
          <div class="col-12 mt-2">
            <label for="inputPassword" class="form-label">
              <i class="lni lni-cog"></i>
              Mật khẩu </label>
            <input type="password" name="password" class="form-control" value="<?= $detail['password'] ?? "" ?>" id="inputPassword" placeholder="Mật khẩu " required>
          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="fadeIn animated bx bx-message-rounded-minus"></i>
              Email </label>
            <input type="email" class="form-control" name="email" value="<?= $detail['email'] ?? "" ?>" placeholder="Nhập email" required>
          </div>
          <div class="col-12 mt-2">
            <label for="inputEmail" class="form-label">
              <i class="lni lni-apartment"></i>
              Loại tài khoản
            </label>
            <div class="mb-3">

              <select
                required
                class="form-select "
                name="role_id"
                id="">
                <option value="">Chọn quyền </option>
                <?php
                for ($j = 0; $j < count($listRole ?? []); $j++) {
                ?>

                  <option
                   <?= $listRole[$j]['id']==$detail['role_id']?'selected':'' ?>
                   value="<?= $listRole[$j]['id'] ?>">

                    <?= $listRole[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
            </div>
            <div class="col-12 mt-2 ">
              <label for="inputPassword" class="form-label"> <i class="fa fa-home" aria-hidden="true"></i> Nhà </label>
              <select
                required
                class="form-select select2"
                name="nha_id"
                id="">
                <option value="">Chọn nhà </option>
                <?php
                for ($j = 0; $j < count($listNha ?? []); $j++) {
                ?>

                  <option
                   <?= $listNha[$j]['id']==$detail['nha_id']?'selected':'' ?>
                   value="<?= $listNha[$j]['id'] ?>">

                   <?= $listNha[$j]['id'] ?> - <?= $listNha[$j]['ten'] ?> </option>

                <?php
                }
                ?>

              </select>
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
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>