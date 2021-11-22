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
    case 'gioi-thieu':
        require_once './client/business/homepage.php';
        about();
    case 'signin':
        require_once './client/business/homepage.php';
        signin();
    case 'signup':
        require_once './client/business/homepage.php';
        signup();
    case 'danh-muc':
        require_once './client/business/category.php';
        list_product();
        break;
    case 'chi-tiet/':
        require_once './client/business/homepage.php';
        detail();
        break;
    case 'cp-admin':
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;
    case 'cp-admin/san-pham':
        require_once './admin/business/dashboard.php';
        Sanpham();
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
        editsanpham($id,$id_dm,$th);
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
    case 'cp-admin/thuong-hieu':
        require_once './admin/business/dashboard.php';
        Thuonghieu();
        break;
    case 'cp-admin/slide-show':
        require_once './admin/business/dashboard.php';
        Slideshow();
        break;
    case 'cp-admin/user':
        require_once './admin/business/dashboard.php';
        User();
        break;
    case 'cp-admin/comment':
        require_once './admin/business/dashboard.php';
        Comment();
        break;
    default:
        # code...
        break;
}
