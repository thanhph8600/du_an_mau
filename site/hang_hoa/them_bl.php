<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once '../../Dao/binh_luan.php';
require_once '../../Dao/khach_hang.php';

require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);



if (exist_parma('noi_dung')) {
    if (!empty($nhap_binh_luan)) {
        $user = khach_hang_select_by_id($_COOKIE['ma_kh']);
        $date = date_format(date_create(), 'Y-m-d');
        binh_luan_insert($nhap_binh_luan, $_COOKIE['ma_kh'], $ma_hh, $date, $vote);
        echo '
            <div class="py-3 border-y p-2">
                <div class="flex items-center pb-2">
                    <img class=" w-14 h-14 rounded-full mr-4" src="../../uploaded/user/' . $user['hinh'] . '" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none text-lg font-semibold">' . $user['ho_ten'] . '</p>
                        <p class="text-gray-600">' . $date . '</p>
                    </div>
                    <div class=" pl-4 flex gap-4 px-2 py-1">';
                    if (!empty($vote)) {
                        for($i=0;$i<5;$i++){
                            if($i<$vote){
                                echo '<i class="fa fa-star cursor-pointer text-yellow-400 text-xl"  aria-hidden="true"></i>';
                            }else{
                                echo '<i class="fa fa-star-o  cursor-pointer text-yellow-400 text-xl"  aria-hidden="true"></i>';
                            }
                        }
                    }
                    
                    echo '</div>
                </div>
                <p>' . $nhap_binh_luan . '</p>
            </div>
            ';
    }
}
