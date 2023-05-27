<?php
require_once "../../global.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);

if (exist_parma("btn_add")) {
    $VIEW_NAME = "add.php";

} elseif (exist_parma("btn_insert")) {

    if (isset($_POST['addcategory']) && $_POST['addcategory']) {
        $name = $_POST['namecategory'];
        if (!empty($_POST['slug'])) {
            loai_update($_POST['slug'], $name);
        } else {
            loai_insert($name);
        }
    } else {
        $checkcategory = 'Tên loại đã được dùng';
    }

    $VIEW_NAME = "list.php";
} elseif (exist_parma("btn_delete")) {
    
    $slug = $_POST['slug'];
    loai_delete($slug);
    $VIEW_NAME = "list.php";
}elseif (exist_parma("btn_edit")) {

    $loai = loai_select_by_id($ma_loai);
    $VIEW_NAME = "edit.php";
} else {
    $VIEW_NAME = "list.php";
}

$category = loai_select_all();

function so_luong_sp($ma_loai){
   return hang_hoa_exist($ma_loai);
}
require '../layout.php';
