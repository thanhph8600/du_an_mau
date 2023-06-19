<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/loai.php";
require_once "../../Dao/hang_hoa.php";
extract($_REQUEST);

// phân trang
// tìm tổng sản phẩm
$result = "select count(`ma_hh`) as total from `hang_hoa`";
$count = pdo_query($result);
$total_records = $count[0]['total'];

//limit va current_page
$current_page = isset($_POST['page']) ? $_POST['page'] : 1;
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
if (!empty($_POST['filter'])) {
    $filter = $_POST['filter'];

    switch ($filter) {
        case '1':
            $item = hang_hoa_select_asc($start, $limit);
            break;
        case '2':
            $item = hang_hoa_select_decs($start, $limit);
            break;
        case '3':
            $item = hang_hoa_select_don_gia(0, 5000000);
            break;
        case '4':
            $item = hang_hoa_select_don_gia(5000000, 10000000);
            break;
        case '5':
            $item = hang_hoa_select_don_gia(10000000, 20000000);
            break;
        case '6':
            $item = hang_hoa_select_don_gia(20000000, 30000000);
            break;
        case '7':
            $item = hang_hoa_select_don_gia(30000000, 100000000);
            break;
        default:
            $item = hang_hoa_select_so_luong($start, $limit);
            break;
    }
} else {
    $item = hang_hoa_select_so_luong($start, $limit);
}
?>

<div class=" grid grid-cols-3 lg:grid-cols-5  my-3">
    <?php
    foreach ($item as $value) {
        extract($value);
    ?>
        <a href="../hang_hoa/chi_tiet.php?ma_hh=<?= $value['ma_hh'] ?>" class=" flex flex-1  hover:scale-105 hover:shadow-2xl hover:z-20 border">
            <div class=" flex flex-col bg-white rounded ">
                <div class="p-1 lg:p-3 flex-auto flex justify-center items-center ">
                    <img class="w-full rounded-md transition ease-in-out delay-150 hover:-translate-y-1" src="<?= $UPLOAD_PRODUCT_URL . $value['hinh'] ?>" alt="Sunset in the mountains">
                </div>
                <div class="px-2 py-1 text-sm lg:px-6 lg:py-3 ">
                    <div class="font-bold text-xs lg:text-sm lg:mb-2"><?= $value['ten_hh'] ?></div>
                    <span class="text-neutral-600 text-xs lg:text-base line-through pr-2"> <?= currency_format($value['don_gia']) ?>
                    </span> <span> -<?= $value['giam_gia'] * 100 ?>%</span>
                    <p class="text-red-500 font-bold text-sm lg:text-lg"> <?= currency_format($value['don_gia'] - $value['don_gia'] * $value['giam_gia']) ?>
                    </p>
                </div>
                <div class="lg:px-6 lg:pt-4 lg:pb-2 flex-none">
                </div>
            </div>
        </a>

    <?php
    } ?>


</div>
<div class="spagination flex gap-5 justify-center py-3 text-lg">
    <?php
    // PHẦN HIỂN THỊ PHÂN TRANG

    if (empty($_POST['filter'])) $_POST['filter'] = '';
    echo '<input type="hidden" class="filter" name="" value="'.$_POST['filter'].'">';
    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
    if (empty($_POST['ma_loai']) && empty($_POST['keyword']) && empty($_POST['filter']) || $_POST['filter'] <= 2) {
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="liet_ke.php?page=' . ($current_page - 1) . '"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a> | ';
        }

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
                echo '<span class=" bg-orange-500 rounded px-4 text-white font-bold ">' . $i . '</span> | ';
            } else {
                // echo '<a href="liet_ke.php?page=' . $i . '&filter=' . $_POST['filter'] . '">' . $i . '</a> | ';
                echo '<span class="page cursor-pointer" data="' . $i . '" >' . $i . '</span> | ';
            }
        }

        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="liet_ke.php?page=' . ($current_page + 1) . '"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>  ';
        }
    }
    ?>
</div>
<script>
    // $('.page').click(function() {
    //     console.log($(this).attr('data'))
    // })
    $(document).on('click', '.page', function() {

        $.ajax({
            url: '../hang_hoa/show_list_sp.php?filter',
            type: "post",
            data: {
                filter: $('.filter').val(),
                page:$(this).attr('data'),
            }
        }).done(function(data) {

            $('.show-sp').html(data)
        })
    })
</script>