<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";
require_once "../../Dao/don_hang.php";
require_once "../../Dao/hang_hoa.php";
?>
<style>
    .st0 {
        fill: #fff
    }

    .st2 {
        fill: #5d89af
    }

    .st3 {
        fill: #709abf
    }

    .st4,
    .st6 {
        fill: #fff;
        stroke: #b3dcdf;
        stroke-miterlimit: 10
    }

    .st6 {
        stroke: #5d89af;
        stroke-width: 2
    }

    .st7,
    .st8,
    .st9 {
        stroke: #709abf;
        stroke-miterlimit: 10
    }

    .st7 {
        stroke-width: 5;
        stroke-linecap: round;
        fill: none
    }

    .st8,
    .st9 {
        fill: #fff
    }

    .st9 {
        fill: none
    }


    #cloud1 {
        animation: cloud003 15s linear infinite;
    }

    #cloud2 {
        animation: cloud002 25s linear infinite;
    }

    #cloud3 {
        animation: cloud003 20s linear infinite;
    }

    #cloud4 {
        animation: float 4s linear infinite;
    }

    #cloud5 {
        animation: float 8s linear infinite;
    }

    #cloud7 {
        animation: float 5s linear infinite;
    }

    #tracks {
        animation: slide 650ms linear infinite;
    }

    #bumps {
        animation: land 10000ms linear infinite;
    }

    @keyframes jig {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(1px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    #car-layers {
        animation: jig 0.35s linear infinite;
    }

    @keyframes land {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(1000px);
        }
    }


    @keyframes slide {
        from {
            transform: translateX(0px);
        }

        to {
            transform: translateX(100px);
        }
    }

    /* @keyframes cloudFloat {
    0% { transform: translateX(0) translateY(3px); }
    100% { transform: translateX(1000px) translateY(0); }
    } */

    @keyframes cloud001 {
        0% {
            transform: translateX(-1000px) translateY(3px);
        }

        100% {
            transform: translateX(1000px) translateY(0);
        }
    }

    @keyframes cloud002 {
        0% {
            transform: translateX(-1000px) translateY(3px);
        }

        100% {
            transform: translateX(1000px) translateY(0);
        }
    }

    @keyframes cloud003 {
        0% {
            transform: translateX(-1000px) translateY(3px);
        }

        100% {
            transform: translateX(1000px) translateY(0);
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0px) translateX(0);
        }

        50% {
            transform: translateY(8px) translateX(5px);
        }

        100% {
            transform: translateY(0px) translateX(0);
        }
    }

    #bracefront,
    #braceback {
        animation: braces 1s linear infinite;
    }

    @keyframes braces {
        0% {
            transform: translateX(-2px);
        }

        25% {
            transform: translateX(3px);
        }

        50% {
            transform: translateX(-2px);
        }

        75% {
            transform: translateX(3px);
        }

        100% {
            transform: translateX(-2px);
        }
    }
</style>
<section>
    <div class=" min-h-screen bg-gray-200">
        <div class="container m-auto pt-6">
            <div class="w-4/5  m-auto">
                <?php
                if (!empty($MESS)) echo $MESS;
                ?>
            </div>

            <div class="flex justify-between w-4/5 py-4 m-auto">
                <h2 class=" text-base lg:text-2xl lg:st8 lg:st10  uppercase font-bold text-rose-500 border-b border-b-rose-500">đơn hàng</h2>
                <form action="../gio_hang/chi_tiet_don_hang.php" class=" relative flex items-center bg-white border border-slate-300 rounded-md py-1 pl-1 pr-1 lg:py-2 lg:pl-3 lg:pr-3 shadow-sm focus:outline-none focus:ring-1 sm:text-sm">
                    <input name="ma_order" class="seach placeholder:italic placeholder:text-slate-400 w-56 block focus:outline-none focus:border-sky-500 focus:ring-sky-500 " placeholder="mã đơn hàng" type="text" name="" />
                    <button><i class="fa fa-search text-slate-400" aria-hidden="true"></i></button>
                    <div class=" absolute top-10 w-full left-0">
                    </div>
                </form>
            </div>
            <div <?= (!empty($order)) ? '' : 'style="display:none"' ?> class=" chi-tiet w-full py-2 lg:w-4/5 m-auto mt-3 lg:py-5 lg:flex gap-3">
                <div class=" lg:w-7/12 bg-white rounded-md border">
                    <div class="border border-b-gray-400 font-medium flex justify-between">
                        <h2 class=" p-4 text-base lg:text-lg ">Thông tin đơn hàng</h2>
                        <p class=" p-4 text-sm lg:text-base">Mã đơn hàng: <?= $ma_order ?></p>
                    </div>
                    <div class=" border border-b-gray-500 ">
                        <?php
                        foreach ($order_detail as $key => $value) {
                            $product = hang_hoa_select_by_id($value['id_hang_hoa']);
                        ?>

                            <div class=" text-sm flex border-b py-2 px-4 items-center">
                                <img class=" w-1/6" src="../../uploaded/product/<?= $product['hinh'] ?>" alt="">
                                <h2 class=" w-2/5 font-medium "><?= $product['ten_hh'] ?></h2>
                                <div class="w-2/6 flex justify-between ml-auto">
                                    <p class=" w-1/4">x <?= $value['so_luong'] ?></p>
                                    <p class=" w-3/4"><?= currency_format($product['don_gia'] -  $product['don_gia'] * $product['giam_gia']) ?></p>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                    <div class="flex justify-between pt-4 w-4/5 m-auto px-2 text-sm lg:px-4 lg:text-lg font-bold pb-4">
                        <p>Tổng tiền</p>
                        <p><?= currency_format($order['tong_tien']) ?></p>
                    </div>
                </div>
                <div class=" mt-2 lg:mt-0 lg:w-5/12  bg-white rounded-md border">
                    <div class=" p-4">
                        <h2 class=" py-2 lg:text-lg font-medium">Thông tin khách hàng</h2>
                        <div class=" text-sm">
                            <div class=" flex py-2">
                                <div class=" w-2/5">
                                    <p>Người nhận</p>
                                </div>
                                <div class=" w-3/5">
                                    <p>: <?= $order['ten_kh'] ?></p>
                                </div>
                            </div>
                            <div class=" flex py-2">
                                <div class=" w-2/5">
                                    <p>Điện thoại</p>
                                </div>
                                <div class=" w-3/5">
                                    <p>: <?= $order['sdt'] ?> </p>
                                </div>
                            </div>
                            <div class=" flex py-2">
                                <div class=" w-2/5">
                                    <p>Địa chỉ</p>
                                </div>
                                <div class="  w-3/5">
                                    <p>: <?= $order['address'] ?></p>
                                </div>
                            </div>
                            <div class=" flex py-2">
                                <div class=" w-2/5">
                                    <p>Ngày đặt hàng</p>
                                </div>
                                <div class="  w-3/5">
                                    <p>: <?= $order['ngay_mua'] ?></p>
                                </div>
                            </div>
                            <div class=" flex py-2">
                                <div class=" w-2/5">
                                    <p>Tình trạng</p>
                                </div>
                                <div class="  w-3/5">
                                    <p>: <?= tinh_trang_don_hang($order['tinh_trang']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div <?= (empty($_SESSION['user']) || (empty($don_hang))  || !empty($_GET['ma_order'])) ? 'style="display:none"' : '' ?> class=" lg:w-4/5 m-auto mt-3 lg:p-5 gap-3 ">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl overflow-hidden">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2 py-1 lg:px-6 lg:py-3">
                                    Mã đơn hàng
                                </th>
                                <th scope="col" class="px-2 py-1 lg:px-6 lg:py-3 hidden lg:block">
                                    Ngày mua
                                </th>
                                <th scope="col" class="px-2 py-1 lg:px-6 lg:py-3">
                                    Tổng tiền
                                </th>
                                <th scope="col" class="px-2 py-1 lg:px-6 lg:py-3">
                                    Trình trạng
                                </th>
                                <th scope="col" class="px-2 py-1 lg:px-6 lg:py-3">
                                    <span class="sr-only">Chi tiết</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($don_hang as $key => $value) {
                            ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class=" px-3 py-2 lg:px-6 lg:py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $value['ma_order'] ?>
                                    </th>
                                    <td class="px-3 py-2 lg:px-6 lg:py-4 hidden lg:block">
                                        <?= $value['ngay_mua'] ?>
                                    </td>
                                    <td class="px-3 py-2 lg:px-6 lg:py-4">
                                        <?= currency_format($value['tong_tien']) ?>
                                    </td>
                                    <td class="px-3 py-2 lg:px-6 lg:py-4">
                                        <?= tinh_trang_don_hang($value['tinh_trang']) ?>
                                    </td>
                                    <td class="px-3 py-2 lg:px-6 lg:py-4 text-right">
                                        <a href="../gio_hang/chi_tiet_don_hang.php?ma_order=<?= $value['ma_order'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Chi tiết</a>
                                    </td>
                                </tr>

                            <?php
                            }

                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
            <div <?= (empty($_GET['list']) && !empty($_SESSION['user']) && (!empty($don_hang)) || !empty($_GET['ma_order']) &&  (!empty($order))) ? 'style="display:none"' : '' ?> class="main404">

            </div>
        </div>
    </div>
</section>
<script>
    $.ajax({
        url: "../gio_hang/gio_hang_trong.html",
        success: function(result) {
            $(".main404").html(result);
        }
    });
</script>