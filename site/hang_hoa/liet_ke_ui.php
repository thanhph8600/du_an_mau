<style>
    body {
        background-color: #fff;
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
</style>

<section>
    <div class="container m-auto my-5">
        <div class="owl-carousel slide-banner owl-theme owl-loaded">
            <div class="owl-stage-outer">
                <div class="owl-stage">
                    <div class="owl-item rounded-2xl overflow-hidden border">
                        <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/5/6/638189646721602303_F-C1_1200x300@2x.png" class=" rounded-2xl " alt="...">
                    </div>
                    <div class="owl-item rounded-2xl overflow-hidden border">
                        <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/30/638184959380570872_F-C1_1200x300.png" class="  rounded-2xl " alt="...">
                    </div>
                    <div class="owl-item rounded-2xl overflow-hidden border">
                        <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/5/6/638189390534070184_F-C1_1200x300.png" class=" rounded-2xl" alt="...">
                    </div>
                    <div class="owl-item rounded-2xl overflow-hidden border">
                        <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/5/6/638189624752664820_F-C1_1200x300.png" class=" rounded-2xl" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var owl = $('.slide-banner');
    owl.owlCarousel({
        items: 1,
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
                items: 1,
            },
            1000: {
                items: 1,
            }
        }
    });
</script>

<!-- <section>
    <div class="container m-auto py-4">
        <div class="flex flex-wrap gap-5">
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/IPhonelogo.svg/2560px-IPhonelogo.svg.png" alt="" class=" w-12 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Samsung_logo_blue.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://www.freepnglogos.com/uploads/oppo-logo-png/oppo-green-logo-transparent-0.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://1000logos.net/wp-content/uploads/2018/10/Xiaomi-Logo-2019.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://banner2.cleanpng.com/20180412/ysq/kisspng-vivo-logo-smartphone-branding-5acf57274b6e50.967449261523537703309.jpg" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Redmi_Logo.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://www.freepnglogos.com/uploads/nokia-logo-picture-16.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://masstel.vn/wp-content/uploads/2019/11/Logo-Masstel-4.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/db/Itel_Mobile_logo.png" alt="" class=" w-14 object-cover">
            </a>
            <a href="" class="flex items-center justify-center border rounded-3xl py-2 px-12 hover:border-blue-600">
                <img src="https://theme.hstatic.net/1000312916/1000409026/14/logo.png?v=138" alt="" class=" w-14 object-cover">
            </a>
        </div>
    </div>
</section> -->

<section>
    <div class="container m-auto">
        <div class="flex gap-4 items-center justify-between">
            <div class="flex gap-4 items-center">
                <p class=" font-bold "><?=$ten_sp['ten_loai']?> (<?=$tong_sp?>)</p>
                <div>
                    <input type="checkbox" name="" id=""> <label for="">Giảm giá</label>
                </div>
                <div><input type="checkbox" name="" id=""> <label for="">Góp 0% - 1%</label></div>
                <div><input type="checkbox" name="" id=""> <label for="">Độc quyền</label></div>
                <div><input type="checkbox" name="" id=""> <label for="">Mới</label></div>
            </div>
            <div>
                <section>
                    <option value="">Xếp theo: Nổi bật</option>
                </section>
            </div>
        </div>
        <div class="grid grid-cols-5 my-3">
            <?php
            foreach ($item as $value) {
                extract($value);
            ?>
                <a href="./chi_tiet.php?ma_hh=<?=$ma_hh?>" class="hover:shadow-2xl hover:z-20 border">
                    <div class="bg-white hover:shadow-2xl  text-center">
                        <div class="p-3 ">
                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="../../uploaded/product/<?=$hinh?>" alt="Sunset in the mountains">
                        </div>
                        <div class="px-6 py-3">
                            <div class=" font-bold text-lg mb-2"><?=$ten_hh?></div>
                            <p class="text-red-500 font-bold text-lg"><?=$don_gia?> đ
                            </p>
                            <p class="text-neutral-600 text-base line-through"> <?=$giam_gia?> đ
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Quà 500.000 đ</span>
                        </div>
                    </div>
                </a>

            <?php
            } ?>


        </div>
    </div>
</section>

