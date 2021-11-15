<?php
session_start();
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
    case 'danh-muc':
        require_once './client/business/category.php';
        list_product();
        break;
    case 'cp-admin':
        require_once './admin/business/dashboard.php';
        dashboard_index();
        break;
    case 'cp-admin/san-pham':
        require_once './admin/business/dashboard.php';
        Sanpham();
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
