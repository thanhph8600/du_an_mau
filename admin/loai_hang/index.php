<?php
require_once "../../global.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";
check_login();

extract($_REQUEST);

if (exist_parma("btn_add")) {
    $VIEW_NAME = "add.php";
} elseif (exist_parma("btn_insert")) {
    if(!empty($_POST['namecategory'])){
        try {
            $name = $_POST['namecategory'];
            $check =  loai_select_by_name($name);
            if (!empty($check)) {
                $MESS = '<div class="alert alert-warning text-white " role="alert">Tên loại hàng đã tồn tại</div>';
                $VIEW_NAME = "add.php";
            } else {
                if (!preg_match(regex_name(), slugify($name))) {
                    $MESS = '<div class="alert alert-warning text-white " role="alert">Nhập ít nhất 3 kí tự, không vượt quá 20 kí tự và không được chứa kí tự đặt biệt</div>';
                    $VIEW_NAME = "add.php";
                } else {
    
                    if (!empty($_POST['ma_loai'])) {
                        loai_update($_POST['ma_loai'], $name);
                        $MESS = '<div class="alert alert-success text-white " role="alert">Cập nhật loại hàng thành công</div>';
                    } else {
                        loai_insert($name);
                        $MESS = '<div class="alert alert-success text-white " role="alert">Thêm loại hàng thành công</div>';
                    }
                    $VIEW_NAME = "list.php";
                }
            }
        } catch (\Throwable $th) {
            $VIEW_NAME = "add.php";
        }
    }else{
        $VIEW_NAME = "list.php";

    }
    
} elseif (exist_parma("btn_delete")) {

    if(!empty($_POST['slug'])){
        $slug = $_POST['slug'];
        loai_delete($slug);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    }

    $VIEW_NAME = "list.php";
} elseif (exist_parma("btn_edit")) {

    $loai = loai_select_by_id($ma_loai);
    $VIEW_NAME = "edit.php";
} else {
    $VIEW_NAME = "list.php";
}

$category = loai_select_all();

function so_luong_sp($ma_loai)
{
    return hang_hoa_exist($ma_loai);
}
require '../layout.php';
