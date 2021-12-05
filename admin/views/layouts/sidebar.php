<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= ADMIN_ASSET ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= PUBLIC_PATH ?>img/<?= $_SESSION['user']['avatar'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION['user']['name'] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin' ?>" class="nav-link active">
                <i class="fas fa-home"></i>
                <p>Thống kê</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/danh-muc' ?>" class="nav-link">
                <i class="fas fa-sitemap"></i>
                <p>
                  Danh mục
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/san-pham' ?>" class="nav-link">
                <i class="fas fa-shopping-bag"></i>
                <p>
                  Sản phẩm
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/thuong-hieu' ?>" class="nav-link">
                <i class="fas fa-gem"></i>
                <p>
                  Thương hiệu
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/slide-show' ?>" class="nav-link">
                <i class="fas fa-images"></i>
                <p>
                  Slide Show
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/user' ?>" class="nav-link">
                <i class="fas fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/hoadon' ?>" class="nav-link">
              <i class="fas fa-money-bill"></i>
                <p>
                  Hóa Đơn
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/comment' ?>" class="nav-link">
                <i class="fas fa-comments"></i>
                <p>
                  Comment
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'cp-admin/blog'?>" class="nav-link">
                <i class="fa fa-book" aria-hidden="true"></i>
                <p>
                  Tin tức
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL . 'logout'?>" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
                <p>
                  Đăng xuất
                </p>
              </a>
            </li>

            <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>