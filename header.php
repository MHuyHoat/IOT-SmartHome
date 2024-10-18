<div class="menu1">
            <ul id="nav">
                <li><a href="dashboard.php">Welcome <?php echo $_SESSION['USER_NAME'];?></a></li>
                <li><a href="thongso.php">Parameter</a></li>
                <li><a href="signup.php"><?php if($_SESSION['USER_NAME']=='admin'){echo "Permissions";}?></a></li>
                <li><a href="hanhdong.php"><?php if($_SESSION['USER_NAME']=='admin'){echo "History";}?></a></li>
                <li class="log"><a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
</div>    