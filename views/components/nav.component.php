<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">Fobia</h4>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <!-- Phần dành cho loại tài khoản không phải là superadmin -->
    <?php if (!empty($_SESSION['USER_ROLE'] && $_SESSION['USER_ROLE'] != 'superadmin')) {
    ?>
      <li>
        <a href="home.php">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Trang chủ</div>
        </a>
      </li>
      <li class="<?= ($_SESSION['USER_ROLE'] == 'user')?'d-none':''  ?>">
        <a href="javascript:;" class="has-arrow">
          <div class="parent-icon">
            <i class="lni lni-atlassian"></i>
          </div>
          <div class="menu-title">Quản lý</div>
        </a>
        <ul >

          <li><a href="managerDevice.php?action=danh-sach">
              <ion-icon name="ellipse-outline"></ion-icon>Danh sách thiết bị
            </a>
          </li>
          <li><a href="managerLoaiThietBi.php?action=danh-sach">
          <ion-icon name="ellipse-outline"></ion-icon> Loại thiết bị 
            </a>
          </li>
          <li><a href="managerKhuVuc.php?action=danh-sach">
          <ion-icon name="ellipse-outline"></ion-icon> Khu vực
            </a>
          </li>
          <li><a href="managerViTri.php?action=danh-sach">
          <ion-icon name="ellipse-outline"></ion-icon> Vị trí
            </a>
          </li>
         
        </ul>
      </li>

      <li class="menu-label">Khác</li>

      <li>
        <a href="userProfile.php">
          <div class="parent-icon">
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>
          <div class="menu-title">Người dùng</div>
        </a>
      </li>
      <li class=" <?=  $_SESSION['USER_ROLE']!='admin'?'d-none':'' ?>  ">
        <a href="managerChildAccount.php?action=danh-sach">
          <div class="parent-icon">
            <i class="lni lni-slideshare"></i>
          </div>
          <div class="menu-title">Quản lý tài khoản con</div>
        </a>
      </li>
    <?php } ?>

    <!-- Phần dành cho superadmin -->
    <?php if (!empty($_SESSION['USER_ROLE'] && $_SESSION['USER_ROLE'] == 'superadmin')) {
    ?>
      <li class="menu-label">Super Admin</li>
      <li>
        <a href="dashboard.php?action=dashboard-admin">
          <div class="parent-icon">
            <i class="lni lni-pie-chart"></i>
          </div>
          <div class="menu-title">Dashboard </div>
        </a>
      </li>
      <li>
        <a href="newSetUp.php?action=danh-sach">
          <div class="parent-icon">
            <i class="lni lni-cogs"></i>
          </div>
          <div class="menu-title">Thiết lập mới </div>
        </a>
      </li>
      <li>
        <a href="user.php?action=danh-sach">
          <div class="parent-icon">
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>
          <div class="menu-title">Các tài khoản hệ thống </div>
        </a>
      </li>
      <li>
        <a href="chipConnect.php?action=danh-sach">
          <div class="parent-icon">
            <i class="lni lni-rss-feed" style="font-size: 15px;"></i>
          </div>
          <div class="menu-title">Danh sách chip kết nối</div>
        </a>
      </li>
      <li>
        <a href="managerPin.php?action=danh-sach">
          <div class="parent-icon">
          <i class="lni lni-circle-plus"></i>
          </div>
          <div class="menu-title">Danh sách chân pin</div>
        </a>
      </li>

      <li>
      <?php
    } ?>

      <a class="dropdown-item" href="logout.php" previewlistener="true">
        <div class="d-flex align-items-center">
          <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
          </div>
          <div class="ms-3"><span>Thoát</span></div>
        </div>
      </a>
      </li>
  </ul>
  <!--end navigation-->
</aside>