<?php
require_once './dao/system_dao.php';
function dashboard_index(){
    $totalProduct = rand(100, 999);
    $totalProfit = rand(1000, 500000);
    $totalCustomer = rand(50, 20000);
    admin_render('dashboard/index.php', 
        compact('totalProduct', 'totalProfit', 'totalCustomer')); 
}
function Sanpham()
{
    $sql = 'SELECT sp.id_sp, sp.id_dm, sp.id_th, sp.ten_sp, sp.anh_sp, sp.gia_sp, sp.giam_gia, 
    sp.bao_hanh, sp.trang_thai, th.ten_th FROM san_pham AS sp 
    INNER JOIN thuong_hieu AS th ON sp.id_th = th.id_th ORDER BY sp.id_sp DESC';
    $list = select_all_product($sql);
    admin_render('dashboard/sanpham.php',compact('list'));
}

?>