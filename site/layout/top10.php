<style>
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
    <div class="container m-auto py-1 lg:py-4">
        <div class="rounded-xl p-1 lg:p-4 " style="background-color:#FBC417">
            <h2 class=" text-center text-base py-1 font-black text-white uppercase lg:text-2xl lg:py-4 lg:ps-3">
                <?=
                (empty($top10)) ? 'TOP 10 sản phẩm <span>được <span class="px-1 text-rose-500 ">yêu</span> thích</span>' : 'Các sản phẩm tương tự';
                ?>
            </h2>
            <div class="slide">
                <div class="owl-carousel slide-first owl-theme owl-loaded overflow-hidden">
                    <div class="owl-stage-outer">
                        <div class="owl-stage flex">
                            <?php
                            (empty($top10)) ? $top10 = hang_hoa_select_top10() : '';

                            foreach ($top10 as $value) {
                            ?>
                                <div class="owl-item flex ">
                                    <a href="../hang_hoa/chi_tiet.php?ma_hh=<?= $value['ma_hh'] ?>" class=" flex flex-1  hover:scale-95">
                                        <div class=" flex flex-col bg-white rounded mb-2">
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

<script>
    var owl = $('.slide-first');
    owl.owlCarousel({
        items: 2,
        loop: true,
        margin: 4,
        nav: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 4,
            },
            1000: {
                items: 5,
            }
        }
    });
</script>