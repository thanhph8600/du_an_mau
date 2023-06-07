<style>
    body {
        background-color: #F3F3F3;
    }

    .owl-dots {
        display: none;
    }

    .owl-nav {
        position: absolute;
        display: flex;
        justify-content: space-between;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 103%;
        /* background-color: red; */
    }

    .owl-prev,
    .owl-next {
        display: flex !important;
        justify-content: center !important;
        justify-items: center !important;
        width: 35px !important;
        height: 50px !important;
        font-size: 30px !important;
        border-radius: 100%;
        color: #000 !important;
        background-color: #D6D6D6 !important;
    }

    .owl-prev:hover,
    .owl-next:hover {
        color: #fff !important;
        background-color: #1b64d2c3 !important;
    }

    .text-shadow {
        text-shadow: 2px 0 blue, -2px 0 blue, 0 2px blue, 0 -2px blue,
            1px 1px blue, -1px -1px blue, 1px -1px blue, -1px 1px blue;
    }
</style>
<section>
    <div class=" w-full bg-white">
        <img class=" w-full" src="../../content/img/banner/Untitled-1.jpg" alt="">
    </div>
    <div class="container m-auto relative w-full h-48">
        <div class="slide absolute overflow-hidden w-full left-0 -top-1/2">
            <div class="owl-carousel slide-banner owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="owl-item rounded-2xl overflow-hidden border">
                            <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/04/banner/iP-14-720-220-720x220-1.png" class=" rounded-2xl " alt="...">
                        </div>
                        <div class="owl-item rounded-2xl overflow-hidden border">
                            <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/05/banner/a57-720-220-720x220-2.png" class="  rounded-2xl " alt="...">
                        </div>
                        <div class="owl-item rounded-2xl overflow-hidden border">
                            <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/05/banner/a57-720-220-720x220-3.png" class=" rounded-2xl" alt="...">
                        </div>
                        <div class="owl-item rounded-2xl overflow-hidden border">
                            <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/05/banner/a57-720-220-720x220-2.png" class=" rounded-2xl" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row gap-4 pt-5">
                <div class="flex items-center text-3xl basis-1/4 bg-white border rounded-xl p-5 overflow-hidden">
                    <img class=" rounded-full overflow-hidden object-cover w-20" src="https://cdn-v2.didongviet.vn/files/media/catalog/product/s/a/samsung-galaxy-a23-didongviet_2.jpg" alt="">
                    <span class="break-words pl-6">GALAXY Series</span>
                </div>
                <div class="flex items-center text-3xl basis-1/4 bg-white border rounded-xl p-5 overflow-hidden">
                    <img class=" rounded-full overflow-hidden object-cover w-20" src="https://hanoicomputercdn.com/media/product/68198_laptop_lenovo_ideapad_slim_5_pro_37.png" alt="">
                    <span class="break-words pl-6">Laptop xả kho</span>
                </div>
                <div class="flex items-center text-3xl basis-1/4 bg-white border rounded-xl p-5 overflow-hidden">
                    <img class=" rounded-full overflow-hidden object-cover w-20" src="https://www.shutterstock.com/image-illustration/50-red-fifty-percent-on-260nw-1332686732.jpg" alt="">
                    <span class="break-words pl-6">Giảm đến 50%</span>
                </div>
                <div class="flex items-center text-3xl basis-1/4 bg-white border rounded-xl p-5 overflow-hidden">
                    <img class=" rounded-full overflow-hidden object-cover w-20" src="https://cdn-v2.didongviet.vn/files/media/catalog/product/s/a/samsung-galaxy-a23-didongviet_2.jpg" alt="">
                    <span class="break-words pl-6">Điện thoại rẻ quá</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container m-auto pb-5 pt-16 object-cover">
        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/06/banner/1200x1001-1200x100.png" class=" w-full" alt="">
    </div>
</section>



<section>
    <div class="container m-auto">
        <div class="rounded-xl bg-blue-700 p-4" style="background-color: #920101">
            <h2 style="color:#FFE818" class="text-3xl font-bold text-white uppercase py-4 ps-3">Giờ vàng giá sốc</h2>
            <div class="slide">
                <div class="owl-carousel slide-first owl-theme owl-loaded">
                    <div class="owl-stage-outer ">
                        <div class="owl-stage flex">
                            <?php
                            foreach ($gio_vang as $value) {
                            ?>
                                <div class="owl-item flex ">
                                    <a href="../hang_hoa/chi_tiet.php?ma_hh=<?= $value['ma_hh'] ?>" class=" flex flex-1  hover:scale-95">
                                        <div class=" flex flex-col bg-white rounded mb-2">
                                            <div class="p-3 flex-auto flex justify-center items-center ">
                                                <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="<?= $UPLOAD_PRODUCT_URL . $value['hinh'] ?>" alt="Sunset in the mountains">
                                            </div>
                                            <div class="px-6 py-3 ">
                                                <div class="font-bold text-lg mb-2"><?= $value['ten_hh'] ?></div>
                                                <span class="text-neutral-600 text-base line-through pr-2"> <?= currency_format($value['don_gia']) ?>
                                                </span> <span> -<?= $value['giam_gia'] * 100 ?>%</span>
                                                <p class="text-red-500 font-bold text-lg"> <?= currency_format($value['don_gia'] - $value['don_gia'] * $value['giam_gia']) ?>
                                                </p>
                                            </div>
                                            <div class="px-6 pt-4 pb-2 flex-none">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php

                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="container m-auto py-4">
        <div class="rounded-xl p-4 " style="background-color:#FBC417">
            <h2 class="text-shadow text-5xl font-black text-white uppercase py-4 ps-3 tracking-tighter">cuối tuần <span class="ps-3">giá <span class="px-1 " style="color:#FFE818">rẻ</span> quá</span></h2>
            <div class="slide">
                <div class="owl-carousel slide-first owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage flex">
                            <?php
                            foreach ($gia_re as $value) {
                            ?>
                                <div class="owl-item flex ">
                                    <a href="../hang_hoa/chi_tiet.php?ma_hh=<?= $value['ma_hh'] ?>" class=" flex flex-1 hover:shadow hover:scale-95">
                                        <div class=" flex flex-col bg-white rounded  shadow-lg mb-2">
                                            <div class="p-3 flex-1 flex justify-center items-center ">
                                                <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="<?= $UPLOAD_PRODUCT_URL . $value['hinh'] ?>" alt="Sunset in the mountains">
                                            </div>
                                            <div class="px-6 py-3 flex-none">
                                                <div class="font-bold text-lg mb-2"><?= $value['ten_hh'] ?></div>
                                                <span class="text-neutral-600 text-base line-through pr-2"> <?= currency_format($value['don_gia']) ?>
                                                </span> <span> -<?= $value['giam_gia'] * 100 ?>%</span>
                                                <p class="text-red-500 font-bold text-lg"> <?=currency_format($value['don_gia'] - $value['don_gia'] * $value['giam_gia'])?>
                                                </p>
                                            </div>
                                            <div class="px-6 pt-4 pb-2 flex-none">

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 p-4 bg-white w-1/5 m-auto rounded-xl">
                <a href="" class="">Xem tất cả <i class="transition ease-in-out delay-150 hover:translate-x-6 fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

</section>


<section>
    <div class="container m-auto">
        <div class="rounded-xl bg-white p-4">
            <div class="flex justify-between px-3 pb-3">
                <h2 class="text-2xl uppercase font-semibold">dịch vụ tiện ích </h2>
                <a href="" class="text-xl text-zinc-600">XEM THÊM DỊCH VỤ <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
            <div class="flex gap-3 text-lg">
                <div class=" flex-1 rounded-lg p-4 bg-green-200">
                    <p class="pb-2">Mua thẻ cào</p>
                    <p><span class="text-red-500">Giảm giá 20%</span> cho các thẻ cào từ 100.000 trở lên</p>
                </div>
                <div class="flex-1 rounded-lg p-3 bg-yellow-200">
                    <p class="pb-2">Dịch vụ đóng tiền</p>
                    <p>Điện, Nước, Internet, Cước điện thoại trả sau</p>
                </div>
                <div class="flex-1 rounded-lg p-3 bg-red-200">
                    <p class="pb-2">Mua thẻ game</p>
                    <p><span class="text-red-500">Giảm giá 20%</span> áp dụng cho tất cả nhà mạng, các thẻ cào từ 300.000 trở lên</p>

                </div>
                <div class="flex-1 rounded-lg p-3 bg-blue-200">
                    <p class="pb-2">Office bản quyền</p>
                    <p>Mua Microsoft Office giá chỉ từ 990k</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container m-auto pt-7">
        <h2 class="text-3xl font-bold text-gray-950 uppercase py-4 ps-3">Gợi ý hôm nay</h2>
        <div class="py-3 grid grid-cols-5 gap-1">
            <?php
             $i=1;
            foreach ($goi_y as $value) {
            ?>
                <div class="owl-item flex ">
                    <a href="../hang_hoa/chi_tiet.php?ma_hh=<?= $value['ma_hh'] ?>" class=" flex flex-1  hover:scale-105 hover:shadow-slate-600 hover:shadow-2xl ">
                        <div class=" flex flex-col bg-white rounded  ">
                            <div class="p-3 flex-1 flex justify-center items-center ">
                                <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="<?= $UPLOAD_PRODUCT_URL . $value['hinh'] ?>" alt="Sunset in the mountains">
                            </div>
                            <div class="px-6 py-3 flex-none">
                                <div class="font-bold text-lg mb-2"><?= $value['ten_hh'] ?></div>
                                <span class="text-neutral-600 text-base line-through pr-2"> <?= currency_format($value['don_gia']) ?> đ
                                </span> <span> -<?= $value['giam_gia'] * 100 ?>%</span>
                                <p class="text-red-500 font-bold text-lg">  <?=currency_format($value['don_gia'] - $value['don_gia'] * $value['giam_gia'])?>
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2 flex-none">

                            </div>
                        </div>
                    </a>
                </div>
            <?php
                if ($i == 10) {
                    break;
                }
                $i++;
            }
            ?>


        </div>
    </div>
</section>



<script>
    var owl = $('.slide-banner');
    owl.owlCarousel({
        items: 2,
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 2,
            }
        }
    });
    var owl = $('.slide-first');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 4,
        nav: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });
</script>