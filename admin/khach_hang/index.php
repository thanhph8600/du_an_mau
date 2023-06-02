<?php
require_once "../../global.php";
require_once "../../Dao/khach_hang.php";
extract($_REQUEST);

if (exist_parma("btn_add")) {
    $VIEW_NAME = "add.php";
}
// thêm
elseif (exist_parma("btn_insert")) {
    extract($_REQUEST);
    $check = 1;
    global $ma_kh_err, $email_err, $name_err, $phone_err, $pass_err, $repass_err;
    $check_ma_kh = khach_hang_select_by_id($ma_kh);

    if (!preg_match(regex_name(), $ma_kh) || strlen($ma_kh) == 0) {
        $ma_kh_err = '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt, không có dấu</div>';
        $check = 0;
    }elseif (!empty($check_ma_kh)) {
        $ma_kh_err = '<div class="text-danger">Mã đăng nhập đã được dùng</div>';
        $check = 0;
    }
    if (!preg_match(regex_name(), slugify($name)) || strlen($name) == 0) {
        $name_err = '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div>';
        $check = 0;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) == 0) {
        $email_err = '<div class="text-danger">Phải đúng định dạng email</div>';
        $check = 0;
    }
    if (!preg_match(regex_phone(), $phone)) {
        $phone_err = '<div class="text-danger">Số điện thoại phải 10 kí tự</div>';
        $check = 0;
    }
    if (strlen($pass) < 8 || strlen($pass) > 32) {
        $pass_err = '<div class="text-danger">Không được để trống, từ 8 đến 32 kí tự</div>';
        $check = 0;
    }
    if ($pass != $repass) {
        $repass_err = '<div class="text-danger">Không giống mật khẩu đã nhập</div>';
        $check = 0;
    }


    if ($check == 1) {
        try {
            $trang_thai = (empty($trang_thai)) ? 0 : 1;
            $pass = md5($pass);
            $hinh = save_file('upload', $UPLOAD_USER_URL);

            khach_hang_insert($ma_kh, $pass, $name, $phone, $trang_thai, $hinh, $email, $vai_tro);
            $khach_hang = khach_hang_select_all();
            $MESS = '<div class="alert alert-success text-white " role="alert">Thêm khách hàng thành công</div>';
            $VIEW_NAME = "list.php";
        } catch (\Throwable $th) {
            $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm khách hàng thất bại</div>';
            $VIEW_NAME = "add.php";
        }
    } else {
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm khách hàng thất bại</div>';
        $VIEW_NAME = "add.php";
    }
}
//sửa
elseif (exist_parma("btn_edit")) {

    $khach_hang =  khach_hang_select_by_id($ma_kh);
    $VIEW_NAME = "edit.php";
} elseif (exist_parma("btn_update")) {
    extract($_REQUEST);
    $check = 1;
    global $ma_kh_err, $email_err, $name_err, $phone_err, $pass_err, $repass_err;
    if (!preg_match(regex_name(), $ma_kh) || strlen($ma_kh) == 0) {
        $ma_kh_err = '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt, không có dấu</div>';
        $check = 0;
    } 
    if (!preg_match(regex_name(), slugify($name)) || strlen($name) == 0) {
        $name_err = '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div>';
        $check = 0;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) == 0) {
        $email_err = '<div class="text-danger">Phải đúng định dạng email</div>';
        $check = 0;
    }
    if (!preg_match(regex_phone(), $phone)) {
        $phone_err = '<div class="text-danger">Số điện thoại phải 10 kí tự</div>';
        $check = 0;
    }
    if (strlen($pass) < 8 || strlen($pass) > 32) {
        $pass_err = '<div class="text-danger">Không được để trống, từ 8 đến 32 kí tự</div>';
        $check = 0;
    }
    if ($pass != $repass) {
        $repass_err = '<div class="text-danger">Không giống mật khẩu đã nhập</div>';
        $check = 0;
    }


    if ($check == 1) {
        try {
            $trang_thai = (empty($trang_thai)) ? 0 : 1;
            if ($pass != $pass_old) {
                $pass = md5($pass);
            }
        
            if (!empty($_FILES["upload"]["name"])) {
                // unlink($UPLOAD_USER_URL.$hinh_cu);
                $hinh = save_file('upload', $UPLOAD_USER_URL);
            } else {
                $hinh = $hinh_cu;
            }
            khach_hang_update($pass, $name, $phone, $trang_thai, $hinh, $email, $vai_tro, $ma_kh);
            $khach_hang = khach_hang_select_all();
            $MESS = '<div class="alert alert-success text-white " role="alert">Sửa khách hàng thành công</div>';
            $VIEW_NAME = "list.php";
        } catch (\Throwable $th) {
            $MESS = '<div class="alert alert-warning text-white " role="alert">Sửa khách hàng thất bại</div>';
            $khach_hang =  khach_hang_select_by_id($ma_kh);
            $VIEW_NAME = "edit.php";
        }
    } else {
        $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm khách hàng thất bại</div>';
        $khach_hang =  khach_hang_select_by_id($ma_kh);
        $VIEW_NAME = "edit.php";
    }



}
//xóa
elseif (exist_parma("btn_delete")) {
    extract($_REQUEST);
    if($ma_kh == $_SESSION['user']['ma_kh']){
        $MESS = '<div class="alert alert-warning text-white " role="alert">Bạn không thể xóa chính mình</div>';
        
    }else{
        khach_hang_delete($ma_kh);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    }
    $khach_hang = khach_hang_select_all();
    $VIEW_NAME = "list.php";
} else {

    $khach_hang = khach_hang_select_all();
    $VIEW_NAME = "list.php";
}

require '../layout.php';
