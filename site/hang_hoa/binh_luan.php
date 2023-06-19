<div class="border px-1 py-2 lg:px-4 lg:py-6 rounded-md">
    <div class="flex p-2  mb-3">
        <div class="w-1/3 text-center text-base">
            <h2>Đánh giá trung bình</h2>
            <p class="text-5xl text-yellow-400 font-bold  m-auto py-3">
                <?php
                if (!empty($sum)) {
                    echo round($sum / $tong_vote, 1) . '/5';
                } else {
                    echo '0/5';
                }

                ?>
            </p>
            <div class="flex gap-2 justify-center">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    if (!empty($sum)) {
                        if ($i < floor($sum / $tong_vote)) {
                            echo '<i class="fa fa-star  text-yellow-400 text-sm lg:text-xl"  aria-hidden="true"></i>';
                        } else {
                            echo '<i class="fa fa-star-o  text-yellow-400 text-sm lg:text-xl" aria-hidden="true"></i>';
                        }
                    } else {
                        echo '<i class="fa fa-star-o  text-yellow-400 text-sm lg:text-xl" aria-hidden="true"></i>';
                    }
                }
                ?>
            </div>

            <p>Tất cả <?= $tong_vote ?> đánh giá</p>
        </div>
        <div class="w-2/3 border-l ps-10">
            <?php
            for ($i = 1; $i < 6; $i++) {

            ?>
                <div class="flex items-center gap-2">
                    <div>
                        <?= $i ?> <i class="fa fa-star  text-yellow-400 text-xs lg:text-sm" aria-hidden="true"></i>
                    </div>
                    <div class="w-1/3">
                        <div class="p-1 bg-gray-200 relative rounded overflow-hidden">
                            <div style="width:<?php
                                                foreach ($vote as $key => $value) {
                                                    if ($value['vote'] == $i) {
                                                        echo (100 / $tong_vote) * $value['so_luong'];
                                                        break;
                                                    }
                                                }
                                                ?>%;" class=" absolute h-full bg-yellow-400 top-0 left-0"></div>
                        </div>
                    </div>
                    <div class="w-1/2 text-orange-500 text-lg">
                        <?php
                        $so_luong = 0;
                        foreach ($vote as $key => $value) {
                            if ($value['vote'] == $i) {
                                echo round((100 / $tong_vote) * $value['so_luong'], 1) . '%';
                                $so_luong = 1;
                                break;
                            }
                        }
                        if ($so_luong == 0) {
                            echo '0%';
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
    <h2 class="text-base  pl-3 lg:pb-2 lg:text-xl font-bold">Bình luận</h2>

    <div class="form-bl">
        <?php
        $check = 0;
        foreach ($binh_luan as $value) {
            $check++;
            extract($value);
        ?>

            <div class="py-3 border-y p-2">
                <div class="flex items-center pb-2 flex-wrap">
                    <img class=" w-8 h-8 lg:w-14 lg:h-14 rounded-full mr-4" src="../../uploaded/user/<?= $hinh ?>" alt="Avatar of Jonathan Reinink">
                    <div class="text-sm">
                        <p class="text-gray-900 leading-none text-sm lg:text-lg font-semibold pb-2"><?= $ho_ten ?></p>
                        <p class="text-gray-600"><?= $ngay_bl ?></p>
                    </div>
                    <div class=" pl-4 flex gap-4 px-2 py-1">
                        <?php
                        if (!empty($value['vote'])) {
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $value['vote']) {
                                    echo '<i class="fa fa-star  text-yellow-400 text-sm lg:text-xl"  aria-hidden="true"></i>';
                                } else {
                                    echo '<i class="fa fa-star-o  text-yellow-400 text-sm lg:text-xl" aria-hidden="true"></i>';
                                }
                            }
                        }
                        ?>
                    </div>

                </div>
                <p><?= $noi_dung ?></p>
            </div>
            <div class="more-bls hidden">

            </div>
        <?php

        }
        ?>
    </div>
    <?php
    if($check>5){
        echo '    <div class="flex justify-center py-2">
        <span class="more-bl text-sm transition cursor-pointer duration-500 ease-in-out border border-blue-600 text-blue-600 px-10 py-1 lg:py-3 rounded-lg hover:bg-blue-600 hover:text-white">Xem thêm <i class="fa fa-caret-down" aria-hidden="true"></i></span>
    </div>';
    }
    ?>



    <?php
    if (empty($_SESSION['user'])) {

    ?>
        <div class="op-dangnhap text-sm py-2 lg:py-3 w-4/6 m-auto hover:bg-blue-500 rounded-md bg-blue-400 cursor-pointer text-center text-white font-semibold mt-4 mb-2">
            Bạn phải đăng nhập để bình luận
        </div>
    <?php
    } else {
    ?>
        <h2 class=" text-base lg:text-lg pl-3 pb-2 font-bold pt-4">Đánh giá</h2>

        <div class="flex gap-4 px-2 py-1">
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="1" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="2" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="3" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="4" aria-hidden="true"></i>
            <i class="fa fa-star-o vote cursor-pointer text-yellow-400 text-sm lg:text-xl" data-vote="5" aria-hidden="true"></i>
            <span class=" text-yellow-400 font-semibold danh-gia"></span>
        </div>
        <form class="pt-3">
            <div class="w-full mb-4 border  border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-2 lg:px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
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
    $('.more-bl').click(function() {
        $.ajax({
            url: "./them_bl.php?show_bl",
            type: "post",
            data: {
                noi_dung: 'noi_dung',
                nhap_binh_luan: $('textarea').val(),
                ma_hh: <?= $ma_hh ?>,
                vote: vote,
            },
            success: function(result) {
                $('.form-bl').html(result)
                $('.more-bl').css('display', 'none')
            }
        });
    })
</script>