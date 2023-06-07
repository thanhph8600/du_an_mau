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


<section>
    <div class="container m-auto">
        <div class="flex gap-4 items-center justify-between">
            <div class="flex gap-4 items-center">
                <p class=" font-bold "><?= $ten_sp['ten_loai'] ?> (<?= $tong_sp ?>)</p>
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
                <a href="./chi_tiet.php?ma_hh=<?= $ma_hh ?>" class="hover:shadow-2xl hover:z-20 border">
                    <div class="bg-white  text-center">
                        <div class="p-3 ">
                            <img class="w-full transition ease-in-out delay-150 hover:-translate-y-1" src="../../uploaded/product/<?= $hinh ?>" alt="Sunset in the mountains">
                        </div>
                        <div class="px-6 py-3 ">
                                                <div class="font-bold text-lg mb-2"><?= $value['ten_hh'] ?></div>
                                                <span class="text-neutral-600 text-base line-through pr-2"> <?= currency_format($value['don_gia']) ?> đ
                                                </span> <span> -<?= $value['giam_gia'] * 100 ?>%</span>
                                                <p class="text-red-500 font-bold text-lg"> <?=currency_format($value['don_gia'] - $value['don_gia'] * $value['giam_gia'])?>
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
        <div class="spagination flex gap-5 justify-center py-3 text-lg">
            <?php
            // PHẦN HIỂN THỊ PHÂN TRANG

            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if(empty($_GET['ma_loai']) && empty($_GET['keyword']) ){
                if ($current_page > 1 && $total_page > 1) {
                    echo '<a href="liet_ke.php?page=' . ($current_page - 1) . '"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a> | ';
                }
    
                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $current_page) {
                        echo '<span class=" bg-orange-500 rounded px-4 text-white font-bold ">' . $i . '</span> | ';
                    } else {
                        echo '<a href="liet_ke.php?page=' . $i . '">' . $i . '</a> | ';
                    }
                }
    
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="liet_ke.php?page=' . ($current_page + 1) . '"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>  ';
                }
            }
            ?>
        </div>
    </div>
</section>