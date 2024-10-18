<?php   
 session_start();  
 require_once($_SERVER['DOCUMENT_ROOT'].'/models/User.php');

 $msg="";  
 if (isset($_POST['submit'])) {  
     try {
          $userModel= new User();
          $email=$_POST['email'];  
          $password=$_POST['password'];  
          
          $user= $userModel->find([
              'username'=>$email,
              'password'=>$password
          ]) ;  
          if (!empty($user)) {  
               //echo "found";  
               $_SESSION['USER_NAME']=$user['username'];  
               header("location:dashboard.php");  
          }else{  
               $msg="Thông tin sai!";  
          } 
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
     } 
 }  else{
     include($_SERVER['DOCUMENT_ROOT'].'/views/login.view.php');
 }
 ?>  