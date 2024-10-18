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
$backgk = "backgr";
$backgn = "backgr";
$backgb = "backgr";
$backgvs = "backgr";
$backgs = "backgr";
$backgdh = "backgr";
$backgq = "backgr";
$backgnha = "backgr";

if ($result->num_rows > 0) {
    // Load dữ liệu lên website
    while ($row = $result->fetch_assoc()) {
        $sum = 0;
        if ($row['thietbi'] == "0100") {
            $backgk = "backgr2";
        }
        if ($row['thietbi'] == "1100") {
            $backgn = "backgr2";
        }
        if ($row['thietbi'] == "0110") {
            $backgb = "backgr2";
        }
        if ($row['thietbi'] == "1010") {
            $backgvs = "backgr2";
        }
        if ($row['thietbi'] == "0010") {
            $backgs = "backgr2";
        }
        if ($row['thietbi'] == "1110") {
            $backgdh = "backgr2";
        }
        if ($row['thietbi'] == "1000") {
            $backgq = "backgr2";
        }
        $sql = "SELECT count(*) FROM db_iot where trangthai = 1";
        $resul = $conn->query($sql)->fetch_assoc();
        $dem = implode($resul);
        if ($dem == 7) {
            $backgnha = "backgr2";
        }
    }
}


//voice
if (isset($_POST['btnClick'])) {
    $im = lcfirst($_POST['import']);
    $congtac = 0;
    $khach = "khách";
    $san = "sân";
    $bep = "bếp";
    $vesinh = "vệ sinh";
    $dieuhoa = "điều hòa";
    $ngu = "ngủ";
    $quat = "quạt";
    $gt = "";
    // bật
    if (strpos($im, "bật") !== false || strpos($im, "Bật") !== false) {
        $congtac = 1;
    }

    if (strpos($im, $quat) !== false) {
        $gt = "1000";
    }
    if (strpos($im, $khach) !== false) {
        $gt = "0100";
    }
    if (strpos($im, $san) !== false) {
        $gt = "0010";
    }
    if (strpos($im, $vesinh) !== false) {
        $gt = "1010";
    }
    if (strpos($im, $ngu) !== false) {
        $gt = "1100";
    }
    if (strpos($im, $bep) !== false) {
        $gt = "0110";
    }
    if (strpos($im, $dieuhoa) !== false) {
        $gt = "1110";
    }
    if ($_SESSION['USER_NAME'] == "admin") {
        if (strpos($im, "bật hết") !== false || strpos($im, "Bật hết") !== false || strpos($im, "bật tất") !== false || strpos($im, "Bật tất") !== false) {
            $sql = "UPDATE db_iot set trangthai = 1";
            mysqli_query($conn, $sql);
        }
        if (strpos($im, "tắt hết") !== false || strpos($im, "Tắt hết") !== false || strpos($im, "tắt tất") !== false || strpos($im, "Tắt tết") !== false) {
            $sql = "UPDATE db_iot set trangthai = 0";
            mysqli_query($conn, $sql);
        }
    }
    $sql = "UPDATE db_iot set trangthai = '$congtac' WHERE thietbi like '$gt'";
    mysqli_query($conn, $sql);
    header("location:dashboard.php");
}

//button bật tắt

if (isset($_POST['btnKhach'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='0100'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "đèn phòng khách";

    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='0100'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='0100'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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


if (isset($_POST['btnSan'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='0010'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "đèn sân";
    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='0010'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='0010'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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

if (isset($_POST['btnQuat'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='1000'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "quạt trần";
    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='1000'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='1000'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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

if (isset($_POST['btnBep'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='0110'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "đèn bếp";
    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='0110'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='0110'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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

if (isset($_POST['btnVeSinh'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='1010'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "đèn vệ sinh";
    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='1010'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='1010'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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

if (isset($_POST['btnNgu'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='1100'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "đèn phòng ngủ";
    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='1100'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='1100'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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

if (isset($_POST['btnDieuHoa'])) {
    $sql = "SELECT trangthai FROM db_iot where thietbi='1110'";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "điều hòa";
    if ($dem == 1) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 WHERE thietbi='1110'";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem == 0) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 WHERE thietbi='1110'";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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

if (isset($_POST['btnNha'])) {
    $sql = "SELECT count(*) FROM db_iot where trangthai = 1";
    $resul = $conn->query($sql)->fetch_assoc();
    $dem = implode($resul);
    echo "dem", $dem;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('G:i:s d/m/Y');
    $hanhdong;
    $user = $_SESSION['USER_NAME'];
    $congtac = "tất cả thiết bị";
    if ($dem == 7) {
        $hanhdong = "tắt";
        $sql = "UPDATE db_iot set trangthai = 0 ";
        if (mysqli_query($conn, $sql)) {
            echo "tắt đèn phòng khách ";
        } else {
            echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
        }
    }
    if ($dem < 7) {
        $hanhdong = "bật";
        $sql = "UPDATE db_iot set trangthai = 1 ";
        if (mysqli_query($conn, $sql)) {
            echo "bật đèn phòng khách ";
        } else {
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
$user = $_SESSION['USER_NAME'];
$sql = "SELECT act FROM users where username='$user'";
$result = $conn->query($sql)->fetch_assoc();
$chuoi = implode($result);

ob_end_flush();
include($_SERVER['DOCUMENT_ROOT'] . '/views/dashboard.view.php');
