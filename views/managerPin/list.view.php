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
                                <li class="breadcrumb-item active" aria-current="page">Quản lý chân pin</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#modalThemChanPin">Thêm chân pin </button>
                            <!-- Button trigger modal -->
                        </div>
                </div>
                </div>
                <!--end breadcrumb-->


                <div class="row">
                    <div class="col-xl-12 mx-auto">

                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h6 class="mb-0">Danh sách chân pin</h6>

                            </div>
                            <div class="table-responsive mt-2">
                                <table class="table align-middle mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Tên</th>
                                            <th>Miêu tả</th>
                                            <th>Thao tác </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        for ($j = 0; $j < count($listChanPin); $j++) {
                                        ?>
                                        
                                            <tr>
                                                <td># <?= $listChanPin[$j]['id']?> </td>
                                                <td> <?= $listChanPin[$j]['ten']?> </td>
                                                <td> <?= $listChanPin[$j]['mieu_ta']?? "Trống" ?> </td>
                                               
                                                <td>
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                                                            <ion-icon name="eye-outline" role="img" class="md hydrated" aria-label="eye outline"></ion-icon>
                                                        </a>
                                                        <a href="managerPin.php?action=chinh-sua&id=<?= $listChanPin[$j]['id'] ?> " class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                                                            <ion-icon name="pencil-outline" role="img" class="md hydrated" aria-label="pencil outline"></ion-icon>
                                                        </a>
                                                        <a href= "javascript:;" onclick="deleteChanPin(`<?= $listChanPin[$j]['ten'] ?>`,<?= $listChanPin[$j]['id'] ?>)" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
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

        <?php include('views/managerChanPin/components/modalThemChanPin.component.view.php'); ?>
        <?php include('views/components/footer.component.php'); ?>
        <script src="assets/js/managerPin.js"></script>

        <script src="assets/js/home.js"></script>
</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->

</html>