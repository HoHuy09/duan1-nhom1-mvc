<?php
function get_connect(){
    $connect = new PDO("mysql:host=127.0.0.1;dbname=shoppings;charset=utf8", "root", "");
    return $connect;
}


function executeQuery($sql, $getAll = false){

    $connect = get_connect();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    if($getAll){
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
function select_all_product($sql){
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

?>