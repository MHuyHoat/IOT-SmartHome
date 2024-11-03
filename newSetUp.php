<?php
ob_start();
session_start();

if (!isset($_SESSION['USER_NAME'])) {
    header("location:login.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] = 'get') {
    try {


        include('views/newSetUp/index.view.php');

        ob_end_flush();
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
        die();
    }
} else {
}
