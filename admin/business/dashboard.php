<?php
require_once './dao/system_dao.php';


function dashboard_index()
{
    $sql = 'SELECT count(id_sp) FROM san_pham';
    $totalProduct = count_all($sql);
    $totalProfit = rand(1000, 500000);
    $totalCustomer = rand(50, 20000);
    admin_render(
        'dashboard/index.php',
        compact('totalProduct', 'totalProfit', 'totalCustomer')

    );
}
function Sanpham()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    if ($keyword != '') {
        $sql = "SELECT * FROM san_pham INNER JOIN thuong_hieu ON san_pham.id_th = thuong_hieu.id_th WHERE 
        ten_sp like '%$keyword%'
        OR gia_sp LIKE '%$keyword%' 
        OR mo_ta LIKE '%$keyword%'
        ";
        $list = select_page($sql);
    } else {
        $sql = "SELECT sp.id_sp, sp.id_dm, sp.id_th, sp.ten_sp, sp.anh_sp, sp.gia_sp, sp.giam_gia, 
    sp.bao_hanh, sp.trang_thai, th.ten_th FROM san_pham AS sp 
    INNER JOIN thuong_hieu AS th ON sp.id_th = th.id_th ORDER BY sp.id_sp DESC ";
        $list = select_all_product($sql);
    }
    admin_render('dashboard/sanpham.php', compact('list', 'keyword'));
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
    $sql = "SELECT sp.ten_sp, bl.id_bl,bl.thoi_gian, COUNT(bl.id_sp) as sl, bl.id_sp 
    FROM binh_luan AS bl INNER JOIN san_pham AS sp ON bl.id_sp = sp.id_sp 
    GROUP BY sp.ten_sp ORDER BY bl.id_bl DESC";
    $listCmt = select_all_follow_order($sql);
    
    admin_render('dashboard/comment.php', compact('listCmt'));
}
function CommentDetail()
{
    if (!isset($_GET['id_bl']) && !isset($_GET['id_bl'])) {
        header('Location: '.BASE_URL.'cp-admin/comment/detail');
    }

    $id = intval($_GET['id_bl']);
    $id_sp = intval($_GET['id_sp']);
    $sql = "SELECT u.name, bl.noi_dung, bl.thoi_gian, bl.id_bl, bl.id_sp FROM binh_luan AS bl 
    INNER JOIN user AS u ON bl.id_user = u.id_user WHERE bl.id_bl = '$id' || bl.id_sp = '$id_sp'";
    $detailCmt = detail_cmt($sql, $id, $id_sp);
    admin_render('dashboard/commentDetail.php',compact('detailCmt'));
}
function addsanpham()
{
    $listCate = select_danh_muc();
    $sql = 'SELECT id_th, ten_th FROM thuong_hieu';
    $listBrand = select_thuong_hieu($sql);
    $msg = [];
    if (isset($_POST['btnSend'])) {
        $danh_muc = $_POST['danh_muc'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $sale = $_POST['sale'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $status = $_POST['status'];


        $target = $_FILES['file'];
        $filename = "";
        if ($target['size'] > 0) {
            $filename = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $filename);
            $filename = 'img/' . $filename;
        }
        if (empty($msg)) {
            add_product($danh_muc, $name, $filename,  $price, $brand, $sale, $desc, $date, $status);
            header('Location:' . BASE_URL . 'cp-admin/san-pham');
        }
    }
    admin_render('dashboard/sanpham/add.php', compact('listCate', 'listBrand'));
}
function deletesanpham($id)
{
    $id = intval($_GET['id']);
    $sql_delete = "DELETE FROM san_pham WHERE id_sp = $id";
    delete($sql_delete, $id);
    header('Location:' . BASE_URL . 'cp-admin/san-pham');
}
function editsanpham($id, $id_dm, $th)
{
    $listCate = select_danh_muc();
    $sql = 'SELECT id_th, ten_th FROM thuong_hieu';
    $listBrand = select_thuong_hieu($sql);
    $id = intval($_GET['id']);
    $id_dm = intval($_GET['id_dm']);
    $th = intval($_GET['th']);
    $sql = "SELECT * FROM san_pham WHERE id_sp = $id && id_dm = $id_dm && id_th = $th";
    $field = select_product_follow_id($sql, $id, $id_dm, $th);

    $msg = [];
    if (isset($_POST['btnSend'])) {
        $danh_muc = $_POST['danh_muc'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $sale = $_POST['sale'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $status = $_POST['status'];

        $target = $_FILES['file'];
        $filename = "";
        if ($target['size'] > 0) {
            $filename = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $filename);
            $filename = 'img/' . $filename;
        }
        if (empty($msg)) {

            edit_product($danh_muc, $name, $filename, $price, $brand, $sale, $desc, $date, $status, $id);
            header('Location:' . BASE_URL . 'cp-admin/san-pham');
        }
    }

    admin_render('dashboard/sanpham/edit.php', compact('listCate', 'listBrand', 'field'));
}

function addcategory()
{
    $msg = [];
    if (isset($_POST['addCategory'])) {
        $name = $_POST['name'];

        if (empty($name)) {
            $msg[] =  'Bạn còn để trống dữ liệu !';
        }
        if (empty($msg)) {
            $sql = "INSERT INTO danh_muc(ten_dm) VALUE ('$name')";
            add_category($sql, $name);
            header('Location:' . BASE_URL . 'cp-admin/danh-muc');
        }
    }

    admin_render('dashboard/danhmuc/add.php');
}
function deletedanhmuc($id)
{
    $sql_delete = "DELETE FROM danh_muc WHERE id_dm = $id";
    delete($sql_delete, $id);
    header('Location:' . BASE_URL . 'cp-admin/danh-muc');
}

function editdanhmuc()
{
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM danh_muc WHERE id_dm = '$id'";
    $field = select_danh_muc_fllow_id($sql, $id);


    if (isset($_REQUEST) && isset($_POST['addCategory'])) {
        $name = $_POST['name'];
        $sql = "UPDATE danh_muc SET ten_dm = '$name' WHERE id_dm = '$id'";
        edit_category($sql, $id);
        header('Location:' . BASE_URL . 'cp-admin/danh-muc');
    }

    admin_render('dashboard/danhmuc/edit.php', compact('field'));
}
function addthuonghieu()
{
    $msg = [];
    if (isset($_POST['addCategory'])) {
        $name = $_POST['name'];

        if (empty($name)) {
            $msg[] =  'Bạn còn để trống dữ liệu !';
        }
        if (empty($msg)) {
            $sql = "INSERT INTO thuong_hieu(ten_th) VALUE ('$name')";
            add_category($sql, $name);
            header('Location:' . BASE_URL . 'cp-admin/thuong-hieu');
        }
    }
    admin_render('dashboard/thuonghieu/add.php');
}
function deletethuonghieu()
{
    $id  = $_GET['id'];
    $sql_delete = "DELETE FROM thuong_hieu WHERE id_th = $id";
    delete($sql_delete, $id);
    header('Location:' . BASE_URL . 'cp-admin/thuong-hieu');
}
function edithuonghieu()
{
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM thuong_hieu WHERE id_th = '$id'";
    $brand = select_danh_muc_fllow_id($sql, $id);

    if (isset($_REQUEST) && isset($_POST['addCategory'])) {
        $name = $_REQUEST['name'];
        $sql = "UPDATE thuong_hieu SET ten_th = '$name' WHERE id_th = '$id'";
        edit_category($sql, $id);
        header('Location:' . BASE_URL . 'cp-admin/thuong-hieu');
    }
    admin_render('dashboard/thuonghieu/edit.php', compact('brand'));
}
function addslideshow()
{
    $msg = [];
    if (isset($_REQUEST) && isset($_POST['addCategory'])) {
        $name = $_REQUEST['name'];
        $link = $_REQUEST['duonglink'];


        $target = $_FILES['file'];

        $file = "";
        if ($target['size'] > 0) {
            $file = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $file);
            $file = 'img/' . $file;
        }

        if (empty($msg)) {
            $sql = "INSERT INTO slide (ten_slide, anh_slide, link_slide) VALUES('$name', '$file', '$link')";
            add_slide($sql, $name, $file, $link);
            header('Location:' . BASE_URL . 'cp-admin/slide-show');
        }
    }
    admin_render('dashboard/slideshow/add.php');
}
function deleteslideshow()
{
    $id  = $_GET['id'];
    $sql_delete = "DELETE FROM slide WHERE id_slide = $id";
    delete($sql_delete, $id);
    header('Location:' . BASE_URL . 'cp-admin/slide-show');
}
function editslideshow()
{
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM slide WHERE id_slide = '$id'";
    $field = select_danh_muc_fllow_id($sql, $id);
    if (isset($_REQUEST) && isset($_POST['addCategory'])) {
        $name = $_REQUEST['name'];
        $link = $_REQUEST['duonglink'];
        $target = $_FILES['file'];
        
        $file = "";
        if ($target['size'] > 0) {
            $file = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $file);
            $file = 'img/' . $file;
        }

        if (empty($msg)) {
            edit_slide($name, $file, $link, $id);
            header('Location:' . BASE_URL . 'cp-admin/slide-show');
        }
    }
    admin_render('dashboard/slideshow/edit.php', compact('field'));
}
function Oder(){
    $sql = "SELECT * FROM invoices ";
    
    $oder = select_page($sql);
    
    admin_render('dashboard/hoadon.php',compact('oder'));
}
function adduser(){
    
    $msg = [];
    if (isset($_REQUEST)&&isset($_POST['addCategory'])) {
        $account = $_REQUEST['name'];
        $name = $_REQUEST['hoten'];
        $email = $_REQUEST['email'];
        $password =  password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $role = $_REQUEST['role'];
        $target = $_FILES['file'];
       

        $file = "";
        if ($target['size'] > 0) {
            $file = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $file);
            $file2 =  $file;
        }
        if (empty($name)) {
            $msg[] =  'Bạn còn để trống dữ liệu !';
        }
        if (empty($msg)) {
            $sql = "INSERT INTO user (account, passwd, name, email, avatar, roles) VALUES('$account', '$password', '$name','$email','$file2','$role')";
            adduser234($sql);
            header('Location:' . BASE_URL . 'cp-admin/user');
        }
    }
    //
    admin_render('dashboard/user/add.php');
}
function edituser(){
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM user WHERE id_user = $id";
    $user = select_product_detail_follow_id($sql, $id);
    $msg = [];
    if (isset($_REQUEST)&&isset($_POST['addCategory'])) {
        $account = $_REQUEST['name'];
        $name = $_REQUEST['hoten'];
        $email = $_REQUEST['email'];
        $password =  password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $role = $_REQUEST['role'];
        $target = $_FILES['file'];
       

        $file = "";
        if ($target['size'] > 0) {
            $file = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $file);
            $file2 =  $file;
        }
        if (empty($name)) {
            $msg[] =  'Bạn còn để trống dữ liệu !';
        }
        if (empty($msg)) {
            edit_user($account, $password, $name, $email, $file2, $id ,$role);
            header('Location:' . BASE_URL . 'cp-admin/user');
        }
    }
    admin_render('dashboard/user/edit.php',compact('user'));
}
function deleteuser(){
    $id = intval($_GET['id']);
    $sql_delete = "DELETE FROM user WHERE id_user = $id";
    delete($sql_delete, $id);
    header('Location:' . BASE_URL . 'cp-admin/user');
}
function deletecomment(){
    $id_sp = $_GET['id_sp'];
    
    $id = $_GET['id_bl'];
    $sql = "DELETE FROM binh_luan WHERE id_bl = $id && id_sp = $id_sp";
    delete_3($sql, $id, $id_sp);
    header("location:" . $_SERVER['HTTP_REFERER']);
}
function blog(){
    $sql = 'SELECT * FROM tin_tuc ORDER BY ma_tin_tuc DESC';
    $listSlide = select_page($sql);
    admin_render('dashboard/blog.php',compact('listSlide'));
}
function addblog(){
    $sql = 'SELECT * FROM user ORDER BY id_user DESC';
    $listUser = select_thuong_hieu($sql);
    $msg = [];
    if (isset($_REQUEST)&&isset($_POST['addCategory'])) {
        $tieude = $_REQUEST['name'];
        $tacgia = $_REQUEST['id_user'];
        $ndngan = $_REQUEST['nd_ngan'];
        $date = date('Y-m-d H:i:s');
        $nddai = $_REQUEST['nd_dai'];
        
        $target = $_FILES['file'];
       

        $file = "";
        if ($target['size'] > 0) {
            $file = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $file);
            $file2 =  $file;
        }
       
        if (empty($msg)) {
            $sql = "INSERT INTO tin_tuc (tieu_de, id_user, ngay_dang_tin, anh, nd_ngan, nd_dai) VALUES('$tieude', '$tacgia', '$date','$file2','$ndngan','$nddai')";
            adduser234($sql);
            header('Location:' . BASE_URL . 'cp-admin/blog');
        }
    }
    admin_render('dashboard/blog/add.php',compact('listUser'));
}
function editblog(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc = $id";
    $tintuc = select_dmuc($sql);
    
    $sql = 'SELECT * FROM user ORDER BY id_user DESC';
    $listUser = select_thuong_hieu($sql);
    $msg = [];
    if (isset($_REQUEST)&&isset($_POST['addCategory'])) {
        $tieude = $_REQUEST['name'];
        $tacgia = $_REQUEST['id_user'];
        $ndngan = $_REQUEST['nd_ngan'];
        $date = date('Y-m-d H:i:s');
        $nddai = $_REQUEST['nd_dai'];
        
        $target = $_FILES['file'];
       

        $file = "";
        if ($target['size'] > 0) {
            $file = uniqid() . '-' . $target['name'];
            move_uploaded_file($target['tmp_name'], './public/img/' . $file);
            $file2 =  $file;
        }
       
        if (empty($msg)) {
            edit_blog($tieude, $tacgia,$date, $ndngan, $nddai, $file2, $id );
            header('Location:' . BASE_URL . 'cp-admin/blog');
        }
    }
    admin_render('dashboard/blog/edit.php',compact('listUser','tintuc'));
}
function deleteblog(){
    $id = $_GET['id'];
    $sql = "DELETE FROM tin_tuc WHERE ma_tin_tuc = $id ";
    delete($sql,$id);
    header('Location:' . BASE_URL . 'cp-admin/blog');
}
function OderDetail(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM invoice_detail id 
    JOIN san_pham sp 
    ON id.product_id = sp.id_sp 
    WHERE id.invoice_id = $id";
    $oder = select_page($sql);
   
    
    admin_render('dashboard/hoadon/detail.php',compact('oder','id'));
}
function OderEdit(){
    
    $id = $_GET['id']; 
    $sql = "SELECT customer_name, customer_phone_number, customer_email, customer_address, note, total_price, status FROM invoices WHERE id=$id";
    $list = select_dmuc($sql);
    
    if (isset($_REQUEST)&&isset($_REQUEST['addCategory'])) {
        $khachhang = $_REQUEST['name'];
        $sdt = $_REQUEST['phone'];
        $diachi = $_REQUEST['address'];
        $email = $_REQUEST['email'];
        $note = $_REQUEST['note'];
        $bill = $_REQUEST['bill'];
        $status = $_REQUEST['status'];
        if (empty($msg)) {
            edit_bill( $khachhang, $sdt, $diachi, $email, $note,$bill,$status,$id);
            header('Location:' . BASE_URL . 'cp-admin/hoadon');
        }
    }
    admin_render('dashboard/hoadon/edit.php' ,compact('list'));
}
function editoderdetail(){
    $id_oder = $_GET['id_oder'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM invoice_detail WHERE id = $id";
    $list = select_dmuc($sql);
    if (isset($_REQUEST)&&isset($_REQUEST['addCategory'])) {
        $quantity = $_REQUEST['quantity'];
        
        if (empty($msg)) {
            edit_billdetail($id,$quantity);
            header("location:" . BASE_URL . 'cp-admin/hoadon/detail/?id='.$id_oder);
        }
    }
    $sql = "SELECT * FROM invoices id 
    JOIN invoice_detail sp 
    ON id.id = sp.invoice_id 
    WHERE sp.invoice_id = $id_oder";
    $oder = select_page($sql);
    
    $totalPrice=0;
    foreach ($oder as $item) {
        $totalPrice += $item['unit_price'] * $item['quantity'];
        
    }
    $updateTotalPriceToInvoice = "update invoices
                                    set total_price = $totalPrice
                                where id = $id_oder";
    executeQuery($updateTotalPriceToInvoice, false);
    admin_render('dashboard/hoadon/editdetail.php' ,compact('list'));
}