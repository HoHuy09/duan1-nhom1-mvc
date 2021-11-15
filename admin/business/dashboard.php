<?php
require_once './dao/system_dao.php';
function dashboard_index()
{
    $totalProduct = rand(100, 999);
    $totalProfit = rand(1000, 500000);
    $totalCustomer = rand(50, 20000);
    admin_render(
        'dashboard/index.php',
        compact('totalProduct', 'totalProfit', 'totalCustomer')
    );
}
function Sanpham()
{
    $sql = 'SELECT sp.id_sp, sp.id_dm, sp.id_th, sp.ten_sp, sp.anh_sp, sp.gia_sp, sp.giam_gia, 
    sp.bao_hanh, sp.trang_thai, th.ten_th FROM san_pham AS sp 
    INNER JOIN thuong_hieu AS th ON sp.id_th = th.id_th ORDER BY sp.id_sp DESC';
    $list = select_all_product($sql);
    admin_render('dashboard/sanpham.php', compact('list'));
}
function Danhmuc()
{
    $list = select_danh_muc();
    admin_render('dashboard/danhmuc.php', compact('list'));
}

function Thuonghieu()
{
    $sql = 'SELECT * FROM thuong_hieu ORDER BY id_th DESC';
    $listBrand = select_page($sql);
    admin_render('dashboard/thuonghieu.php', compact('listBrand'));
}

function Slideshow()
{
    $sql = 'SELECT * FROM slide ORDER BY id_slide DESC';
    $listSlide = select_all_follow_order($sql);
    admin_render('dashboard/slideshow.php', compact('listSlide'));
}
function User()
{
    $sql = 'SELECT * FROM user ORDER BY id_user DESC';
    $listUser = select_all_follow_order($sql);
    admin_render('dashboard/user.php', compact('listUser'));
}
function Comment()
{

    admin_render('dashboard/user.php', compact('listUser'));
}
