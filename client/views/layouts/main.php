<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WE16302 - Dự án 1</title>
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/base.css" />
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/grid.css" />
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/index.css" />
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/products.css" />
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/detail.css" />
    <link rel="stylesheet" href="<?= PUBLIC_PATH ?>css/gioithieu.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


</head>

<body>
    <div class="wrapper">
        <header class="wrapper__header">
            <div class="header__group">
                <div class="grid wide">
                    <div class="row col">
                        <section class="l-6 col">
                            <div class="header__social">
                                <span class="header__social-box">
                                    <i class="fas fa-phone-volume icon-social"></i>
                                    <span class="header__social-box-title">096-5422-573</span>
                                </span>
                                <span class="header__social-box">
                                    <i class="fas fa-envelope icon-social"></i>
                                    <span class="header__social-box-title title-email">huyhtph07087@fpt.edu.vn</span>
                                </span>
                            </div>
                        </section>
                        <section class="l-6 col">
                            <div class="header__info">
                                <span class="header__info-box">
                                    <i class="fas fa-user-circle icon-user"></i>
                                    <a href="<?= BASE_URL . 'signin' ?>" class="header__info-box-link create">Đăng Kí</a>
                                    <span class="header__info-box-link-border">/</span>
                                    <a href="<?= BASE_URL . 'signup' ?>" class="header__info-box-link login">Đăng nhập</a>
                                </span>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="header__group2">
                <div class="grid wide">
                    <div class="row col header__group2-box">
                        <div class="l-12 col header__search-box">
                            <div class="row">
                                <!-- logo -->
                                <section class="l-2 col">
                                    <a href="index.php" class="header__logo">Wshop</a>
                                </section>
                                <!-- box search -->
                                <section class="l-7 col">
                                    <form action="<?= BASE_URL . 'danh-muc' ?>" class="header__form">
                                        <div class="header__form-file">
                                            <input type="text" class="header__form-search" placeholder="Tìm kiếm trên Wshop" name="search-box" value="">
                                            <!-- <input type="hidden" name="search" value="tìm kiếm"> -->
                                            <button class="header__form-btn" type="submit">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </section>
                                <!-- thông tin người dùng , giỏ hàng -->
                                <section class="l-3 col ">
                                    <div class="header__group-info">
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                        ?>
                                            <div class="header__user">
                                                <i class="fas fa-user-circle header__icon-user"></i>
                                                <ul class="header__user-list">
                                                    <li class="header__user-item">
                                                        <i class="fas fa-cog user-item-icon"></i>
                                                        <a href="<?php
                                                                    // if ($_SESSION['user']['roles'] == 1) {
                                                                    //     echo 'http://localhost/duan1-nhom1/assignment/admin/frames_func.php';
                                                                    // } elseif ($_SESSION['user']['roles'] == 2) {
                                                                    //     echo 'http://localhost/duan1-nhom1/assignment/seller/frames_func.php';
                                                                    // } elseif ($_SESSION['user']['roles'] == 0) {
                                                                    //     echo 'http://localhost/duan1-nhom1/assignment/';
                                                                    // }
                                                                    echo BASE_URL . 'cp-admin'
                                                                    ?>
                                                                
                                                                " class="header__user-link">Quản lý</a><span style="color: red;">
                                                            <?php
                                                            if ($_SESSION['user']['roles'] == 0) {
                                                                echo 'No';
                                                            }
                                                            ?>
                                                        </span>

                                                    </li>
                                                    <li class="header__user-item">
                                                        <i class="fas fa-sign-out-alt user-item-icon"></i>
                                                        <a href="<?= BASE_URL . 'logout' ?>" class="header__user-link">Đăng xuất</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="header__shopping">
                                                <a href="<?= BASE_URL . 'check-out' ?>" class="header__shopping-link">
                                                    <i class="fas fa-shopping-cart icon-shopping"></i>
                                                </a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="header__shopping">
                                                <a href="" class="header__shopping-link">
                                                    <i class="fas fa-shopping-cart icon-shopping"></i>
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>

                                </section>
                            </div>
                        </div>
                        <!-- nav menu -->
                        <nav class="l-12 col header__nav">
                            <ul class="header__nav-list">
                                <li class="header__nav-item">
                                    <a href="<?= BASE_URL ?>" class="header__nav-link">Trang chủ</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="<?= BASE_URL . 'danh-muc'  ?>" class="header__nav-link">Sản Phẩm</a>
                                    <ul class="menu_cap2_ul">
                                        <?php foreach ($listRecord as $menu) : ?>
                                            <li class="menu_cap2_li">
                                                <a href="<?= BASE_URL . 'danh-muc?id=' . $menu['id_dm']  ?>" class="menu_cap2_a">
                                                    <?php echo $menu['ten_dm'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="header__nav-item">
                                    <a href="<?= BASE_URL . 'thuong-hieu'  ?>" class="header__nav-link">Thương hiệu</a>
                                    <ul class="menu_cap2_ul">
                                        <?php foreach ($thuonghieu as $menu) : ?>
                                            <li class="menu_cap2_li">
                                                <a href="<?= BASE_URL . 'thuong-hieu?th=' . $menu['id_th'] ?>" class="menu_cap2_a">
                                                    <?php echo $menu['ten_th'] ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <!-- <li class="header__nav-item">
                                <a href="<?php BASE_URL . "about" ?>" class="header__nav-link">Giới Thiệu</a>
                            </li> -->
                                <li class="header__nav-item">
                                    <a href="<?= BASE_URL . "tin-tuc" ?>" class="header__nav-link">Tin Tức</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="<?= BASE_URL . "lien-he" ?>" class="header__nav-link">Liên Hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <main>

        <?php include_once $view; ?>
    </main>
    <footer class="wrapper__footer">
        <div class="grid wide">
            <div class="row">
                <section class="l-12 col">
                    <div class="footer__end">&copy;2021 - huyhtph07087@fpt.poly.edu.vn All Right Reserved.</div>
                </section>
            </div>
        </div>
    </footer>
    <script src="<?= PUBLIC_PATH ?>js/nav_fiexd.js"></script>
    <script src="<?= PUBLIC_PATH ?>js/login_form.js"></script>
    <script src="<?= PUBLIC_PATH ?>js/list_control.js"></script>
    <script src="<?= PUBLIC_PATH ?>js/slide.js"></script>
    <script src="<?= PUBLIC_PATH ?>js/filter_product.js"></script>
</body>

</html>