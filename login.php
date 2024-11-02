<<<<<<< HEAD
<?php   
 session_start();  
 require_once(__DIR__.'/models/User.php');

 $msg="";  
 if (isset($_POST['submit'])) {  
     try {
          $userModel= new User();
         
          $userName=$_POST['userName'];  
          $password=$_POST['password'];  
          
          $user= $userModel->find([
              'username ='=>$userName,
              'password ='=>$password
          ]) ;  
          if (!empty($user)) {  
               //echo "found";  
               $_SESSION['USER_NAME']=$user['username']; 
               $_SESSION['USER_ID']=$user['id']; 
               header("location:home.php");  
          }else{  
                $_SESSION['error']="Thông tin sai!";  

               header("location:login.php"); 
          } 
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
     } 
 }  else{
     include('views/login.view.php');
 }
=======
<?php   
 session_start();  
 require_once(__DIR__.'/models/User.php');

 $msg="";  
 if (isset($_POST['submit'])) {  
     try {
          $userModel= new User();
          $userName=$_POST['userName'];  
          $password=$_POST['password'];  
          
          $user= $userModel->find([
              'username ='=>$userName,
              'password ='=>$password
          ]) ;  
          if (!empty($user)) {  
               //echo "found";  
               $_SESSION['USER_NAME']=$user['username']; 
               $_SESSION['USER_ID']=$user['id']; 
               header("location:home.php");  
          }else{  
                $_SESSION['error']="Thông tin sai!";  

               header("location:login.php"); 
          } 
     } catch (\Throwable $th) {
          //throw $th;
          echo $th;
     } 
 }  else{
     include('views/login.view.php');
 }
>>>>>>> 5f606d80680e6e25062e06f58f2aa1a893b41967
 ?>  