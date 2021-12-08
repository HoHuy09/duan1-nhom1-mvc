<?php
require_once './dao/system_dao.php';
function home()
{

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
    $listSlide = select_all_follow_order($sql); // slide
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    client_render('homepage/index.php', compact('products', 'listSale', 'luotXem', 'sanPhamMoi', 'listSlide', 'listRecord', 'thuonghieu'));
}

function about2()
{
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    client_render('homepage/gioithieu.php', compact('listRecord', 'thuonghieu'));
}
function signin()
{
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    $msg = [];
    if (isset($_REQUEST) && isset($_POST['btn-create'])) {
        $acc = $_REQUEST['acc'];

        $pwd = $_REQUEST['pwd'];
        $retype_pwd = $_REQUEST['retype_pwd'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $roles = 0;
        //    $file = $_FILES['file']['name'];

        if (empty($acc && $pwd && $retype_pwd && $name && $email)) {
            $msg[] = '<script> alert("Bạn chưa điền đầy đủ thông tin") </script>';
        }
        // $temp = $_FILES['file']['tmp_name'];
        // move_uploaded_file($temp, 'img/' . $file);
        if ($pwd !== $retype_pwd) {
            $msg[] = '<script> alert("Mật khẩu không khớp") </script>';
        }
        if (empty($msg)) {

            user_create_acc($acc, $pwd, $name, $email, $roles);
            header('location: ' . BASE_URL . 'signup');
        }
    }
    client_render('homepage/signin.php', compact('listRecord', 'thuonghieu'));
}
function signup()
{
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);

    if (isset($_REQUEST) && isset($_POST['btn-login'])) {
        $acc = $_REQUEST['acc'];
        $pwd = $_REQUEST['pwd'];
        try {
            $userInfo = user_login($acc);

            if (empty($userInfo)) {
            } else {
                if (password_verify($pwd, $userInfo['passwd'])) {
                    $_SESSION['user'] = $userInfo;

                    header('Location:' . BASE_URL);
                } else {
                    header('Location:' . BASE_URL . 'signup');
                }
            }
        } catch (PDOException $e) {
            die("Lỗi kết nối" . $e->getMessage());
        }
    }
    client_render('homepage/signup.php', compact('listRecord', 'thuonghieu'));
}
function detail()
{
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
    if (isset($_POST['btnComment'])) {
        $id_user = $_SESSION['user']['id_user'];
        extract($_POST);
        if ($content == "") {
            $err_comment = "Bạn cần nhập vào bình luận";
        }
        $id_sp = $id;
        $dates = date('Y-m-d H:i:s');
        $sql = "INSERT INTO binh_luan (id_user,id_sp,noi_dung,thoi_gian) VALUES ('$id_user','$id_sp','$content','$dates')";
        $conn = get_connect();
        $stmt = $conn->prepare($sql);

        if ($id_user != 0) {
            if (!isset($err_comment)) {
                $stmt->execute();
                header("location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    client_render('homepage/detail.php', compact('products', 'binhLuan', 'salesPrdt', 'product', 'listRecord', 'thuonghieu'));
}
function tintuc()
{
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    $sql = "SELECT * FROM tin_tuc ORDER BY ma_tin_tuc desc limit 6";
    $tintuc = select_page($sql);
    client_render('homepage/tintuc.php', compact('tintuc', 'listRecord', 'thuonghieu'));
}
function logout()
{
    if (isset($_SESSION['user']) && isset($_SESSION['user']) != "") {
        unset($_SESSION['user']);
    }

    header('location:' . BASE_URL);
}
function favorite_product()
{
    $id = $_GET['id'];

    // ktra xem đã được yêu thích sản phẩm này hay chưa 
    $userId = $_SESSION['user']['id_user'];
    $checkFavoriteProduct = "select * from favorite_products where product_id = $id and user_id = $userId";
    $favorite = executeQuery($checkFavoriteProduct, false);
    // nếu chưa có thì lưu vào db
    if (!$favorite) {
        $currentTime = date("Y-m-d h:i:s");
        $addFavoriteQuery = "insert into favorite_products 
                                (user_id, product_id, created_at)
                            values 
                                ($userId, $id, '$currentTime')";
        executeQuery($addFavoriteQuery);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
function add2Cart()
{
    $pId = $_GET['id'];
    // lấy thông tin sản phẩm
    $getProductByIdQuery = "select * from san_pham where id_sp = $pId";
    $product = executeQuery($getProductByIdQuery, false);
    if (!$product) {
        header('location: ' . BASE_URL);
        die;
    }
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    // kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
    $existedIndex = -1;
    foreach ($cart as $index => $item) {
        if ($item['id_sp'] == $product['id_sp']) {
            $existedIndex = $index;
            break;
        }
    }
    // nếu có rồi thì cộng thêm 1 đơn vị vào quantity
    if ($existedIndex != -1) {
        $cart[$existedIndex]['quantity']++;
    } else {
        // nếu chưa có thì thêm vào giỏ với quanity mặc định = 1
        $product['quantity'] = 1;
        $cart[] = $product;
    }

    $_SESSION['cart'] = $cart;

    header('location: ' . BASE_URL . 'check-out');
    die;
}
function checkout()
{
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        header('location: ' . BASE_URL);
        die;
    }
    $cart = $_SESSION['cart'];
    $sql = "SELECT * FROM danh_muc";
    $listRecord = select_page($sql);
    $sql = "SELECT * FROM thuong_hieu";
    $thuonghieu = select_page($sql);
    client_render('homepage/checkout.php', compact('cart', 'listRecord', 'thuonghieu'));
}
function paycart()
{
    $status = 0;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    // insert dữ liệu để tạo hóa đơn mới, sau đó lấy id của hóa đơn
    $createInvoiceQuery = "insert into invoices 
                                (customer_name, customer_phone_number, customer_email, 
                                    customer_address, note,status)
                            values
                                ('$name', '$phone', '$email', '$address', '$note','$status')";
    $invoiceId = insertDataAndGetId($createInvoiceQuery);
    $totalPrice = 0;
    // chạy vòng lặp qua các phần tử của giỏ hàng, sau đó insert dữ liệu vào bảng invoice_detail

    foreach ($_SESSION['cart'] as $item) {
        $productId = $item['id_sp'];
        $price = $item['gia_sp'];
        $quantity = $item['quantity'];
        $totalPrice += $price * $quantity;
        $insertInvoiceDetailQuery = "insert into invoice_detail 
                                        (invoice_id, product_id, quantity, unit_price)
                                    values 
                                        ($invoiceId, $productId, $quantity, $price)";
        executeQuery($insertInvoiceDetailQuery, false);
    }
    // Cập nhật tổng số tiền vào hóa đơn
    $updateTotalPriceToInvoice = "update invoices
                                    set total_price = $totalPrice
                                where id = $invoiceId";
    executeQuery($updateTotalPriceToInvoice, false);

    unset($_SESSION['cart']);

    header('location: ' . BASE_URL);
    die;
}
function yeuthich()
{
    $acc = $_SESSION['user']['account'];
    $sql = "SELECT * FROM favorite_products,user,san_pham WHERE favorite_products.product_id = san_pham.id_sp and user.id_user  = favorite_products.user_id and user.account =  '$acc'";
    $yeuthich = select_page($sql);

    client_render('homepage/yeuthich.php', compact('yeuthich'));
}
function deleteyeuthich()
{
    $id = $_GET['id'];
    $sql = "DELETE FROM favorite_products WHERE id = $id limit 5";
    delete($sql, $id);
    header("location: " . BASE_URL . "yeuthich");
}

function detailTintuc()
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc = $id";
    $list = select_dmuc($sql);

    client_render('homepage/detailtintuc.php', compact('list'));
}
