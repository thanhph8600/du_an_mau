<?php
require_once '../../Dao/PDO.php';

function render_Tinh(){
    $sql="SELECT * FROM `province`";
    return pdo_query($sql);
}

function render_quan_huyen($id_tinh){
    $sql="SELECT * FROM `district` WHERE `_province_id` = ?";
    return pdo_query($sql,$id_tinh);
}

function render_phuong_xa($id_quan){
    $sql="SELECT * FROM `ward` WHERE  `_district_id` = ?";
    return pdo_query($sql,$id_quan);
}

function tinh_select_by_id($id){
    $sql = "SELECT * FROM `province` where id = ?";
    return pdo_query_one($sql,$id);
}
function quan_select_by_id($id){
    $sql = "SELECT * FROM  `district` where id = ?";
    return pdo_query_one($sql,$id);
}
function xa_select_by_id($id){
    $sql = "SELECT * FROM  `ward` where id = ?";
    return pdo_query_one($sql,$id);
}