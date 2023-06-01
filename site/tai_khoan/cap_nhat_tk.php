<?php

require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/khach_hang.php";

extract($_REQUEST);

//Đăng nhập
if (exist_parma('cap_nhat_tk')) {
    extract($_REQUEST);

    try {
        if (!empty($_FILES["upload"]["name"])) {
            // unlink($UPLOAD_USER_URL . $hinh_cu);
            $hinh = save_file('upload', $UPLOAD_USER_URL);
        } else {
            $hinh = $hinh_cu;
        }
        khach_hang_cap_nhat_tai_khoan($name, $phone, $hinh, $email, $ma_kh);
        $MESS = '<div class="border rounded-md p-4 bg-green-200">
                    <h2 class=" text-xl font-semibold">Cập nhật tài khoản thành công</h2>
                </div>';
    } catch (Exception $exc) {
        $MESS = '<div class="border rounded-md p-2 bg-red-200">
                    <h2 class=" text-xl font-semibold">Cập nhật tài khoản thất bại</h2>
                </div>';
    }
    $newuser = khach_hang_select_by_id($ma_kh);
    $_SESSION['user'] = $newuser;
    $VIEW_NAME =  './cap_nhat_tk_form.php';
} else {
    $MESS = '';
    $newuser = khach_hang_select_by_id($_SESSION['user']['ma_kh']);
    $VIEW_NAME =  './cap_nhat_tk_form.php';
}

require '../layout.php';
