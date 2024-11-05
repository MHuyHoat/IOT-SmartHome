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
                                <li class="breadcrumb-item active" aria-current="page">Phân quyền người dùng </li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->


                <div class="row">
                    <div class="col-xl-12 mx-auto">

                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Quyền người dùng </h6>

                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table align-middle mb-0" id="dataTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Tên thiết bị </th>

                                            <th>Thuộc khu vực</th>
                                            <th>Điều khiển</th>
                                            <th>Chỉ xem </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($listThietBi) == 0) { ?>
                                            <tr>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                                <td>No Data</td>
                                            </tr>
                                        <?php
                                        } else { ?>
                                            <?php
                                            for ($j = 0; $j < count($listThietBi); $j++) {
                                            ?>

                                                <tr >
                                                    <td># <?= $j + 1 ?> </td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="product-box border">
                                                                <?= $listThietBi[$j]['image'] ?? "Trống" ?>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-name mb-1"> <?= $listThietBi[$j]['ten'] ?? "Trống" ?> </h6>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td> <?= $listThietBi[$j]['ten_khu_vuc'] ?? "Trống" ?> </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <div class="form-check ">
                                                                <input class="form-check-input"
                                                                    onchange="changePermission(<?= $user['id'] ?>,<?= $listThietBi[$j]['id'] ?>,'control')"
                                                                    <?php if ($listThietBi[$j]['permission_type'] == 'control') echo 'checked';   ?>
                                                                    type="checkbox" id="permissionc<?= $listThietBi[$j]['id']  ?>">

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <div class="form-check ">
                                                                <input class="form-check-input"
                                                                    onchange="changePermission(<?= $user['id'] ?>,<?= $listThietBi[$j]['id'] ?>,'view')"
                                                                    <?php if ($listThietBi[$j]['permission_type'] == 'view') echo 'checked';   ?>
                                                                    type="checkbox" id="permissionv<?= $listThietBi[$j]['id']  ?>">

                                                            </div>
                                                        </div>


                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        <?php } ?>
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

        <script src="assets/js/permission.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>