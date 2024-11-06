<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:54:47 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

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
    <!--end top header-->


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Dashboard</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;">
                    <ion-icon name="home-outline"></ion-icon>
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Quản trị hệ thống </li>
              </ol>
            </nav>
          </div>
          <div class="ms-auto">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary">Cài đặt</button>
              <button type="button"
                class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                  href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
              </div>
            </div>
          </div>
        </div>
        <!--end breadcrumb-->


        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Tổng tiền thu </p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                    <ion-icon name="wallet-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0">100,234,000</h4>
                  </div>
                  <div class="ms-auto">+6.32%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Tổng số tài khoản</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                    <ion-icon name="people-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0"><?=$soTaiKhoan?></h4>
                  </div>
                  <div class="ms-auto">+12.45%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Tổng số nhà </p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0"><?=$soNha?></h4>
                  </div>
                  <div class="ms-auto">+3.12%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Tổng số thiết bị </p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                    <ion-icon name="bar-chart-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  <div>
                    <h4 class="mb-0"> <?=$soThietBi?> </h4>
                  </div>
                  <div class="ms-auto">+8.52%</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->


        <div class="row row-cols-1 row-cols-lg-3">
          <div class="col">
            <div class="card radius-10 w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Quốc gia sử dụng dịch vụ</h6>
                  <div class="dropdown options ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal-outline" class="md hydrated"></ion-icon>
                    </div>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
                </div>
                <div class="countries-list">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="country-icon">
                      <img src="assets/images/icons/usa.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$84.5K</h5>
                      <p class="mb-0 text-secondary">United states</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500"><i class='bx bx-up-arrow-alt'></i><span>25%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="country-icon">
                      <img src="assets/images/icons/india.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$750</h5>
                      <p class="mb-0 text-secondary">India</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500"><i class='bx bx-up-arrow-alt'></i><span>18%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="country-icon">
                      <img src="assets/images/icons/china.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$38.5</h5>
                      <p class="mb-0 text-secondary">China</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-danger d-flex gap-1 align-items-center fw-500"><i class='bx bx-down-arrow-alt'></i><span>14%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="country-icon">
                      <img src="assets/images/icons/russia.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$88.0K</h5>
                      <p class="mb-0 text-secondary">France</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500"><i class='bx bx-up-arrow-alt'></i><span>28%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="country-icon">
                      <img src="assets/images/icons/australia.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$78.3K</h5>
                      <p class="mb-0 text-secondary">Australia</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-danger d-flex gap-1 align-items-center fw-500"><i class='bx bx-down-arrow-alt'></i><span>16%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="country-icon">
                      <img src="assets/images/icons/brazil.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$10.5K</h5>
                      <p class="mb-0 text-secondary">Brazil</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500"><i class='bx bx-up-arrow-alt'></i><span>25%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-0">
                    <div class="country-icon">
                      <img src="assets/images/icons/UAE.png" alt="" width="35">
                    </div>
                    <div class="country-name flex-grow-1">
                      <h5 class="mb-0">$30.5K</h5>
                      <p class="mb-0 text-secondary">UAE</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500"><i class='bx bx-up-arrow-alt'></i><span>25%</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Biểu đồ doanh thu</h6>
                  <div class="dropdown options ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal-outline" class="md hydrated"></ion-icon>
                    </div>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
                </div>
                <div class="d-flex align-items-center gap-2 mb-3">
                  <h2 class="mb-0">68%</h2>
                  <div class="">
                    <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500 fs-6"><i class='bx bx-up-arrow-alt'></i><span>25%</span></p>
                  </div>
                </div>
                <div id="chart1"></div>
                <div class="mt-4">
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="widget-icon-small rounded bg-light-success text-success">
                      <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">$545.69</h6>
                      <p class="mb-0 text-secondary">Last Month Sales</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500 fs-6"><i class='bx bx-up-arrow-alt'></i><span>35%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="widget-icon-small rounded bg-light-tiffany text-tiffany">
                      <ion-icon name="flag-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">$956.34</h6>
                      <p class="mb-0 text-secondary">Last Month Sales</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-danger d-flex gap-1 align-items-center fw-500 fs-6"><i class='bx bx-up-arrow-alt'></i><span>45%</span></p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3">
                    <div class="widget-icon-small rounded bg-light-danger text-danger">
                      <ion-icon name="school-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">$6956.48</h6>
                      <p class="mb-0 text-secondary">Last Year Sales</p>
                    </div>
                    <div class="">
                      <p class="mb-0 text-success d-flex gap-1 align-items-center fw-500 fs-6"><i class='bx bx-up-arrow-alt'></i><span>66%</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Lưu lượng truy cập hệ thống </h6>
                  <div class="dropdown options ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
                    </div>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
                <div class="d-flex align-items-center font-13 gap-2">
                  <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-tiffany"></i>Cliks</span>
                  <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-success"></i>Views</span>
                </div>
                <div id="chart2"></div>
              </div>
            </div>
          </div>
        </div><!--end row-->


        <!--end row-->



        <div class="card radius-10 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Recent Orders</h6>
              <div class="fs-5 ms-auto dropdown">
                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                    class="bi bi-three-dots"></i></div>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th>#ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
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
                    <td>2</td>
                    <td>$214</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>Apr 8, 2021</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>#68570</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="assets/images/products/07.png" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">Sports Time Watch</h6>
                        </div>
                      </div>
                    </td>
                    <td>1</td>
                    <td>$185</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>Apr 9, 2021</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>#38567</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="assets/images/products/17.png" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">Women Red Heals</h6>
                        </div>
                      </div>
                    </td>
                    <td>3</td>
                    <td>$356</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td>Apr 10, 2021</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>#48572</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="assets/images/products/04.png" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">Yellow Winter Jacket</h6>
                        </div>
                      </div>
                    </td>
                    <td>1</td>
                    <td>$149</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>Apr 11, 2021</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>#96857</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="assets/images/products/10.png" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">Orange Micro Headphone</h6>
                        </div>
                      </div>
                    </td>
                    <td>2</td>
                    <td>$199</td>
                    <td><span class="badge bg-danger">Cancelled</span></td>
                    <td>Apr 15, 2021</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>#96857</td>
                    <td>
                      <div class="d-flex align-items-center gap-3">
                        <div class="product-box border">
                          <img src="assets/images/products/12.png" alt="">
                        </div>
                        <div class="product-info">
                          <h6 class="product-name mb-1">Pro Samsung Laptop</h6>
                        </div>
                      </div>
                    </td>
                    <td>1</td>
                    <td>$699</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>Apr 18, 2021</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="View detail" aria-label="Views">
                          <ion-icon name="eye-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <ion-icon name="pencil-outline"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom"
                          title="" data-bs-original-title="Delete" aria-label="Delete">
                          <ion-icon name="trash-outline"></ion-icon>
                        </a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->


    <!--start footer-->
    <footer class="footer">
      <div class="footer-text">
        Copyright © 2023. All right reserved.
      </div>
    </footer>
    <!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
      <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <ion-icon name="color-palette-outline" class="me-0"></ion-icon>
      </button>
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
            <label class="form-check-label" for="DarkTheme">Dark</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option3">
            <label class="form-check-label" for="SemiDark">Semi Dark</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--end switcher-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

  </div>
  <!--end wrapper-->



  <?php include('views/components/footer.component.php'); ?>


</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 13:56:33 GMT -->
</html>