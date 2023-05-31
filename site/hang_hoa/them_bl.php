<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once '../../Dao/binh_luan.php';
require_once '../../Dao/khach_hang.php';

require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);



if( exist_parma('noi_dung')){
    $user = khach_hang_select_by_id($_COOKIE['ma_kh']);
    $date = date_format(date_create(),'Y-m-d');
    binh_luan_insert($nhap_binh_luan,$_COOKIE['ma_kh'],$ma_hh,$date);
    echo '
    <div class="py-3 border-y p-2">
        <div class="flex items-center pb-2">
            <img class=" w-14 h-14 rounded-full mr-4" src="../../uploaded/user/'.$user['hinh'].'" alt="Avatar of Jonathan Reinink">
            <div class="text-sm">
                <p class="text-gray-900 leading-none text-lg font-semibold">'.$user['ho_ten'].'</p>
                <p class="text-gray-600">'.$date.'</p>
            </div>
        </div>
        <p>'.$nhap_binh_luan.'</p>
    </div>
    ';
    
}