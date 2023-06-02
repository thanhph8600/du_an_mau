<?php
require_once "../../global.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";
extract($_REQUEST);

if (exist_parma("btn_add")) {

    $category = loai_select_all();
    $VIEW_NAME = "add.php";
}
// thêm
elseif (exist_parma("btn_insert")) {
    extract($_REQUEST);

    $check = 1;
    global $name_err, $price_err, $sale_err, $category_err, $file_err, $date_err;
    if (!preg_match(regex_name(), slugify($name)) || strlen($name) == 0) {
        $name_err = '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div>';
        $check = 0;
    }
    if (!preg_match('/^([0-9]){1,40}$/', $price) || strlen($price) == 0) {
        $price_err = '<div class="text-danger">Bạn phải nhập số</div>';
        $check = 0;
    }
    if ($sale <0 || $sale >1) {
        $sale_err = '<div class="text-danger">Bạn phải nhập số</div>';
        $check = 0;
    }
    if (strlen($category) == 0) {
        $category_err = '<div class="text-danger">Bạn chọn loại sản phẩm</div>';
        $check = 0;
    }
    if (empty($_FILES["upload"]["name"])) {
        $file_err = '<div class="text-danger">Bạn chọn ảnh</div>';
        $check = 0;
    }

    // $dacbiet = (empty($dacbiet)) ? 0 : 1 ;


    if ($check == 1) {
        try {

            $hinh = save_file('upload', $UPLOAD_PRODUCT_URL);
            hang_hoa_insert($name, $price, $sale, $hinh, $date, $category, $dacbiet, $content);
            $products = hang_hoa_select_all();
            $MESS = '<div class="alert alert-success text-white " role="alert">Thêm sản phẩm thành công</div>';
            $VIEW_NAME = "list.php";
        } catch (Throwable $th) {
            $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm sản phẩm thất bại</div>';
            $category = loai_select_all();

            $VIEW_NAME = "add.php";
        }
    } else {
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm sản phẩm thất bại</div>';
        $category = loai_select_all();

        $VIEW_NAME = "add.php";
    }
}
//sửa
elseif (exist_parma("btn_edit")) {

    $item = hang_hoa_select_by_id($ma_hh);
    $category = loai_select_all();
    $VIEW_NAME = "edit.php";
} elseif (exist_parma("btn_update")) {
    extract($_REQUEST);

    $check = 1;
    global $name_err, $price_err, $sale_err, $category_err, $file_err, $date_err;
    if (!preg_match(regex_name(), slugify($name)) || strlen($name) == 0) {
        $name_err = '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div>';
        $check = 0;
    }
    if (!preg_match('/^([0-9]){1,40}$/', $price) || strlen($price) == 0) {
        $price_err = '<div class="text-danger">Bạn phải nhập số</div>';
        $check = 0;
    }
    if ($sale <0 || $sale >1) {
        $sale_err = '<div class="text-danger">Bạn phải nhập từ 0 đến 1</div>';
        $check = 0;
    }
    if (strlen($category) == 0) {
        $category_err = '<div class="text-danger">Bạn chọn loại sản phẩm</div>';
        $check = 0;
    }



    if ($check == 1) {
        try {
            if (!empty($_FILES["upload"]["name"])) {
                // if(unlink($UPLOAD_URL.$hinh_cu));
                $hinh = save_file('upload', $UPLOAD_PRODUCT_URL);
            } else {
                $hinh = $hinh_cu;
            }
            hang_hoa_update($name, $price, $sale, $hinh, $date, $category, $dacbiet, $content, $id_hh);
            $products = hang_hoa_select_all();
            $VIEW_NAME = "list.php";
            $MESS = '<div class="alert alert-success text-white " role="alert">Sửa sản phẩm thành công</div>';
        } catch (Throwable $th) {
            $MESS = '<div class="alert alert-warning text-white " role="alert">Sửa sản phẩm thất bại</div>';
            $category = loai_select_all();
            $item = hang_hoa_select_by_id($id_hh);
            $VIEW_NAME = "edit.php";
        }
    } else {
        $MESS = '<div class="alert alert-warning text-white " role="alert">Sửa sản phẩm thất bại</div>';
        $category = loai_select_all();
        $item = hang_hoa_select_by_id($id_hh);
        $VIEW_NAME = "edit.php";
    }
}
//xóa
elseif (exist_parma("btn_delete")) {
    extract($_REQUEST);
    hang_hoa_delete($ma_hh);
    $products = hang_hoa_select_all();
    $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    $VIEW_NAME = "list.php";
} else {
    $products = hang_hoa_select_all();
    $VIEW_NAME = "list.php";
}

require '../layout.php';
