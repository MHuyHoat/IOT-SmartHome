     <?php
     try {
          session_start();
      
          require_once(__DIR__ . '/config/DBConn.php');

          $msg = "";
          if (isset($_POST['submit'])) {
               try {
                    $conn=new DBConn();
                    $userName = $_POST['userName'];
                    $password = $_POST['password'];

                    $user = $conn->executeQuery("SELECT u.*,r.ten as ten_role FROM users as u INNER JOIN role AS r ON u.role_id=r.id  WHERE  u.username='$userName' and u.password='$password' ")->fetch();
                      
                    if (!empty($user)) {
                         //echo "found";  
                         $_SESSION['USER_NAME'] = $user['username'];
                         $_SESSION['USER_ID'] = $user['id'];
                         $_SESSION['USER_ROLE']  = $user['ten_role'];
                         if($_SESSION['USER_ROLE']=='superadmin'){
                              header("location:dashboard.php?action=dashboard-admin"); 
                            }else{
                              header("location:home.php"); 
                            }
                    } else {
                         $_SESSION['error'] = "Thông tin sai!";

                         header("location:login.php");
                    }
               } catch (\Throwable $th) {
                    //throw $th;
                    echo $th;
               }
          } else {
               include('views/login.view.php');
          }
     } catch (Exception $e) {
          echo $e;
     }
     ?>