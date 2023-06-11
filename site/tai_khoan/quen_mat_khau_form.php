<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col load-popup">
    <h2 class=" font-bold text-2xl text-center pb-2">Quên mật khẩu</h2>

    <div class="check-tim-mk my-2">

    </div>
    <div class="mb-4">
        <form action="../tai_khoan/index.php?tim_mk">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Tên đăng nhập <span class="checkMakh text-red-500"></span>
            </label>
            <input class="ma_kh shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" >
    </div>
    <div class="mb-3">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Địa chỉ email <span class="check-email text-red-500"></span>
        </label>
        <input class="email shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="email" type="text" >
        <p class=" text-red-700 text-xs italic"></p>
    </div>

    <div class="flex items-center justify-between">
        <button class="tim-mk ten-la-gi-cung-duoc bg-blue-600 hover:bg-blue-dark font-bold py-2 px-4 rounded text-white hover:bg-blue-700" type="button">
            Tìm lại mật khẩu
        </button>

        <?php
        if (empty($_SESSION['user'])) {
            echo '        
                <p class=" cursor-pointer op-dangnhap inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                    from đăng nhập
                </p>';
        } else {
            echo '
                    <p class=" cursor-pointer doi-mat-khau inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                        Đổi mật khẩu
                    </p>
                ';
        }
        ?>

    </div>
    </form>
</div>
<script>
    $(document).on('click', ' .tim-mk', function() {
        let check = 1;
        if (!(/^([a-zA-Z ]){3,20}$/).test($('.ma_kh').val())) {
            $('.checkMakh').html('Không được chứa kí tự đặt biệt')
            $('.ma_kh').css('border', 'red 1px solid');
            check = 0;
        } else if ($('.ma_kh').val() == '') {
            $('.checkMakh').html('Không được để trống')
            $('.ma_kh').css('border', 'red 1px solid');
            check = 0;
        } else {
            $('.checkMakh').html('')
            $('.ma_kh').css('border', 'green 1px solid');
        }
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('.email').val())) {
            $('.check-email').html('Bạn nhập chưa đúng định dạng email')
            $('.email').css('border', 'red 1px solid');
            check = 0;
        } else if ($('.email').val() == '') {
            $('.check-email').html('Bạn chưa nhập email')
            $('.email').css('border', 'red 1px solid');
            check = 0;
        } else {
            $('.check-email').html('')
            $('.email').css('border', 'green 1px solid');
        }
        if (check == 1) {
            $('.tim-mk').html('<i class=" fa fa-spinner fa-spin"></i>')
            $('.ten-la-gi-cung-duoc').removeClass('tim-mk');
            $.ajax({
                url: "../tai_khoan/index.php?tim_mk",
                type: "post",
                data: {
                    email: $('.email').val(),
                    ma_kh: $('.ma_kh').val()
                },
                success: function(result) {
                    $('.check-tim-mk').html(result)
                    if (result.length < 10) {
                        $.ajax({
                            url: "../tai_khoan/sendemail.php",
                            type: "POST",
                            data: {
                                email: $('.email').val(),
                                ma_kh: $('.ma_kh').val()
                            },
                            success: function(result) {
                                $('.ma_kh').val('')
                                $('.email').val('')
                                if(result.length >100){
                                    $('.check-tim-mk').html('<div class="border  p-2 bg-green-200"><h2 class=" text-xl font-semibold">Thông tin đã được xác nhận</h2>Mật khẩu mới được gửi trong email của bạn</div>')
                                }
                                $('.ten-la-gi-cung-duoc').html('Tìm lại mật khẩu')
                                $('.ten-la-gi-cung-duoc').addClass('tim-mk');
                            }
                        })

                    } else {
                        $('.ten-la-gi-cung-duoc').html('Tìm lại mật khẩu')
                        $('.ten-la-gi-cung-duoc').addClass('tim-mk');
                    }

                }
            })
        }

    })

    $(document).on('click', ' .doi-mat-khau', function() {
        $('.popup').css('display', 'block')
        $('.close-popup').css('display', 'block')
        $(".loading").css('display', 'block')

        $.ajax({
            url: "../tai_khoan/index.php?btn_doi_mat_khau",
            type: "post",
            data: {
                doi_mat_khau: 'doi_mat_khau',
            },
            success: function(result) {
    $(".loading").css('display', 'none')

                $('.form').html(result)
                $(".panel").slideUp("slow");
            }
        });
    })
</script>