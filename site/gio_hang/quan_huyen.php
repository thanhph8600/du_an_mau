

<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/address.php";
extract($_REQUEST);

if (!empty($_POST['quan_huyen'])) {
    $quan_huyen = render_quan_huyen($ma_tinh);
    echo '<label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quận/ Huyện</label>
        <select name="quan"  class="quan_huyen bg-white border shadow border-gray-300 text-gray-900  text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">--Chọn Quận/ Huyện --</option>';
    foreach ($quan_huyen as $key => $value) {
        echo '<option value="' . $value['id'] . '">' . $value['_name'] . '</option>';
    }
    echo '</select>';
}
?>

