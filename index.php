<?php
session_start();
$session = isset($_SESSION['user']) ? $_SESSION['user'] : "";
$url = isset($_GET['url']) ? $_GET['url'] : "/";
require_once './commons/utils.php';
switch ($url) {
    case '/':
        require_once './client/business/homepage.php';
        home();
        break;
    case 'signin':
        require_once './client/business/homepage.php';
        signin();
    case 'logout':
        require_once './client/business/homepage.php';
        logout();
    case 'signup':
        require_once './client/business/homepage.php';
        signup();
    case 'danh-muc':
        require_once './client/business/category.php';
        list_product();
        break;
    case 'thuong-hieu':
        require_once './client/business/category.php';
        list_thuonghieu();
        break;
    case 'chi-tiet/':
        require_once './client/business/homepage.php';
        detail();
        break;
    case 'tin-tuc':
        require_once './client/business/homepage.php';
        tintuc();
        break;
    case 'cp-admin':
        checkAuth([ADMIN_ROLE]);
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;
    case 'yeu-thich':
        require_once './client/business/homepage.php';
        favorite_product();
    case 'cp-admin/san-pham':
        require_once './admin/business/dashboard.php';
        Sanpham();
        break;
    case 'cp-admin/hoadon':
        require_once './admin/business/dashboard.php';
        Oder();
        break;
    case 'cp-admin/san-pham/add':
        require_once './admin/business/dashboard.php';
        addsanpham();
        break;
    case 'cp-admin/san-pham/edit':
        require_once './admin/business/dashboard.php';
        $id = intval($_GET['id']);
        $id_dm = intval($_GET['id_dm']);
        $th = intval($_GET['th']);
        editsanpham($id, $id_dm, $th);
        break;
    case 'cp-admin/san-pham/delete':
        require_once './admin/business/dashboard.php';
        $id = intval($_GET['id']);
        deletesanpham($id);
        break;
    case 'cp-admin/danh-muc':
        require_once './admin/business/dashboard.php';
        Danhmuc();
        break;
    case 'cp-admin/danh-muc/add':
        require_once './admin/business/dashboard.php';
        addcategory();
        break;
    case 'cp-admin/danh-muc/delete':
        require_once './admin/business/dashboard.php';
        $id = intval($_GET['id']);
        deletedanhmuc($id);
        break;
    case 'cp-admin/danh-muc/edit':
        require_once './admin/business/dashboard.php';
        editdanhmuc();
        break;
    case 'cp-admin/thuong-hieu':
        require_once './admin/business/dashboard.php';
        Thuonghieu();
        break;
    case 'cp-admin/thuong-hieu/add':
        require_once './admin/business/dashboard.php';
        addthuonghieu();
        break;
    case 'cp-admin/thuong-hieu/edit':
        require_once './admin/business/dashboard.php';
        edithuonghieu();
        break;
    case 'cp-admin/thuong-hieu/delete':
        require_once './admin/business/dashboard.php';
        deletethuonghieu();
        break;
    case 'cp-admin/slide-show':
        require_once './admin/business/dashboard.php';
        Slideshow();
        break;
    case 'cp-admin/slide-show/add':
        require_once './admin/business/dashboard.php';
        addslideshow();
        break;
    case 'cp-admin/slide-show/edit':
        require_once './admin/business/dashboard.php';
        editslideshow();
        break;
    case 'cp-admin/slide-show/delete':
        require_once './admin/business/dashboard.php';
        deleteslideshow();
        break;
    case 'cp-admin/user':
        require_once './admin/business/dashboard.php';
        User();
        break;
    case 'cp-admin/comment':
        require_once './admin/business/dashboard.php';
        Comment();
        break;
    case 'cp-admin/comment/detail':
        require_once './admin/business/dashboard.php';
        CommentDetail();
        break;
    case 'lien-he':
        require_once './client/business/category.php';
        lienhe();
        break;
    case 'add-to-cart':
        require_once './client/business/homepage.php';
        add2Cart();
        break;
    case 'check-out':
        require_once './client/business/homepage.php';
        checkout();
        break;
    case 'pay-cart':
        require_once './client/business/homepage.php';
        paycart();
        break;
    default:
        # code...
        break;
}
