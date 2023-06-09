    <div class="bg-white shadow-md rounded px-4 pt-3 pb-4 mb-2 lg:px-8 lg:pt-6 lg:pb-8 lg:mb-4 flex flex-col load-popup">
        <h2 class=" font-bold text-base lg:text-2xl text-center pb-2">Đăng nhập</h2>

        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Tên đăng nhập <span class="checkEmail text-red-600"></span>
            </label>
            <input class="email shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="email" type="text" placeholder="Email" value="<?= (!empty($_COOKIE['ma_kh']) ? $_COOKIE['ma_kh'] : '') ?>">
        </div>
        <div class="mb-3">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="pass shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************" value="<?= (!empty($_COOKIE['mat_khau']) ? $_COOKIE['mat_khau'] : '') ?>">
            <p class="check-login text-red-700 text-xs italic"></p>
        </div>
        <div class="flex mb-3 gap-2">
            <input type="checkbox" name="ghi_nho" id="" class="ghi_nho" value="ghi_nho"> Ghi nhớ tài khoản?
        </div>
        <div class="lg:flex items-center justify-between">
            <button class="dangNhap bg-blue-600 hover:bg-blue-dark font-bold py-2 px-4 rounded text-white hover:bg-blue-700" type="button">
                Đăng nhập
            </button>
            <p class="py-2 lg:py-0 quen-mat-khau inline-block cursor-pointer align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                Quên mật khẩu?
            </p>
        </div>
        <div class=" lg:pt-4">
            <p>Bạn chưa có tài khoản <span class=" text-blue-700 cursor-pointer op-dangky"> Đăng ký</span></p>
        </div>
    </div>
    <script>
        $('.quen-mat-khau').click(function() {
            $(".loading").css('display', 'block')

            $.ajax({
                url: "../tai_khoan/index.php?quen_mat_khau",
                type: "post",
                data: {},
                success: function(result) {
                    $(".loading").css('display', 'none')

                    $('.form').html(result)
                }
            });
        })

        $('.close-popup').click(function() {
            $('.popup').css('display', 'none')
            $(this).css('display', 'none')
        })
        $('.dangNhap').click(function() {
            var regexEmail = /^([a-zA-Z0-9_-]{3,20})*$/
            var check = 1

            if ($('.email').val() != '') {
                if (!regexEmail.test($('.email').val())) {
                    $('.email').css('border', '1px solid red')
                    $('.checkEmail').html(' không đúng định dạng')
                    check = 0
                } else {
                    $('.checkEmail').html('')
                    $('.email').css('border', '1px solid green')
                }
            } else {
                $('.email').css('border', '1px solid red')
                check = 0

            }

            if (check == 1) {
                $(".loading").css('display', 'block')
                $.ajax({
                    url: "../tai_khoan/index.php?dang_nhap",
                    type: "post",
                    data: {
                        ma_kh: $('.email').val(),
                        pass: $('.pass').val(),
                        ghi_nho: $('.ghi_nho:checked').val(),
                    },
                    success: function(result) {
                        $(".loading").css('display', 'none')

                        if (result == " " || result.length < 5) {
                            console.log(result)
                            alert('Đăng nhập thành công')
                            setTimeout(() => {
                                window.location.reload(true)
                            }, 0);

                        } else {
                            $('.check-login').html(result)
                        }
                        console.log(result)
                        // $(location).attr("href", pageURL);

                    }
                });
            }
        })
    </script>