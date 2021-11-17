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
function signin(){
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    $msg = [];
    if(isset($_REQUEST) && isset($_POST['btn-create'])){
       $acc = $_REQUEST['acc'];
       
       $pwd = $_REQUEST['pwd'];
       $retype_pwd = $_REQUEST['retype_pwd'];
       $name = $_REQUEST['name'];
       $email = $_REQUEST['email'];
       $roles = 0;
    //    $file = $_FILES['file']['name'];
    
       if(empty($acc && $pwd && $retype_pwd && $name && $email )){
           $msg[] = '<script> alert("Bạn chưa điền đầy đủ thông tin") </script>';
        }
        // $temp = $_FILES['file']['tmp_name'];
        // move_uploaded_file($temp, 'img/' . $file);
       if($pwd !== $retype_pwd){
        $msg[] = '<script> alert("Mật khẩu không khớp") </script>';
       }
       if(empty($msg)){
           
            user_create_acc($acc, $pwd, $name, $email, $roles);
            header('location: '.BASE_URL.'signup');
       }
    }
    client_render('homepage/signin.php',compact('listRecord','thuonghieu'));
}
function signup(){
    
    client_render('homepage/signup.php');
}



?>