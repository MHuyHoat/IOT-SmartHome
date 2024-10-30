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
                    <div class="breadcrumb-title pe-3">Quản lý</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách các tài khoản con</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalAddChildAccount">Thêm tài khoản con </button>
                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div
                                class="modal fade"
                                id="modalAddChildAccount"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div
                                    class="modal-dialog "
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitleId">
                                                Thêm thiết bị 
                                            </h5>
                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">


                                            <div class="col-12 mt-2">
                                                <label for="inputEmail" class="form-label">Họ tên</label>
                                                <input type="text" class="form-control" name="hoten" placeholder="Họ tên người dùng ">
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputEmail" class="form-label">Tên đăng nhập </label>
                                                <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputPassword" class="form-label">Mật khẩu </label>
                                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mật khẩu ">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="button" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->


                <div class="row">
                    <div class="col-xl-12 mx-auto">

                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Danh sách các thiết bị </h6>

                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Tên thiết bị  </th>
                                          
                                            <th>Thuộc nhà </th>
                                            <th>Thuộc khu vực</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        for ($j = 0; $j < count($listThietBi); $j++) {
                                        ?>
                                        
                                            <tr>
                                                <td># <?= $j+1?> </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="product-box border">
                                                        <?= $listThietBi[$j]['image']?? "Trống" ?>
                                                        </div>
                                                        <div class="product-info">
                                                            <h6 class="product-name mb-1"> <?= $listThietBi[$j]['ten_thiet_bi']?? "Trống" ?> </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <?= $listThietBi[$j]['ten_nha']?> </td>
                                                <td> <?= $listThietBi[$j]['ten_khu_vuc']?? "Trống" ?> </td>
                                                <td><span class="badge bg-<?= $listThietBi[$j]['ten_role']=='admin'? "danger":'success' ?>"> <?= $listThietBi[$j]['ten_role']?? "Trống" ?> </span></td>
                                               
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                                                            <ion-icon name="eye-outline" role="img" class="md hydrated" aria-label="eye outline"></ion-icon>
                                                        </a>
                                                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                                                            <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="pencil outline"></ion-icon>
                                                        </a>
                                                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
                                                            <ion-icon name="trash-outline" role="img" class="md hydrated" aria-label="trash outline"></ion-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <?php include('views/components/footer.component.php'); ?>

        <script src="assets/js/home.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>