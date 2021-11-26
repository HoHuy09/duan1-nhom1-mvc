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
    if (!isset($_GET['id_bl']) && !isset($_GET['id_sp'])) {
        header('Location: ../frames_func.php?page_layout=comment');
    }
    $id = intval($_GET['id_bl']);
    $id_sp = intval($_GET['id_sp']);
    $sql = "SELECT u.name, bl.noi_dung, bl.thoi_gian, bl.id_bl, bl.id_sp FROM binh_luan AS bl 
    INNER JOIN user AS u ON bl.id_user = u.id_user WHERE bl.id_bl = '$id' || bl.id_sp = '$id_sp'";
    $detailCmt = detail_cmt($sql, $id, $id_sp);
    admin_render('dashboard/commentDetail.php');
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
    $sql = "SELECT id_sp FROM san_pham WHERE id_sp = $id";
    $field = select_product_detail_follow_id($sql, $id);

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
    admin_render('dashboard/danhmuc/edit.php');
}


function tintuc()
{
    admin_render('dashboard/danhmuc/tintuc.php');
}
