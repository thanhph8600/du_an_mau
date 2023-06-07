<?php

require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/khach_hang.php";
require_once "../../Dao/hang_hoa.php";
check_login();

extract($_REQUEST);

//Đăng nhập
if (exist_parma('cap_nhat_tk')) {
    extract($_REQUEST);

    if(!empty($cap_nhat)){
        $check = 1;
        global $email_err, $name_err, $phone_err;
        $user = khach_hang_select_by_id($ma_kh);
        $check_email = khach_hang_select_by_email($email);
    
        if (!preg_match(regex_name(), slugify($name)) || strlen($name) == 0) {
            $name_err = '<div class="text-red-500">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div>';
            $check = 0;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) == 0) {
            $email_err = '<div class="text-red-500">Phải đúng định dạng email</div>';
            $check = 0;
        }elseif ($user['email']!=$email) {
            if (!empty($check_email)) {
                $email_err = '<div class="text-red-500">Email đăng nhập đã được dùng</div>';
                $check = 0;
            }
        }
        if (!preg_match(regex_phone(), $phone)) {
            $phone_err = '<div class="text-red-500">Số điện thoại phải 10 kí tự</div>';
            $check = 0;
        }
    
        if($check == 1){
            try {
                if (!empty($_FILES["upload"]["name"])) {
                    // unlink($UPLOAD_USER_URL . $hinh_cu);
                    $hinh = save_file('upload', $UPLOAD_USER_URL);
                } else {
                    $hinh = $hinh_cu;
                }
                khach_hang_cap_nhat_tai_khoan($name, $phone, $hinh, $email, $ma_kh);
                $newuser = khach_hang_select_by_id($ma_kh);
                $_SESSION['user'] = $newuser;
                $MESS = '<div class="border rounded-md p-4 bg-green-200">
                            <h2 class=" text-xl font-semibold">Cập nhật tài khoản thành công</h2>
                        </div>';
            } catch (Exception $exc) {
                $MESS = '<div class="border rounded-md p-2 bg-red-200">
                            <h2 class=" text-xl font-semibold">Cập nhật tài khoản thất bại</h2>
                        </div>';
            }
        }else{
            $MESS = '<div class="border rounded-md p-2 bg-red-200">
                    <h2 class=" text-xl font-semibold">Cập nhật tài khoản thất bại</h2>
                </div>';
        }
    }

    
    $newuser = khach_hang_select_by_id($_SESSION['user']['ma_kh']);
    $VIEW_NAME =  './cap_nhat_tk_form.php';
} else {
    $MESS = '';
    $newuser = khach_hang_select_by_id($_SESSION['user']['ma_kh']);
    $VIEW_NAME =  './cap_nhat_tk_form.php';
}
$top10 = hang_hoa_select_top10();

require '../layout.php';
