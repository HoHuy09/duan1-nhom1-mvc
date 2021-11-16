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
function add_product($danh_muc, $name,  $price, $brand, $sale, $desc, $date, $status)
{
    $conn = get_connect();
    $sql = "INSERT INTO san_pham (id_dm, ten_sp, gia_sp, id_th,
        giam_gia, mo_ta, bao_hanh, trang_thai)
        VALUES('$danh_muc', '$name',  '$price', '$brand', '$sale', '$desc', '$date', '$status')";
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
function edit_product($danh_muc, $name, $price, $brand, $sale, $desc, $date, $status, $id)
{
    $conn = get_connect();

    $sql = "UPDATE san_pham SET id_dm='$danh_muc', ten_sp='$name', gia_sp='$price'
        ,id_th='$brand', giam_gia='$sale', mo_ta='$desc', bao_hanh='$date', trang_thai='$status' WHERE id_sp = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
