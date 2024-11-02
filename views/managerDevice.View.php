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
       <li class="breadcrumb-item active" aria-current="page">Danh sách thiết bị</li>
     </ol>
   </nav>
 </div>
 <div class="ms-auto">
   <div class="btn-group">
     <button type="button" class="btn btn-outline-primary">Settings</button>
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


<div class="card">
 <div class="card-body">
   <div class="d-flex align-items-center">
      <h5 class="mb-0">Các thiết bị</h5>
       <form class="ms-auto position-relative">
         <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon></div>
         <input class="form-control ps-5" type="text" placeholder="search">
       </form>
   </div>
   <div class="table-responsive mt-3">
   <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th>ID</th>
                    <th>Tên thiết bị</th>
                    <th>Khu vực</th>
                    <th>Quyền</th>
                    <!-- <th>Date</th>
                    <th>Status</th> -->
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($dataThietBiKhuVuc ?? [] as $k => $v) {
                ?>
                  <tr>
                
                    <td>#89742</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="assets/images/products/11.png" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">Smart Mobile Phone</h6>
                        </div>
                      </div>
                    </td>
                    <td><?= $v[0]['ten_khu_vuc']?></td>
                    <td>$214</td>
                    <!-- <td><span class="badge bg-success">Completed</span></td>
                    <td>Apr 8, 2021</td> -->
                    <!-- <td>
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
                    </td> -->
                  </tr>
                  <?php
                                    }
                                    ?>
                </tbody>
              </table>
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