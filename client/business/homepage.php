<?php
require_once './dao/system_dao.php';
function home(){
    $sqlQuery = "select * from san_pham";
    $products = executeQuery($sqlQuery, true);
    $sql = "SELECT * FROM san_pham ORDER BY giam_gia desc limit 6";
    $listSale = select_page($sql);
//
    $sql = "SELECT * FROM san_pham ORDER BY luot_xem desc limit 10";
    $luotXem = select_page($sql);
//
    $sql = "SELECT * FROM san_pham ORDER BY id_sp desc limit 6";
    $sanPhamMoi = select_page($sql);
    $sql = "SELECT * FROM slide ORDER BY id_slide DESC";
    $listSlide = select_all_follow_order($sql);// slide
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    client_render('homepage/index.php', compact('products','listSale','luotXem','sanPhamMoi','listSlide','listRecord','thuonghieu'));
}

function about(){
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    client_render('homepage/gioithieu.php',compact('listRecord','thuonghieu'));
}



?>