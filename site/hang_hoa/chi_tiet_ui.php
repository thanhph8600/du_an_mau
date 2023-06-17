<section>
    <div class="container m-auto py-8">
        <div class="lg:flex">
            <div class=" lg:w-1/2">
                <div class=" w-3/5 m-auto flex items-center justify-center">
                    <img src="../../uploaded/product/<?= $sanpham['hinh'] ?>" alt="">
                </div>
            </div>
            <div class=" lg:w-1/2 pt-3 lg:pt-0 text-sm">
                <h2 class=" font-bold text-base lg:text-2xl uppercase"><?= $sanpham['ten_hh'] ?></h2>
                <p>(Có <?= $tong_bl ?> bình luận)</p>

                <h3 class=" text-red-600 font-bold text-base lg:text-2xl py-2">
                    <?= currency_format($sanpham['don_gia'] - $sanpham['don_gia'] * $sanpham['giam_gia'])
                    ?>
                    <span class=" line-through text-gray-600 font-normal text-sm lg:text-base"> <?= currency_format($sanpham['don_gia']) ?> </span>
                </h3>
                <div class=" py-1 lg:py-3">
                    <button class="add-shopcart transition ease-in-out duration-500 w-3/6 py-2 rounded-lg hover:shadow-lg text-orange-600 border border-orange-600 hover:bg-orange-600 hover:text-white text-sm lg:text-lg">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    <button class="heart transition ease-in-out duration-500 hover:shadow-xl ml-3 mr-3 border border-rose-600 text-rose-600 text-sm lg:text-lg rounded-xl py-2 px-3 ">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </button>(Có 0 lượt thả tim)
                    <button class="mua_ngay transition text-xs ease-in-out duration-500 hover:bg-red-500 uppercase w-4/5 lg:w-4/6 mt-3 py-3 text-white font-semibold bg-red-600 rounded-lg">
                        Mua ngay giá rẻ liền tay
                    </button>
                    <button>

                    </button>
                </div>
                <div class=" rounded-md border text-sm  border-gray-300 overflow-hidden w-full lg:w-4/5">
                    <p class=" font-semibold text-sm lg:text-base bg-gray-200 p-3 border-b border-b-gray-300">Ưu đãi thêm</p>
                    <div class="px-3 pb-2">
                        <p class="py-2"><i class="fa fa-check-circle mr-3 text-green-700" aria-hidden="true"></i>Giảm 10% đối với sinh viên</p>
                        <p class="py-2"><i class="fa fa-check-circle mr-3 text-green-700" aria-hidden="true"></i>Bảo vệ sản phẩm toàn diện với dịch vụ bảo hành mở rộng</p>
                        <p class="py-2"><i class="fa fa-check-circle mr-3 text-green-700" aria-hidden="true"></i>Nhập mã MMDIENTU giảm ngay 1% tối đa 100.000đ khi thanh toán qua MOMO</p>
                        <p class="py-2"><i class="fa fa-check-circle mr-3 text-green-700" aria-hidden="true"></i>Giảm thêm 5% tối đa 500.000đ khi thanh toán qua Kredivo</p>
                        <p class="py-2"><i class="fa fa-check-circle mr-3 text-green-700" aria-hidden="true"></i>Thu cũ đổi mới: Giá thu cao - Thủ tục nhanh chóng - Trợ giá tốt nhất</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-1 lg:py-4  border mt-2 lg:mt-10 ">
            <h2 class=" text-base lg:text-xl font-bold text-center py-3">Thông tin sản phẩm</h2>
            <div class="p-2 text-sm lg:p-5 lg:text-lg h-80 overflow-hidden read">
                <?= $sanpham['mo_ta'] ?>
            </div>
            <div class="text-center py-2 lg:py-5 ssss ">
                <button class="more-read text-sm transition duration-500 ease-in-out border border-blue-600 text-blue-600 px-10 py-1 lg:py-3 rounded-lg hover:bg-blue-600 hover:text-white">Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="w-full py-4 lg:w-4/6">
            <?php
            include 'binh_luan.php';
            ?>
        </div>
    </div>
</section>
<script>
    $('.heart').click(function() {
        var check = $('.fa').hasClass('fa-heart-o')
        if (check == true) {
            $('.fa-heart-o').addClass('fa-heart').removeClass('fa-heart-o')
        } else {
            $('.fa-heart').addClass('fa-heart-o').removeClass('fa-heart')
        }
        console.log(check)
    })
    $('.more-read').click(function() {
        if ($(this).html() == 'Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i>') {
            $(this).html('Thu gọn <i class="fa fa-caret-up" aria-hidden="true"></i>')
            $('.read').removeClass('h-80')
        } else {
            $(this).html('Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i>')
            $('.read').addClass('h-80')
        }
    })


    $('.add-shopcart').click(function() {
        let item = {
            'id': '<?= $sanpham['ma_hh'] ?>',
            'hinh': '<?= $sanpham['hinh'] ?>',
            'name': '<?= $sanpham['ten_hh'] ?>',
            'gia': <?= $sanpham['don_gia'] - $sanpham['don_gia'] * $sanpham['giam_gia'] ?>,
            'so_luong': 1,
        }
        addCart(item)
        window.location.replace("../gio_hang/");
    })

    $('.mua_ngay').click(function() {
        let item = {
            'id': '<?= $sanpham['ma_hh'] ?>',
            'hinh': '<?= $sanpham['hinh'] ?>',
            'name': '<?= $sanpham['ten_hh'] ?>',
            'gia': <?= $sanpham['don_gia'] - $sanpham['don_gia'] * $sanpham['giam_gia'] ?>,
            'so_luong': 1,
        }
        addCart(item)
        $(location).attr("href", '../gio_hang/index.php?thanh_toan_ngay');
    })
</script>