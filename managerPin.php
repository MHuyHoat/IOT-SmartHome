<?php
ob_start();
session_start();
require_once(__DIR__ . '/models/ChanPin.php');
require_once(__DIR__ . '/models/User.php');
if (!isset($_SESSION['USER_NAME'])) {
     header("location:login.php");
     die();
}

if ($_SERVER['REQUEST_METHOD'] = 'get') {
     try {
          $chanPinModel= new ChanPin();
          $listChanPin= $chanPinModel->getAll();
          include('views/managerChanPin/managerPin.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
} else if(($_SERVER['REQUEST_METHOD'] == 'GET' && $_REQUEST['action']=='chinh-sua')) {
     try {
          $chanPinModel= new ChanPin();
          $detailChanPin = $chanPinModel->find(['id ='=>$_REQUEST['id'] ]);
          $listChanPin= $chanPinModel->getAll();
          include('views/managerDevice/edit.view.php');
          ob_end_flush();
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
          die();
     }
}

