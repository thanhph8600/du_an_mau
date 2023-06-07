<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);
if (exist_parma('ma_loai')) {
    $item = hang_hoa_select_by_ma_loai($ma_loai);
    $tong_sp = hang_hoa_exist($ma_loai);
    $ten_sp = loai_select_by_id($ma_loai);
} elseif (exist_parma('keyword', extract($_REQUEST))) {
    $item = hang_hoa_select_keyword($keyword);
    $tong_sp = so_luong_hang_hoa_keyword($keyword);
    $ten_sp['ten_loai'] = $keyword;
    $phan_trang = 0;
} elseif (exist_parma('seach_keyword', extract($_REQUEST))) {
    $seach = $keyword;
    $item = hang_hoa_select_keyword($keyword);
    foreach ($item as $value) {
        echo $vaule['ten_hh'];
    }
    die;
} else {
    // phân trang
    // tìm tổng sản phẩm
    $result = "select count(`ma_hh`) as total from `hang_hoa`";
    $count = query($result);
    $total_records = $count[0]['total'];

    //limit va current_page
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;

    //tong so trang
    $total_page = ceil($total_records / $limit);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    // Tìm Start
    $start = ($current_page - 1) * $limit;

    // Có limit và start rồi thì truy vấn CSDL lấy danh sách san pham
    $item = hang_hoa_select_so_luong($start, $limit);

    // $item = hang_hoa_select_ngau_nhien();
    $tong_sp =  so_luong_hang_hoa();
    $ten_sp['ten_loai'] = 'Tất cả sản phẩm';
}
$top10 = hang_hoa_select_top10();
$TOP10 = '../layout/top10.php';
$VIEW_NAME = 'liet_ke_ui.php';



require "../layout.php";
