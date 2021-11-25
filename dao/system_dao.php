<?php
function get_connect()
{
    $connect = new PDO("mysql:host=127.0.0.1;dbname=shoppings;charset=utf8", "root", "");
    return $connect;
}


function executeQuery($sql, $getAll = false)
{

    $connect = get_connect();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    if ($getAll) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}
function select_page($sql)
{
    $conn = get_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $listRecord = $stmt->fetchAll();
}

function select_dmuc($sql)
{
    $conn = get_connect();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $listRecord = $stmt->fetch();
}
function select_all_follow_order($sql)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}
function select_all_product($sql)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $list = $stmt->fetchAll();
    } catch (PDOException $e) {
        die('loi' . $e->getMessage());
    }
}
function select_danh_muc()
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare("SELECT * FROM danh_muc ORDER BY id_dm DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $listCate = $stmt->fetchAll();
    } catch (PDOException $e) {
        die('Loi truy van CSDL' . $e->getMessage());
    }
}
function select_thuong_hieu($sql)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $listBrand = $stmt->fetchAll();
    } catch (PDOException $e) {
        die('Loi truy van CSDL' . $e->getMessage());
    }
}
function add_product($danh_muc, $name, $filename,  $price, $brand, $sale, $desc, $date, $status)
{
    $conn = get_connect();
    $sql = "INSERT INTO san_pham (id_dm, ten_sp, anh_sp, gia_sp, id_th,
    giam_gia, mo_ta, bao_hanh, trang_thai)
        VALUES('$danh_muc', '$name', '$filename' ,  '$price', '$brand', '$sale', '$desc', '$date', '$status')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function select_product_detail_follow_id($sql, $id)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();
    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}
function delete($sql_delete, $id)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql_delete);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}
function select_product_follow_id($sql, $id, $id_dm, $th)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();
    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}
function edit_product($danh_muc, $name, $filename, $price, $brand, $sale, $desc, $date, $status, $id)
{
    $conn = get_connect();
    if ($filename != '') {
        $sql = "UPDATE san_pham SET id_dm='$danh_muc', ten_sp='$name', anh_sp='$filename', gia_sp='$price'
        ,id_th='$brand', giam_gia='$sale', mo_ta='$desc', bao_hanh='$date', trang_thai='$status' WHERE id_sp = '$id'";
    } else {
        $sql = "UPDATE san_pham SET id_dm='$danh_muc', ten_sp='$name', gia_sp='$price'
        ,id_th='$brand', giam_gia='$sale', mo_ta='$desc', bao_hanh='$date', trang_thai='$status' WHERE id_sp = '$id'";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
function count_all($sql)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}
function user_create_acc($acc, $pwd, $name, $email, $roles)
{
    try {
        $conn = get_connect();
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user (account, passwd, name, email,roles)
            VALUES ('$acc', '$pwd', '$name', '$email','$roles')");
        $stmt->execute();
        echo '<script>alert("Đăng kí tài khoản thành công")</script>';
    } catch (PDOException $e) {
        die('lỗi kết nối' . $e->getMessage());
    }
}
function user_login($acc)
{
    $conn = get_connect();
    $stmt = $conn->prepare("SELECT * FROM user WHERE account = '$acc'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $userInfo = $stmt->fetch();
}

function add_category($sql, $name)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}
function select_danh_muc_fllow_id($sql, $id)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $field = $stmt->fetch();
    } catch (PDOException $e) {
        die('Lỗi truy vấn SQL' . $e->getMessage());
    }
}
function edit_category($sql, $id)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('Location: ../table_category.php');
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}
function add_slide($sql, $valua1, $value2, $value3)
{
    try {
        $conn = get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}
function edit_slide($name, $file, $link, $id)
{
    try {
        $conn = get_connect();
        if ($file != '') {
            $sql = "UPDATE slide SET ten_slide = '$name', anh_slide = '$file', link_slide = '$link' WHERE id_slide = '$id'";
        } else {
            $sql = "UPDATE slide SET ten_slide = '$name', link_slide = '$link' WHERE id_slide = '$id'";
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute();

    } catch (PDOException $e) {
        die('Lỗi truy vấn' . $e->getMessage());
    }
}

