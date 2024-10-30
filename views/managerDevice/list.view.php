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
                                data-bs-target="#modalAddChildAccount">Thêm thiết bị </button>
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
                                    <form class="modal-content" action="?action=them-moi" method="post">
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
                                                <input type="text" class="form-control" name="ten" placeholder="Nhập tên thiết bị ">
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputEmail" class="form-label">
                                                    <i class="lni lni-arrow-down-circle"></i>
                                                    Loại thiết bị
                                                </label>
                                                <div class="mb-3">

                                                    <select
                                                        class="form-select "
                                                        name="loai_id"
                                                        id="">
                                                        <option value="">Chọn loại thiết bị</option>
                                                        <?php
                                                        for ($j = 0; $j < count($listLoaiThietBi); $j++) {
                                                        ?>

                                                            <option value="<?= $listLoaiThietBi[$j]['id'] ?>">

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
                                                    Chọn nơi đặt thiết bị
                                                </label>
                                                <div class="mb-3">

                                                    <select
                                                        class="form-select "
                                                        name="khuvuc_id"
                                                        id="">
                                                        <option value="">Chọn khu vực</option>
                                                        <?php
                                                        for ($j = 0; $j < count($listKhuVuc); $j++) {
                                                        ?>

                                                            <option value="<?= $listKhuVuc[$j]['id'] ?>">

                                                                <?= $listKhuVuc[$j]['ten'] ?> </option>

                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-12 mt-2">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Miêu tả</label>
                                                <input type="text" name="mieu_ta" class="form-control" id="inputPassword" placeholder="Miêu tả thiết bị">
                                            </div>
                                            <div class="col-12 mt-2 d-none">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Nhà </label>
                                                <input type="text" name="nha_id" class="form-control" value="<?= $user['nha_id'] ?>" placeholder="Miêu tả thiết bị">
                                            </div>
                                            <div class="col-12 mt-2 d-none">
                                                <label for="inputPassword" class="form-label"> <i class="lni lni-amazon"></i> Thiết bị Điều khiển </label>
                                                <input type="text" name="parent_id" class="form-control" value="<?= $chipConnect['id'] ?>" placeholder="Miêu tả thiết bị">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                                Hủy
                                            </button>
                                            <button type="submit" class="btn btn-primary">Thêm</button>
                                        </div>
                                    </form>
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
                                            <th>Tên thiết bị </th>

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

                                            <tr class=" <?php if ($listThietBi[$j]['permission_type'] == 'view') echo 'd-none';   ?>">
                                                <td># <?= $j + 1 ?> </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="product-box border">
                                                            <?= $listThietBi[$j]['image'] ?? "Trống" ?>
                                                        </div>
                                                        <div class="product-info">
                                                            <h6 class="product-name mb-1"> <?= $listThietBi[$j]['ten_thiet_bi'] ?? "Trống" ?> </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td> <?= $listThietBi[$j]['ten_nha'] ?> </td>
                                                <td> <?= $listThietBi[$j]['ten_khu_vuc'] ?? "Trống" ?> </td>
                                                <td><span class="badge bg-<?= $listThietBi[$j]['trangthai'] == 1 ? "success" : 'danger' ?>"> <?= $listThietBi[$j]['trangthai'] == 1 ? "Bật " : 'Tắt' ?>" </span></td>

                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                                                            <ion-icon name="eye-outline" role="img" class="md hydrated" aria-label="eye outline"></ion-icon>
                                                        </a>
                                                        <a href="managerDevice.php?action=chinh-sua && id=<?= $listThietBi[$j]['id'] ?> " class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
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