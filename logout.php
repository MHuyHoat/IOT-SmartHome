<<<<<<< HEAD
<?php
session_start();
unset($_SESSION['USER_NAME']);
header("location:login.php");
die();

=======
<?php
session_start();
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_ROLE']);
header("location:login.php");
die();

>>>>>>> 9ecb0482888ccc95074cd80fc7494e0d67363d9d
?>