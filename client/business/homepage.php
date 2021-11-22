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
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    
    if(isset($_REQUEST) && isset($_POST['btn-login'])){
        $acc = $_REQUEST['acc'];
        $pwd = $_REQUEST['pwd'];
        try{
            $userInfo = user_login($acc);
            
            if(empty($userInfo)){
                echo '<script>alert("Tài khoản không tồn tại")</script>';
            }else{
                if(password_verify($pwd, $userInfo['passwd'])){
                    $_SESSION['user'] = $userInfo;
                    echo '<script>alert("Đăng nhập thành công")</script>';
                    header('Location:'.BASE_URL);
                }else{
                    echo '<script>alert("Mật khẩu không chính xác")</script>';
                }
            }
        }catch(PDOException $e){
            die("Lỗi kết nối" .$e->getMessage());
        }
        
    }
    client_render('homepage/signup.php',compact('listRecord','thuonghieu'));
}
function detail(){
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th WHERE id_sp = $id";
        $product = select_dmuc($sql);
    }
    //
    $sql = "SELECT * FROM san_pham ORDER BY giam_gia DESC LIMIT 4";
    $salesPrdt = select_page($sql);
    //
    $a = $product['id_dm'];
    $b = $product['id_sp'];
    
    $sql = "SELECT * FROM san_pham WHERE  id_dm = '$a' AND id_sp != '$b' LIMIT 6";
    $products = select_page($sql);
    //
    $sql = "SELECT * FROM binh_luan INNER JOIN user ON binh_luan.id_user = user.id_user WHERE id_sp = '$id' ORDER BY id_bl DESC LIMIT 4";
    $binhLuan = select_page($sql);
    //
    $luotXemUD = $product['luot_xem'] + 1;
    $sqlUd = "UPDATE san_pham SET luot_xem='$luotXemUD' WHERE id_sp = '$id'";
    $conn = get_connect();
    $stmt = $conn->prepare($sqlUd);
    $stmt->execute();
    //
    // if (isset($_POST['btnComment'])) {
    //     $id_user = $session['id_user'];
    //     extract($_POST);
    //     if ($content == "") {
    //         $err_comment = "Bạn cần nhập vào bình luận";
    
    //     }
    //     $id_sp = $id;
    //     $dates = date('Y-m-d H:i:s');
    //     $sql = "INSERT INTO binh_luan (id_user,id_sp,noi_dung,thoi_gian) VALUES ('$id_user','$id_sp','$content','$dates')";
    //     $conn = get_connect();
    //     $stmt = $conn->prepare($sql);
    //     if ($id_user != 0) {
    //         if (!isset($err_comment)) {
    //             $stmt->execute();
    //             header("location:" . "/PHP1/assignment" . "/detail.php?id=" . $id . "#comment");
    //         }
    //     } else {
    //         echo "<script>
    //                 alert('Bạn cần đăng nhập để được Bình luận.');
    //                 history.back();
    //             </script>";
        
    //     }
    // }
    client_render('homepage/detail.php',compact('products','binhLuan','salesPrdt','product','listRecord','thuonghieu'));
}


?>