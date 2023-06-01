
<section>
    <div class="container m-auto py-8">
        <div class="flex">
            <div class=" w-1/2">
                <div class=" w-3/4 m-auto">
                <img src="../../uploaded/product/<?=$sanpham['hinh']?>" alt="">

                </div>
            </div>
            <div class=" w-1/2">
                <h2 class=" font-bold text-2xl uppercase"><?=$sanpham['ten_hh']?></h2>
                <p>(Có 0 bình luận)</p>

                <h3 class=" text-red-600 font-bold text-2xl py-2"><?=$sanpham['giam_gia']?><span class=" line-through text-gray-600 font-normal text-base"><?=$sanpham['don_gia']?> </span></h3>
                <div class=" py-3">
                    <button class="transition ease-in-out duration-500 w-3/6 py-2 rounded-lg hover:shadow-lg text-orange-600 border border-orange-600 hover:bg-orange-600 hover:text-white text-lg">Thêm vào giỏ hàng <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    <button class="heart transition ease-in-out duration-500 hover:shadow-xl ml-3 mr-3 border border-rose-600 text-rose-600 text-lg rounded-xl py-2 px-3 ">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </button>(Có 0 lượt thả tim)
                    <button class="transition ease-in-out duration-500 hover:bg-red-500 uppercase w-4/6 mt-3 py-3 text-white font-semibold bg-red-600 rounded-lg">
                        Mua ngay giá rẻ liền tay
                    </button>
                    <button>

                    </button>
                </div>
                <div class=" rounded-md border border-gray-300 overflow-hidden w-4/5">
                    <p class=" font-semibold text-base bg-gray-200 p-3 border-b border-b-gray-300">Ưu đãi thêm</p>
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
        <div class="py-4 w-4/6 ">
            <h2 class=" text-xl font-bold text-center py-3">Thông tin sản phẩm</h2>
            <div class="text-center text-lg h-80 overflow-hidden read">
                <?=$sanpham['mo_ta']?>
            </div>
            <div class="text-center py-5">
                <button class="more-read transition duration-500 ease-in-out border border-blue-600 text-blue-600 px-10 py-3 rounded-lg hover:bg-blue-600 hover:text-white">Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="py-4 w-4/6">
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
        if($(this).html()=='Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i>'){
            $(this).html('Thu gọn <i class="fa fa-caret-up" aria-hidden="true"></i>')
            $('.read').removeClass('h-80')
        }else{
            $(this).html('Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i>')
            $('.read').addClass('h-80')
        }
    })
</script>
