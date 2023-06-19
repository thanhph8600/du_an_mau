<?php

require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/khach_hang.php";

//nhận các giá trị được gửi từ trang web theo các phương thức HTML (GET POST COOKIE)
extract($_REQUEST);

//Đăng nhập
if (exist_parma('btn_dang_nhap')) {
    include './dang_nhap_form.php';
} elseif (exist_parma('dang_nhap')) {
    extract($_REQUEST);
    $ma_kh = $_POST['ma_kh'];
    $pass = md5($_POST['pass']);

    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['mat_khau'] == $pass) {
            $_SESSION['user'] = $user;
            if (exist_parma('ghi_nho')) {
                add_cookie('ma_kh', $ma_kh, 30);
                add_cookie('mat_khau', $_POST['pass'], 30);
            }
        } else {
            echo 'Mật khẩu không chính xác!';
        }
    } else {
        echo  'Sai mã đăng nhập';
    }
}

//Đăng ký
elseif (exist_parma('btn_dang_ky')) {
    include './dang_ki_form.php';
} elseif (exist_parma('dang_ky')) {

    $check = 1;
    $check_ma_kh = khach_hang_select_by_id($ma_kh);
    $check_email = khach_hang_select_by_email($email);
    if (!preg_match(regex_name(), $ma_kh) || strlen($ma_kh) == 0) {
        $ma_kh_err = 'Tên đăng nhập không được chứa kí tự đặt biệt';
        $check = 0;
    } elseif (!empty($check_ma_kh)) {
        $ma_kh_err = 'Tên đăng nhập đã được dùng';
        $check = 0;
    }
    if (!preg_match(regex_name(), slugify($name)) || strlen($name) == 0) {
        $check = 0;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) == 0) {
        $check = 0;
    } elseif (!empty($check_email)) {
        $ma_kh_err = 'Email đã được dùng';
        $check = 0;
    }
    if (!preg_match(regex_phone(), $phone)) {
        $check = 0;
    }
    if (strlen($pass) < 8 || strlen($pass) > 32) {
        $check = 0;
    }
    if ($pass != $repass) {
        $check = 0;
    }

    if ($check == 1) {
        try {
            add_cookie('ma_kh', $ma_kh, 30);
            add_cookie('mat_khau', $pass, 30);
            $pass = md5($pass);
            if (!empty($_FILES['hinh'])) {
                $hinh = save_file('hinh', $UPLOAD_USER_URL);
            }
            khach_hang_insert($ma_kh, $pass, $name, $phone, $trang_thai, $hinh, $email, $vai_tro);
            $user = khach_hang_select_by_id($ma_kh);
            $_SESSION['user'] = $user;
            $MESS =  'ok';
        } catch (Exception $exc) {
            $MESS = '<div class="alert w-full alert-warning text-white " role="alert">Thêm khách hàng thất bại</div>';
        }
    } else {
        $MESS = '<div class="border w-full p-2 bg-red-200">
                    <h2 class=" text-xl font-semibold">Thêm khách hàng thất bại</h2>
                    ' . $ma_kh_err . '
                </div>';
    }
    echo $MESS;
}

//Quên mật khẩu
elseif (exist_parma('quen_mat_khau')) {
    include './quen_mat_khau_form.php';
} elseif (exist_parma('tim_mk')) {
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['ma_kh'] == $ma_kh && $user['email'] == $email) {
            $MESS = '';
        } else {
            $MESS = '<div class="border  p-2 bg-red-200">
                        <h2 class=" text-xl font-semibold">Thông tin không chính xác</h2>
                        Vui lòng kiểm tra lại emai
                    </div>';
        }
    } else {
        $MESS = '<div class="border  p-2 bg-red-200">
                    <h2 class=" text-xl font-semibold">Thông tin không chính xác</h2>
                    Vui lòng kiểm tra lại tên đăng nhập
                </div>';
    }
    echo $MESS;
}

//Đổi mật khẩu
elseif (exist_parma('btn_doi_mat_khau')) {
    include './doi_mat_khau.php';
} elseif (exist_parma('doi_mat_khau')) {
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['mat_khau'] == md5($pass_old)) {
            if ($pass_new == $re_pass_new) {
                add_cookie('mat_khau', $re_pass_new, 30);
                khach_hang_doi_mat_khau(md5($pass_new), $ma_kh);
                $MESS = '<div class="border  p-2 bg-green-200"><h2 class=" text-xl font-semibold">Thông tin đã được xác nhận</h2>Mật khẩu của bạn đã được cập nhật</div>';
            } else {
                $MESS = '<div class="border  p-2 bg-red-200">
                            <h2 class=" text-xl font-semibold">Thông tin không chính xác</h2>
                            Mật khẩu nhập lại không giống
                        </div>';
            }
        } else {
            $MESS = '<div class="border  p-2 bg-red-200">
                        <h2 class=" text-xl font-semibold">Thông tin không chính xác</h2>
                        Vui lòng kiểm tra lại mật khẩu cũ
                    </div>';
        }
    } else {
        $MESS = '<div class="border  p-2 bg-red-200">
                    <h2 class=" text-xl font-semibold">Thông tin không chính xác</h2>
                    Vui lòng kiểm tra lại tên đăng nhập
                </div>';
    }
    echo $MESS;
} elseif (exist_parma('dang_xuat')) {
    unset($_SESSION['user']);
}
