<?php
include '../layout/header.php';
?>

<style>
    body {
        background-color: #6CDBFF;
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
        transform: translate(-50%,-50%);
        width: 103%;
        /* background-color: red; */
    }
    .owl-prev, .owl-next {
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
    .owl-prev:hover, .owl-next:hover {
        color: #fff !important;
        background-color: #1b64d2c3 !important;
    }

    .text-shadow {
        text-shadow: 2px 0 blue, -2px 0 blue, 0 2px blue, 0 -2px blue,
            1px 1px blue, -1px -1px blue, 1px -1px blue, -1px 1px blue;
    }
</style>
<section>
    <div class=" w-full bg-white p-8">
        <img class="w-full object-cover" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/05/banner/Banner-Big-Desk-1920x450.jpg" alt="">
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
                <div class="flex items-center text-2xl basis-1/4 bg-white  rounded-xl p-5 overflow-hidden">
                    <i class=" px-3 text-3xl fa fa-mobile" aria-hidden="true"></i> <span class="break-words">GALAXY A24 Series</span>
                </div>
                <div class="flex items-center text-2xl basis-1/4 bg-white rounded-xl p-3 overflow-hidden">
                    <i class=" px-3 text-3xl fa fa-mobile" aria-hidden="true"></i> <span class="break-words">GALAXY A24 Series</span>
                </div>
                <div class="flex items-center text-2xl basis-1/4 bg-white rounded-xl p-3 overflow-hidden">
                    <i class=" px-3 text-3xl fa fa-mobile" aria-hidden="true"></i> <span class="break-words">GALAXY A24 Series</span>
                </div>
                <div class="flex items-center text-2xl basis-1/4 bg-white  rounded-xl p-3 overflow-hidden">
                    <i class=" px-3 text-3xl fa fa-mobile" aria-hidden="true"></i> <span class="break-words">GALAXY A24 Series</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container m-auto py-5 object-cover">
        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/05/banner/1200x100-1200x100-3.png" class=" w-full" alt="">
    </div>
    <script>
        var owl = $('.slide-banner');
        owl.owlCarousel({
            items: 2,
            loop: true,
            margin: 10,
            nav:true,
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
    </script>
</section>



<section>
    <div class="container m-auto">
        <div class="rounded-xl bg-blue-700 p-4" style="background-color: #FF685F">
            <h2 style="color:#FFE818" class="text-3xl font-bold text-white uppercase py-4 ps-3">Giờ vàng giá sốc</h2>
            <div class="slide">
                <div class="owl-carousel slide-first owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                                for ($i=0; $i < 10; $i++) { 
                                    echo '
                                    <div class="owl-item">
                                        <a href="./detail.php" class="">
                                            <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                                <div class="p-3 ">
                                                    <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                                </div>
                                                <div class="px-6 py-3">
                                                    <div class="font-bold text-lg mb-2">galaxy A24</div>
                                                    <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                                    </p>
                                                    <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                                    </p>
                                                </div>
                                                <div class="px-6 pt-4 pb-2">
                                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="" class="">
                                            <div class="  bg-white rounded overflow-hidden shadow-lg">
                                                <div class="p-3 ">
                                                    <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                                </div>
                                                <div class="px-6 py-3">
                                                    <div class="font-bold text-lg mb-2">galaxy A24</div>
                                                    <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                                    </p>
                                                    <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                                    </p>
                                                </div>
                                                <div class="px-6 pt-4 pb-2">
                                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    ';
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
                        <div class="owl-stage">
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="owl-item">
                                <a href="" class="">
                                    <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                        <div class="p-3 ">
                                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                        </div>
                                        <div class="px-6 py-3">
                                            <div class="font-bold text-lg mb-2">galaxy A24</div>
                                            <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                            </p>
                                            <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
        <div class="py-3 grid grid-cols-5 gap-3">
            <?php
                for ($i=0; $i < 20; $i++) { 
                    echo '
                    <a href="" class="">
                        <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                            <div class="p-3 ">
                                <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                            </div>
                            <div class="px-6 py-3">
                                <div class="font-bold text-lg mb-2">galaxy A24</div>
                                <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                </p>
                                <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                            </div>
                        </div>
                    </a>
                    ';
                }
            ?>


        </div>
    </div>
</section>


<section>
    <div class="container m-auto py-4">
        <div class="rounded-xl p-4 " style="background-color:#FBC417">
            <h2 class=" text-center text-3xl font-black text-white uppercase py-4 ps-3"> những sản phẩm <span>được <span class="px-1 text-rose-500 ">yêu</span> thích</span></h2>
            <div class="slide">
                <div class="owl-carousel slide-first owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            for ($i=0; $i < 20; $i++) { 
                                echo '
                                <div class="owl-item">
                                    <a href="" class="">
                                        <div class="bg-white rounded overflow-hidden shadow-lg mb-2">
                                            <div class="p-3 ">
                                                <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg" alt="Sunset in the mountains">
                                            </div>
                                            <div class="px-6 py-3">
                                                <div class="font-bold text-lg mb-2">galaxy A24</div>
                                                <p class="text-red-500 font-bold text-lg"> 7.999.999 đ
                                                </p>
                                                <p class="text-neutral-600 text-base line-through"> 7.999.999 đ
                                                </p>
                                            </div>
                                            <div class="px-6 pt-4 pb-2">
                                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                ';
                            }

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    var owl = $('.slide-first');
    owl.owlCarousel({
        items: 2,
        loop: true,
        margin: 8,
        nav:true,
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

<?php
include '../layout/footer.php';
?>