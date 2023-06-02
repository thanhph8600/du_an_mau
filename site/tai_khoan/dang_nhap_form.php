    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h2 class=" font-bold text-2xl text-center pb-2">Đăng nhập</h2>

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
        <div class="flex items-center justify-between">
            <button class="dangNhap bg-blue-600 hover:bg-blue-dark font-bold py-2 px-4 rounded text-white hover:bg-blue-700" type="button">
                Đăng nhập
            </button>
            <p class="quen-mat-khau inline-block cursor-pointer align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                Quên mật khẩu?
            </p>
        </div>
        <div class="pt-4">
            <p>Bạn chưa có tài khoản <span class=" text-blue-700 cursor-pointer op-dangky"> Đăng ký</span></p>
        </div>
    </div>
    <script>

        $('.quen-mat-khau').click(function() {
            $.ajax({
                    url: "../tai_khoan/index.php?quen_mat_khau",
                    type: "post",
                    data: {
                    },
                    success: function(result) {
                        $('.form').html(result)
                    }
                });
        })

        $('.close-popup').click(function() {
            $('.popup').css('display', 'none')
            $(this).css('display', 'none')
        })
        $('.dangNhap').click(function() {
            var regexEmail = /^([a-zA-Z0-9_-]{5,20})*$/
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
                $.ajax({
                    url: "../tai_khoan/index.php",
                    type: "post",
                    data: {
                        dang_nhap: 'dang_nhap',
                        email: $('.email').val(),
                        pass: $('.pass').val(),
                        ghi_nho: $('.ghi_nho:checked').val(),
                    },
                    success: function(result) {
                        if (result == "SS") {
                            alert('Đăng nhập thành công')
                            setTimeout(() => {
                                window.location.reload(true)
                            }, 0);

                        } else {
                            $('.check-login').html(result)
                        }

                        // $(location).attr("href", pageURL);

                    }
                });
            }
        })
    </script>