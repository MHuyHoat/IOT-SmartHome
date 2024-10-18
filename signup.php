<?php   
    ob_start();
    session_start();  
    require_once("dbconnect.php");
    

    if (!isset($_SESSION['USER_NAME'])) {  
        header("location:login.php");  
      die();  
    }  
    $act="";
    $er="";

    if (isset($_POST['submit'])) {  
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];
        if(isset($_POST['chkSan'])){
            $act=$act."1";
        }
        if(isset($_POST['chkKhach'])){
            $act=$act."2";
        }
        if(isset($_POST['chkQuat'])){
            $act=$act."3";
        }
        if(isset($_POST['chkBep'])){
            $act=$act."4";
        }
        if(isset($_POST['chkKVeSinh'])){
            $act=$act."5";
        }
        if(isset($_POST['chkNgu'])){
            $act=$act."6";
        }
        if(isset($_POST['chkDieuHoa'])){
            $act=$act."7";
        }
        $sql=mysqli_query($conn,"select username from user where username like '$email'");  
        $num=mysqli_num_rows($sql);  
        if ($num>0) {  
            $er ="Trùng thông tin! Vui lòng nhập lại";
            echo $num; 
        }else{  
            if(strcmp($password,$confirm)==0){
            $sql = "INSERT INTO user (username, password, posi, act)
            VALUES ('$email', '$password' ,'user', '$act')";

            if ($conn->query($sql) === TRUE) {
                $er="Tạo tài khoản thành công";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="signup.css">
    <!--====== Title ======-->
    <title>Smart - Multi-purpose Landing Page Template</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-dashboards="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="dashboard.php">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="dashboard.php">BUTTON</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="dashboard.php">VOICE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="dashboard.php">PARAMETER</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="signup.php">PERMISSIONS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="hanhdong.php">HISTORY</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

    <div class="permiss" style="margin-top:70px;">
        <div class="form">
            <form method="post" action="">  
               <div class="box">  
                    <input type="text" name="email" placeholder="Username" class="form-dashboard" required>  
               </div>  
                <div class="box">  
                    <input type="password" name="password" placeholder="Password" class="form-dashboard" required>  
                </div>  
                <div class="box">  
                    <input type="password" name="confirm" placeholder="Confirm" class="form-dashboard" required>  
                </div>  
                
                <div class="quyen">
                    <div class="tick">
                        <input type="checkbox" name="chkSan" id="">1 Sân
                    </div>
                    <div class="tick">
                        <input type="checkbox" name="chkKhach" id="">2 Khách
                    </div>
                    <div class="tick">
                        <input type="checkbox" name="chkQuat" id="">3 Quạt
                    </div>
                    <div class="tick">
                        <input type="checkbox" name="chkBep" id="">4 Bếp
                    </div>
                    <div class="tick">
                        <input type="checkbox" name="chkVeSinh" id="">5 Vệ sinh
                    </div>
                    <div class="tick">
                        <input type="checkbox" name="chkNgu" id="">6 Ngủ
                    </div>
                    <div class="tick">
                        <input type="checkbox" name="chkDieuHoa" id="">7 Điều hòa
                    </div>
                    <div class="btn-box">  
                    <input id="submit" type="submit" name="submit" value="Sign-up" class="btn submit-btn" style="background:linear-gradient(to right, #43cae9 0%, #38f9d7 100%);padding:11px 12px;">  
                </div>  
                <div class="er">
                    <?php echo $er?>
                </div>
                </div>
            </form>  
        </div>
        
    </div>
 <script src="js.js"></script>
 <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="assets/js/isotope.pkgd.min.js"></script>

    <!--====== Images Loaded js ======-->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling js ======-->
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>

    <!--====== wow js ======-->
    <script src="assets/js/wow.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
</body>
</html>

