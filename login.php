<?php   
 session_start();  
 require_once("dbconnect.php");
 $msg="";  
 if (isset($_POST['submit'])) {  
      //echo "<pre>";  
      //print_r($_POST);  
      $email=mysqli_real_escape_string($conn,$_POST['email']);  
      $password=mysqli_real_escape_string($conn,$_POST['password']);  
      $sql=mysqli_query($conn,"select * from user where username='$email' && password='$password'");  
      $num=mysqli_num_rows($sql);  
      if ($num>0) {  
           //echo "found";  
           $row=mysqli_fetch_assoc($sql);  
           $_SESSION['USER_NAME']=$row['username'];  
           header("location:dashboard.php");  
      }else{  
           $msg="Thông tin sai!";  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <link rel="stylesheet" type="text/css" href="css/style.css">  
      <title>Login</title>  
      <link rel="stylesheet" href="login.css">
 </head>  
 <body>  
 <div class="main">
 <div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">Để sử dụng website điều khiển các thiết bị điện trong nhà,bạn phải đăng nhập</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
      <form method="post" action="">  
                     <label for="username">Username</label>  
                     <div class="box">  
                          <input type="text" name="email" placeholder="Username" class="form-dashboard" required>  
                     </div>  
                     <label for="password">Password</label>  
                     <div class="box">  
                          <input type="password" name="password" placeholder="Password" class="form-dashboard" required>  
                     </div>  
                     <div class="btn-box">  
                          <input id="submit" type="submit" name="submit" value="Login" class="btn submit-btn">  
                     </div>  
                     <div style="text-align: center;margin-top:10px" class="error">  
                          <?php echo $msg ?>  
                     </div>  
                </form>  
      </div>
    </div>
  </div>
</div>




      
 </div>  
 <script src="js.js"></script>
 </body>  
 </html>  