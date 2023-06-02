<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";

extract($_REQUEST);
if (exist_parma('seach_keyword', extract($_REQUEST))) {

    $item = hang_hoa_select_keyword($keyword);
    if (!empty($item)) {
        echo '<div class="border bg-white rounded-md p-2">';
        $i = 0;
        foreach ($item as $value) {
            echo '<div class=" py-2 border-b"><a href="../hang_hoa/chi_tiet.php?ma_hh=' . $value["ma_hh"] . '">' . $value["ten_hh"] . '</a></div>';
            if ($i < 3) {
                $i++;
            } else {
                break;
            }
        }
        echo '</div>';
    }
}
