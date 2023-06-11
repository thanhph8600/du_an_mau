<div class="border px-4 py-6 rounded-md">

    <h2 class=" text-xl pl-3 pb-2 font-bold">Bình luận</h2>

    <div class="form-bl">
        <?php
        foreach ($binh_luan as $value) {
            extract($value);
        ?>

            <div class="py-3 border-y p-2">
                <div class="flex items-center pb-2">
                    <img class=" w-14 h-14 rounded-full mr-4" src="../../uploaded/user/<?= $hinh ?>" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none text-lg font-semibold pb-2"><?= $ho_ten ?></p>
                        <p class="text-gray-600"><?= $ngay_bl ?></p>
                    </div>
                    <div class=" pl-4 flex gap-4 px-2 py-1">
                        <?php
                        if (!empty($value['vote'])) {
                            for($i=0;$i<5;$i++){
                                if($i<$value['vote']){
                                    echo '<i class="fa fa-star cursor-pointer text-yellow-400 text-xl"  aria-hidden="true"></i>';
                                }else{
                                    echo '<i class="fa fa-star-o cursor-pointer text-yellow-400 text-xl" aria-hidden="true"></i>';
                                }
                            }
                        }
                        ?>
                    </div>

                </div>
                <p><?= $noi_dung ?></p>
            </div>
        <?php
        }
        ?>
    </div>



    <?php
    if (empty($_SESSION['user'])) {

    ?>
        <div class="op-dangnhap py-3 w-4/6 m-auto hover:bg-blue-500 rounded-md bg-blue-400 cursor-pointer text-center text-white font-semibold mt-4 mb-2">
            Bạn phải đăng nhập để bình luận
        </div>
    <?php
    } else {
    ?>
        <h2 class=" text-lg pl-3 pb-2 font-bold pt-4">Xếp hạng</h2>

        <div class="flex gap-4 px-2 py-1">
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-xl" data-vote="1" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-xl" data-vote="2" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-xl" data-vote="3" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-xl" data-vote="4" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-xl" data-vote="5" aria-hidden="true"></i>
            <span class=" text-yellow-400 font-semibold danh-gia"></span>
        </div>
        <form class="pt-3">
            <div class="w-full mb-4 border  border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="4" class="w-full px-0 text-sm focus:outline-none text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                </div>
                <div class="flex items-center flex-row-reverse px-3 py-2 border-t dark:border-gray-600">
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Post comment
                    </button>

                </div>
            </div>
        </form>

        <!-- <textarea id="" cols="30" class="my-3 focus:outline-none focus:shadow-md focus:border focus:shadow-blue-400  rounded-md w-full border p-3" placeholder="Mời bạn nhập bình luận"></textarea>
        <div class="flex justify-end">
            <button value="" class=" text-center w-1/6 rounded-md bg-blue-400 text-white py-3 cursor-pointer hover:bg-blue-500">
                Gửi</button>
        </div> -->
    <?php
    }
    ?>


</div>

<script>
    $('.op-popup').click(function() {
        $('.popup').css('display', 'block')
        $('.close-popup').css('display', 'block')
    })


    var vote = 0
    $(document).on('click', '.vote', function() {
        // console.log($(this).attr('data-vote'))
        vote = Number($(this).attr('data-vote'))
        $('.vote').each(function(i, obj) {
            if (Number($(obj).attr('data-vote')) <= vote) {
                $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
        let danhGia = '';
        switch (vote) {
            case 1:
                danhGia = "Rất tệ"
                break;
            case 2:
                danhGia = "Tệ"
                break;
            case 3:
                danhGia = "Bình thường"
                break;
            case 4:
                danhGia = "Tốt"
                break;
            case 5:
                danhGia = "Rất tốt"
                break;
            default:
            danhGia = ""
                break;
        }
        $('.danh-gia').html(danhGia)
    })


    $('button').click(function() {
        var check = 1;
        if ($('textarea').val() == '') {
            check = 0;
            $('textarea').css('border', '1px red solid');
        } else {
            $('textarea').css('border', '1px green solid');
        }

        if (check == 1) {
            $(".loading").css('display', 'block')

            $.ajax({
                url: "./them_bl.php",
                type: "post",
                data: {
                    noi_dung: 'noi_dung',
                    nhap_binh_luan: $('textarea').val(),
                    ma_hh: <?= $ma_hh ?>,
                    vote: vote,
                },
                success: function(result) {
                    $(".loading").css('display', 'none')
                    $('.form-bl').append(result)
                $('.vote').removeClass('fa-star').addClass('fa-star-o');

                }
            });
            
            $('textarea').val('')
        }
    })
</script>