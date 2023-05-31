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
    <div class="container m-auto py-4">
        <div class="rounded-xl p-4 " style="background-color:#FBC417">
            <h2 class=" text-center text-3xl font-black text-white uppercase py-4 ps-3"> TOP 10 sản phẩm <span>được <span class="px-1 text-rose-500 ">yêu</span> thích</span></h2>
            <div class="slide">
                <div class="owl-carousel slide-first owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            for ($i = 0; $i < 20; $i++) {
                            ?>
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