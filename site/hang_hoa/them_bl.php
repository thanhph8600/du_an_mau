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
                                echo '<i class="fa fa-star  text-yellow-400 text-xl"  aria-hidden="true"></i>';
                            }else{
                                echo '<i class="fa fa-star-o   text-yellow-400 text-xl"  aria-hidden="true"></i>';
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
if (exist_parma('show_bl')) {
    $binh_luan = binh_luan_select_by_hang_hoa($ma_hh);
    foreach ($binh_luan as $key => $value) {
        echo '
    <div class="py-3 border-y p-2">
    <div class="flex items-center pb-2 flex-wrap">
        <img class=" w-8 h-8 lg:w-14 lg:h-14 rounded-full mr-4" src="../../uploaded/user/' . $value['hinh'] . '" alt="Avatar of Jonathan Reinink">
        <div class="text-sm">
            <p class="text-gray-900 leading-none text-sm lg:text-lg font-semibold pb-2">' . $value['ho_ten'] . '</p>
            <p class="text-gray-600">' . $value['ngay_bl'] . '</p>
        </div>
        <div class=" pl-4 flex gap-4 px-2 py-1">';

        if (!empty($value['vote'])) {
            for ($i = 0; $i < 5; $i++) {
                if ($i < $value['vote']) {
                    echo '<i class="fa fa-star  text-yellow-400 text-sm lg:text-xl"  aria-hidden="true"></i>';
                } else {
                    echo '<i class="fa fa-star-o  text-yellow-400 text-sm lg:text-xl" aria-hidden="true"></i>';
                }
            }
        }
        echo '
                </div>

            </div>
            <p>' . $value['noi_dung'] . '</p>
        </div>
            ';
    }
}