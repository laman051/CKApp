  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="../"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user">
      <div>
        <p class="app-sidebar__user-name"><b><?= $_SESSION['login']['name_cus'] ?></b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <?php if (isset($_SESSION['isLogin_Admin'])) { ?>
        <li><a class="app-menu__item active" href="."><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
  
        <li><a class="app-menu__item active1" href="nguoidung"><i class='app-menu__icon bx bx-id-card'></i> <span class="app-menu__label">Quản lý khách hàng</span></a></li>
        <li><a class="app-menu__item active5" href="danhmuc"><i class='app-menu__icon bx bx-run'></i><span class="app-menu__label">Quản lý danh mục</span></a></li>
        <li><a class="app-menu__item active2" href="sanpham"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a></li>
        <li><a class="app-menu__item active4" href="hoadon"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
        <li><a class="app-menu__item" href="../?act=taikhoan&xuli=dangxuat"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Đăng xuất</span></a></li>
      <?php } elseif (isset($_SESSION['isLogin_Nhanvien'])) { ?>
        <li><a class="app-menu__item active" href="."><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
        <li><a class="app-menu__item active3" href="banner"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý banner</span></a></li>
        <li><a class="app-menu__item active2" href="sanpham"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a></li>
        <li><a class="app-menu__item active4" href="hoadon"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
        <li><a class="app-menu__item" href="../?act=taikhoan&xuli=dangxuat"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Đăng xuất</span></a></li>
      <?php } elseif (isset($_SESSION['isLogin_TransportStaff'])) { ?>
        <li><a class="app-menu__item active4" href="hoadon"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Đơn giao hàng</span></a></li>
        <li><a class="app-menu__item" href="../?act=taikhoan&xuli=dangxuat"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Đăng xuất</span></a></li>
      <?php } else { ?>
        <li><a class="app-menu__item active8" href="blog"><i class='app-menu__icon bx bxl-blogger'></i><span class="app-menu__label">Quản lý Blogs</span></a> </li>
        <li><a class="app-menu__item" href="../?act=taikhoan&xuli=dangxuat"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Đăng xuất</span></a></li>
      <?php } ?>
    </ul>
  </aside>