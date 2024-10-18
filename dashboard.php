<?php   
    ob_start();
    session_start();  
    require_once("dbconnect.php");
    

    if (!isset($_SESSION['USER_NAME'])) {  
        header("location:login.php");  
      die();  
    }  
                $sql = "SELECT thietbi FROM db_iot where trangthai = 1";
                $result = $conn->query($sql);
                $backgk="backgr";
                $backgn="backgr";
                $backgb="backgr";
                $backgvs="backgr";
                $backgs="backgr";
                $backgdh="backgr";
                $backgq="backgr";
                $backgnha="backgr";
                
                if ($result->num_rows > 0) {
                // Load dữ liệu lên website
                while($row = $result->fetch_assoc()) {
                    $sum=0;
                    if($row['thietbi']=="0100"){
                        $backgk="backgr2";
                    }
                    if($row['thietbi']=="1100"){
                        $backgn="backgr2";
                    }
                    if($row['thietbi']=="0110"){
                        $backgb="backgr2";
                    }
                    if($row['thietbi']=="1010"){
                        $backgvs="backgr2";
                    }
                    if($row['thietbi']=="0010"){
                        $backgs="backgr2";
                    }
                    if($row['thietbi']=="1110"){
                        $backgdh="backgr2";
                    }
                    if($row['thietbi']=="1000"){
                        $backgq="backgr2";
                    }
                    $sql = "SELECT count(*) FROM db_iot where trangthai = 1";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    if($dem==7){
                        $backgnha="backgr2";
                    }
                }
                }


                //voice
                if(isset($_POST['btnClick'])){
	                $im = lcfirst($_POST['import']);
                    $congtac=0;
                    $khach="khách";
                    $san="sân";
                    $bep="bếp";
                    $vesinh="vệ sinh";
                    $dieuhoa="điều hòa";
                    $ngu="ngủ";
                    $quat="quạt";
                    $gt="";
                    // bật
                    if(strpos($im,"bật")!==false||strpos($im,"Bật")!==false){
                        $congtac=1;
                    }

                    if(strpos($im,$quat)!==false){
                        $gt="1000";
                    }
                    if(strpos($im,$khach)!==false){
                        $gt="0100";
                    }
                    if(strpos($im,$san)!==false){
                        $gt="0010";
                    }
                    if(strpos($im,$vesinh)!==false){
                        $gt="1010";
                    }
                    if(strpos($im,$ngu)!==false){
                        $gt="1100";
                    }
                    if(strpos($im,$bep)!==false){
                        $gt="0110";
                    }
                    if(strpos($im,$dieuhoa)!==false){
                        $gt="1110";
                    }
                    if($_SESSION['USER_NAME']=="admin"){
                        if(strpos($im,"bật hết")!==false||strpos($im,"Bật hết")!==false||strpos($im,"bật tất")!==false||strpos($im,"Bật tất")!==false){
                            $sql="UPDATE db_iot set trangthai = 1";
                            mysqli_query($conn, $sql);
                        }
                        if(strpos($im,"tắt hết")!==false||strpos($im,"Tắt hết")!==false||strpos($im,"tắt tất")!==false||strpos($im,"Tắt tết")!==false){
                            $sql="UPDATE db_iot set trangthai = 0";
                            mysqli_query($conn, $sql);
                        }
                    }
                    $sql="UPDATE db_iot set trangthai = '$congtac' WHERE thietbi like '$gt'";
                    mysqli_query($conn, $sql);
                    header("location:dashboard.php");
                   
                    
                }
                
                //button bật tắt

                if(isset($_POST['btnKhach'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='0100'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="đèn phòng khách";

                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='0100'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='0100'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }
                

                if(isset($_POST['btnSan'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='0010'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="đèn sân";
                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='0010'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='0010'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }

                if(isset($_POST['btnQuat'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='1000'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="quạt trần";
                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='1000'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='1000'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }

                if(isset($_POST['btnBep'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='0110'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="đèn bếp";
                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='0110'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='0110'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }

                if(isset($_POST['btnVeSinh'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='1010'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="đèn vệ sinh";
                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='1010'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='1010'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }

                if(isset($_POST['btnNgu'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='1100'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="đèn phòng ngủ";
                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='1100'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='1100'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }

                if(isset($_POST['btnDieuHoa'])){
                    $sql = "SELECT trangthai FROM db_iot where thietbi='1110'";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="điều hòa";
                    if($dem==1){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 WHERE thietbi='1110'";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem==0){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 WHERE thietbi='1110'";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }

                if(isset($_POST['btnNha'])){
                    $sql = "SELECT count(*) FROM db_iot where trangthai = 1";
                    $resul = $conn->query($sql)->fetch_assoc();
                    $dem=implode($resul);
                    echo "dem",$dem;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $thoigian=date('G:i:s d/m/Y');
                    $hanhdong;
                    $user=$_SESSION['USER_NAME'];
                    $congtac="tất cả thiết bị";
                    if($dem==7){
                        $hanhdong="tắt";
                        $sql="UPDATE db_iot set trangthai = 0 ";
                        if(mysqli_query($conn, $sql)){
                            echo "tắt đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    if($dem<7){
                        $hanhdong="bật";
                        $sql="UPDATE db_iot set trangthai = 1 ";
                        if(mysqli_query($conn, $sql)){
                            echo "bật đèn phòng khách ";
                        } else{
                            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
                    }
                    }
                    $sql = "INSERT INTO hanhdong (name, thoigian, action, thietbi)
                    VALUES ('$user', '$thoigian' ,'$hanhdong', '$congtac')";

                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
	                header('Location: dashboard.php');

                }
                $user=$_SESSION['USER_NAME'];
                $sql = "SELECT act FROM user where username='$user'";
                $result = $conn->query($sql)->fetch_assoc();
                $chuoi=implode($result);

                ob_end_flush();
            ?>


<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <!--====== Title ======-->
    <title>Smart - Multi-purpose Landing Page Template</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

#button {
  animation: 1.5s ease infinite alternate running shimmer;
  background: linear-gradient(90deg, #FFE27D 0%, #64E3FF 30%, #9192FF 85%);
  background-size: 200% 100%;
  border: none;
	border-radius: 6px;
  box-shadow: -2px -2px 10px rgba(255, 227, 126, 0.5), 2px 2px 10px rgba(144, 148, 255, 0.5);
  color: #170F1E;
  cursor: pointer;
	font-family: 'Inter', sans-serif;
  font-size: 16px;
	font-weight: 670;
  line-height: 24px;
  overflow: hidden;
  padding: 12px 24px;
  position: relative;
  text-decoration: none;
  transition: 0.2s;
  
  svg {
    left: -20px;
    opacity: 0.5;
    position: absolute;
    top: -2px;
    transition: 0.5s cubic-bezier(.5,-0.5,.5,1.5);
  }
  
  &:hover svg {
    opacity: 0.8;
    transform: translateX(50px) scale(1.5);
  }
  
  &:hover {
    transform: rotate(-3deg);
  }
  
  &:active {
    transform: scale(0.95) rotate(-3deg);
  }

}

@keyframes shimmer {
  to {
    background-size: 100% 100%;
    box-shadow: -2px -2px 6px rgba(255, 227, 126, 0.5), 2px 2px 6px rgba(144, 148, 255, 0.5);
  }
}



        .button-xuly {
        position: relative;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: #778899;
        padding: 1.3rem 4.4rem;
        border: none;
        color: white;
        font-size: 1.2em;
        cursor: pointer;
        outline: none;
        overflow: hidden;
        border-radius: 100px;
        }

        .button-xuly span {
        position: relative;
        pointer-events: none;
    }

    .button-xuly::before {
        --size: 0;
        content: "";
        position: absolute;
        left: var(--x);
        top: var(--y);
        width: var(--size);
        height: var(--size);
        background: radial-gradient(circle closest-side, #EF3A7B, transparent);
        transform: translate(-50%, -50%);
        transition: width 0.2s ease, height 0.2s ease;
    }

    .button-xuly:hover::before {
        --size: 400px;
    }

        .cck {
        position: relative;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: #5782F5;
        padding: 1.3rem 4.4rem;
        border: none;
        color: white;
        font-size: 1.2em;
        cursor: pointer;
        outline: none;
        overflow: hidden;
        border-radius: 100px;
        }

    .cck span {
        position: relative;
        pointer-events: none;
    }

    .cck::before {
        --size: 0;
        content: "";
        position: absolute;
        left: var(--x);
        top: var(--y);
        width: var(--size);
        height: var(--size);
        background: radial-gradient(circle closest-side, #EF3A7B, transparent);
        transform: translate(-50%, -50%);
        transition: width 0.2s ease, height 0.2s ease;
    }

.cck:hover::before {
    --size: 400px;
}
</style>


</head>

<body>
    
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->

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
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#dashboard-button">BUTTON</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#dashboard-voice">VOICE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#parameter">PARAMETER</a>
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
        
        <div id="home" class="slider-area">
            <div class="bd-example">
                <div id="carouselOne" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselOne" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselOne" data-slide-to="1"></li>
                        <li data-target="#carouselOne" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item bg_cover active" style="background-image: url(assets/images/slider-1.jpg)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Trạng thái các thiết bị trong nhà</h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#dashboard-button">Click me</a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->

                        <div class="carousel-item bg_cover" style="background-image: url(assets/images/slider-2.jpg)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Theo dõi thông số nhiệt độ, độ ẩm</h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#parameter">Click me</a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->

                        <div class="carousel-item bg_cover" style="background-image: url(assets/images/slider-3.jpg)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Lịch sử các thiết bị</h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#history">Click me</a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->
                    </div> <!-- carousel-inner -->

                    <a class="carousel-dashboard-prev" href="#carouselOne" role="button" data-slide="prev">
                        <i class="lni-arrow-left-circle"></i>
                    </a>

                    <a class="carousel-dashboard-next" href="#carouselOne" role="button" data-slide="next">
                        <i class="lni-arrow-right-circle"></i>
                    </a>
                </div> <!-- carousel -->
            </div> <!-- bd-example -->
        </div>

    </section>

    <!--====== NAVBAR PART ENDS ======-->

    <!--====== SAIDEBAR PART START ======-->

    <div class="sidebar-right">
        <div class="sidebar-close">
            <a class="close" href="#close"><i class="lni-close"></i></a>
        </div>
        <div class="sidebar-content">
            <div class="sidebar-logo text-center">
                <a href="#"><img src="assets/images/logo-alt.png" alt="Logo"></a>
            </div> <!-- logo -->
            <div class="sidebar-menu">
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">RESOURCES</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div> <!-- menu -->
            <div class="sidebar-social d-flex align-items-center justify-content-center">
                <span>FOLLOW US</span>
                <ul>
                    <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                </ul>
            </div> <!-- sidebar social -->
        </div> <!-- content -->
    </div>
    <div class="overlay-right"></div>

    <!--====== SAIDEBAR PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->

    <section id="dashboard-button" class="about-area">
    <form method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mt-30 pb-40">
                        <h4 class="title wow fadeInUp">Công tắc điều khiển</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            
            <div class="row">
                <div class="<?php $pos = strpos($chuoi, "2");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgk?>" type="submit" value="" name="btnKhach">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Khách</h4>
                          </div>
                    </div> <!-- single about -->
                </div>


                <div class="<?php $pos = strpos($chuoi, "1");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgs?>" type="submit" value="" name="btnSan">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Sân</h4>
                        </div>
                    </div> <!-- single about -->
                </div>
                
                <div class="<?php $pos = strpos($chuoi, "4");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgb?>" type="submit" value="" name="btnBep">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Bếp</h4>
                        </div>
                    </div> <!-- single about -->
                </div>

                <div class="<?php $pos = strpos($chuoi, "6");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgn?>" type="submit" value="" name="btnNgu">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Ngủ</h4>
                        </div>
                    </div> <!-- single about -->
                </div>

                <div class="<?php $pos = strpos($chuoi, "5");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgvs?>" type="submit" value="" name="btnVeSinh">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Vệ sinh</h4>
                        </div>
                    </div> <!-- single about -->
                </div>

                <div class="<?php $pos = strpos($chuoi, "3");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgq?>" type="submit" value="" name="btnQuat">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Quạt</h4>
                        </div>
                    </div> <!-- single about -->
                </div>

                <div class="<?php $pos = strpos($chuoi, "7");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgdh?>" type="submit" value="" name="btnDieuHoa">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Điều hòa</h4>
                        </div>
                    </div> <!-- single about -->
                </div>

                <div class="<?php $pos = strpos($chuoi, "1234567");
                                    if ($pos !== false) {
                                        echo "col-lg-6";
                                    } else {
                                        echo "hide";
                                    }
                                    ?>">
                    <div class="single-about d-sm-flex mt-30 wow fadeInUp">
                        <div class="about-icon">
                            <input class="<?php echo$backgnha?>" type="submit" value="" name="btnNha">
                        </div>
                        <div class="about-content media-body">
                            <h4 class="about-title">Tất cả</h4>
                        </div>
                    </div> <!-- single about -->
                </div>


            </div> <!-- row -->
        </div> <!-- container -->
        </form>

    </section>

    <!--====== ABOUT PART ENDS ======-->
    
    <!--====== portfolio PART START ======-->

    <section id="dashboard-voice" class="portfolio-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">Điều khiển giọng nói</h3>
                        
                    <form method="post">
                        <p style="margin-top:14px;margin-bottom:14px;text-align: center;"><button class="cck" type="button" onclick="speech()"><span>Click vào để nói</span></button> &nbsp; <span id="action"></span></p>
                        <input class="text-xuly" type="text" id="textt" name="import" value="" style="display:none"/>
                        <input class="button-xuly" type="submit" name="btnClick" value="Xử lý"></button>
                    </form>
                    <div id="output" class="hide"></div>
                        
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== portfolio PART ENDS ======-->
    
    <!--====== PRINICNG STYLE EIGHT START ======-->

    <section id="parameter" class="pricing-area">
    <?php 
    $sql = "SELECT * FROM logs ORDER BY id DESC";
    if ($result=mysqli_query($conn,$sql))
    {
      // Fetch one and one row
      echo "<TABLE id='c4ytable'>";
      while ($row=mysqli_fetch_row($result))
      {
        $nhietdo=$row[1];
        $doam=$row[2];
      }
      echo "</TABLE>";
      mysqli_free_result($result);
    }
    mysqli_close($conn);
    $img="";
    $img2="";
    $hieuung="";
    if($nhietdo>=20&&$nhietdo<=28){
        $img="antoan";
    }
    else if($nhietdo<20 || $nhietdo>28){
        $img="canhbao";
        $hieuung="rung";
    }
    if($doam>40&&$doam<70){
        $img2="antoan";
    }
    else if($doam<4020||$doam>70){
        $img2="canhbao";
        $hieuung="rung";
    }
    
    ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h3 class="title">PARAMETER </h3>
	                    <button id="button">Cập nhật dữ liệu</button>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">                
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.5s">
                        <div class="pricing-icon text-center">
                            <img src="img/nhietdo.png" alt="" style="width: 120px;">
                        </div>
                        <div class="pricing-header text-center">
                            <h2 class="sub-title">Nhiệt độ: <div id="data1" style="display:inline"> <?php echo "$nhietdo"; ?></div></h2>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <img class="<?php echo"$hieuung"?> " src="img/<?php echo"$img"?>.png" alt="" style="width: 140px;">
                        </div>
                    </div> <!-- pricing style one -->
                </div>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style-one mt-40 wow fadeIn" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="pricing-icon text-center">
                        <img src="img/doam.png" alt="" style="width: 120px;">
                        </div>
                        <div class="pricing-header text-center">
                            <h2 class="sub-title">Độ ẩm: <div id="data2" style="display:inline"> <?php echo "$doam"; ?></div></h2>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                            <img class="<?php echo"$hieuung"?>" src="img/<?php echo"$img2"?>.png" alt="" style="width: 140px;">
                        </div>
                    </div> <!-- pricing style one -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PRINICNG STYLE EIGHT ENDS ======-->

    <!--====== FOOTER FOUR PART START ======-->

    <footer id="footer" class="footer-area">
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="copyright text-center text-lg-left mt-10">
                            <p class="text">HNMU D2020B</p>
                        </div> 
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-logo text-center mt-10">
                            <a href="dashboard.php"><img src="assets/images/logo-2.svg" alt="Logo"></a>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-5">
                        <ul class="social text-center text-lg-right mt-10">
                            <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                        </ul> <!-- social -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER FOUR PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  

    <!--====== PART START ======-->



    <!--====== PART ENDS ======-->










    <!--====== jquery js ======-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#button").click(function(){
			$.ajax({
				url: "index1.php",
				type: "POST",
				success: function(data){
					$("#data1").html(data);
				}
			});
		});
	});
	</script>
    <script type="text/javascript">
	$(document).ready(function(){
		$("#button").click(function(){
			$.ajax({
				url: "index2.php",
				type: "POST",
				success: function(data){
					$("#data2").html(data);
				}
			});
		});
	});
	</script>

    <script>
			/* Mã Java */
		    function speech() {
		        // lấy tham chiếu output div
		        var output = document.getElementById("output");
		        // lấy tham chiếu action element
		        var action = document.getElementById("action");
                // Đối tượng nhận dạng giọng nói mới
                var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                var recognition = new SpeechRecognition();
            	// cài đặt ngôn ngữ 
				recognition.lang = 'vi-VN';
                // Điều này sẽ chạy khi nhận dạng giọng nói bắt đầu
                recognition.onstart = function() {
                    action.innerHTML = "<small><br>Đang lắng nghe....Hãy nói </small>";
                };
                
                recognition.onspeechend = function() {
                    action.innerHTML = "<small><br>Ngừng nghe, hy vọng bạn đã xong ...</small>";
                    recognition.stop();
                }
              
                // Điều này sẽ chạy khi nhận dạng giọng nói trả về kết quả
                recognition.onresult = function(event) {
                    var transcript = event.results[0][0].transcript;
                    
                    output.innerHTML = "<b>Hiển thị:</b> " + transcript + "<br/>";
					document.getElementById('textt').setAttribute('value',transcript);

                    output.classList.remove("hide");
				
                };
                 recognition.start();
	        }
            document.querySelector('.cck').onmousemove = (e) => {

            const x = e.pageX - e.target.offsetLeft
            const y = e.pageY - e.target.offsetTop

            e.target.style.setProperty('--x', `${x}px`)
            e.target.style.setProperty('--y', `${y}px`)
            }
            

		</script>

</body>

</html>