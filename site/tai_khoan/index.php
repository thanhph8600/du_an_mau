<?php
if (!session_start()) {
    session_start();
}
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/khach_hang.php";

extract($_REQUEST);

//Đăng nhập
if (exist_parma('btn_dang_nhap')) {
    include './dang_nhap_form.php';
} elseif (exist_parma('dang_nhap')) {
    extract($_REQUEST);

    $ma_kh = $_POST['email'];
    $pass = md5($_POST['pass']);

    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['mat_khau'] == $pass) {
            $_SESSION['user'] = $user;

            if (exist_parma('ghi_nho')) {
                add_cookie('ma_kh', $ma_kh, 30);
                add_cookie('mat_khau', $_POST['pass'], 30);
            }
            echo 'ok';
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
    if (khach_hang_exist($ma_kh)) {
        $mess =  "Mã này đã được sử dụng!";
    } else {
        try {
            $pass = md5($pass);
            $hinh = save_file('hinh', $UPLOAD_USER_URL);
            khach_hang_insert($ma_kh, $pass, $name, $phone, $trang_thai, $hinh, $email, $vai_tro);
            $user = khach_hang_select_by_id($ma_kh);
            $_SESSION['user'] = $user;
            add_cookie('ma_kh', $ma_kh, 30);
            add_cookie('mat_khau', $_POST['pass'], 30);
            $mess =  'ok';
        } catch (Exception $exc) {
            $mess =   "Đăng ký thành viên thất bại!";
        }
    }
    echo $mess;
}

//Quên mật khẩu
elseif (exist_parma('quen_mat_khau')) {
    include './quen_mat_khau_form.php';
} elseif (exist_parma('tim_mk')) {
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['ma_kh'] == $ma_kh && $user['email'] == $email) {

            $MESS = '<div class="border  p-2 bg-green-200"><h2 class=" text-xl font-semibold">Thông tin đã được xác nhận</h2>Mật khẩu mới được gửi trong email của bạn</div>';
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
} elseif (exist_parma('dang_xuat')) {
    unset($_SESSION['user']);
}
