<?php
require_once './dao/system_dao.php';
function list_product(){
    
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th  where id_dm = '$id'";
    } else {
        $value = isset($_GET['search-box']) ? $_GET['search-box'] : "";
        $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th WHERE 
                            ten_sp like '%$value%'
                            OR gia_sp LIKE '%$value%' 
                            OR mo_ta LIKE '%$value%'
                            ";
    
    }
    $result = select_page($sql);
    $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th ORDER BY luot_xem desc limit 6";
    $viewss = select_page($sql);
    client_render('category/index.php',compact('result','listRecord','thuonghieu','viewss'));
}
function list_thuonghieu(){
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th ORDER BY luot_xem desc limit 6";
    $viewss = select_page($sql);
    if (isset($_GET['th'])) {
        $id = $_GET['th'];
        $sql = "SELECT * FROM san_pham   where id_th = '$id'";
    } else {
        $value = isset($_GET['search-box']) ? $_GET['search-box'] : "";
        $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th WHERE 
                            ten_sp like '%$value%'
                            OR gia_sp LIKE '%$value%' 
                            OR mo_ta LIKE '%$value%'
                            ";
    
    }
    $result = select_page($sql);
    client_render('category/thuonghieu.php',compact('listRecord','thuonghieu','viewss','result'));
}


function lienhe(){
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    client_render('homepage/lienhe.php',compact('listRecord','thuonghieu'));
}

?>