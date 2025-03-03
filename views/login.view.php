<!doctype html>
<html lang="en" class="light-theme">


<!-- Mirrored from codervent.com/fobia/demo/ltr/authentication-sign-in-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 14:07:13 GMT -->


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

<body class="bg-white">

  <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <h4>Đăng nhập</h4>
                  <p>Hệ thống quản lý nhà thông minh</p>
                </div>
                <form action="" method="post" class="form-body row g-3">
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="inputEmail" name="userName">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="inputPassword">
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                      <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                    </div>
                  </div>
                  <div class="col-12 col-lg-6 text-end">
                    <a href="authentication-reset-password-cover.html">Forgot Password?</a>
                  </div>
                  <div class="col-12
                  <?php  if(!isset($_SESSION['error'])){  echo 'd-none'; }?> ">
                    <div class="alert alert-danger" role="alert">
                      <?php 
                         if(isset($_SESSION['error'])){
                          echo $_SESSION['error'];
                          unset($_SESSION['error']);
                         }
                      ?>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="d-grid">
                      <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="position-relative border-bottom my-3">
                      <div class="position-absolute seperator translate-middle-y">or continue with</div>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12">
                    <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                    </div>
                  </div>
                  <div class="col-12 col-lg-12 text-center">
                    <p class="mb-0">Don't have an account? <a href="authentication-sign-up-cover.html">Sign up</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none login-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->


</body>


<!-- Mirrored from codervent.com/fobia/demo/ltr/authentication-sign-in-cover.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Oct 2024 14:07:14 GMT -->

</html>