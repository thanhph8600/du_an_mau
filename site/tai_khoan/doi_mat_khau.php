<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <h2 class=" font-bold text-2xl text-center pb-2">Đổi mật khẩu</h2>

    <div class="check-doi-mat-khau my-2">

    </div>
    <div class="mb-4">
        <form action="../tai_khoan/index.php?tim_mk">
            <div class="mb-3">
                <label class=" block text-grey-darker text-sm font-bold mb-2" for="username">
                    Tên đăng nhập <span class="checkMakh text-red-600"></span>
                </label>
                <input class="ma_kh shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" placeholder="Mã đăng nhập của bạn">
            </div>
            <div class="mb-3">
                <label class=" block text-grey-darker text-sm font-bold mb-2" for="password">
                    Mật khẩu cũ <span class="checkpass-old text-red-600"></span>
                </label>
                <input class="pass-old shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" placeholder="">
                <p class=" text-red-700 text-xs italic"></p>
            </div>
            <div class="mb-3">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Mật khẩu mới <span class="checkpass-new text-red-600"></span>
                </label>
                <input class="pass-new shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" placeholder="">
                <p class=" text-red-700 text-xs italic"></p>
            </div>
            <div class="mb-3">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Nhập lại mật khẩu mới <span class="checkrepass-new text-red-600"></span>
                </label>
                <input class="re-pass-new shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" placeholder="">
                <p class=" text-red-700 text-xs italic"></p>
            </div>

            <div class="flex items-center justify-between">
                <p class="gui-form-doi-mat-khau cursor-pointer bg-blue-600 hover:bg-blue-dark font-bold py-2 px-4 rounded text-white hover:bg-blue-700">
                    Đổi mật khẩu
                </p>
                <p class="quen-mat-khau inline-block cursor-pointer align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                    Quên mật khẩu?
                </p>
            </div>
        </form>
    </div>

</div>

<script>
    var check = 1;

    $(document).on('keyup  paste', '.ma_kh , .pass-old, .pass-new, .re-pass-new', function() {
        if (!(/^([a-zA-Z0-9 ]){3,20}$/).test($('.ma_kh').val())) {
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
            check = 1;
        }

        if ($('.pass-old').val() == '') {
            $('.checkpass-old').html('Không được để trống')
            $('.pass-old').css('border', 'red 1px solid');
            check = 0;
        } else if ($('.pass-old').val().length < 8 || $('.pass-old').val().length > 32) {
            $('.checkpass-old').html('Nhập từ 8 đến 32 kí tự')
            $('.pass-old').css('border', 'red 1px solid');
            check = 0;
        } else {
            $('.checkpass-old').html('')
            check = 1;
            $('.pass-old').css('border', 'green 1px solid');
        }

        if ($('.pass-new').val() == '') {
            $('.checkpass-new').html('Không được để trống')
            $('.pass-new').css('border', 'red 1px solid');
            check = 0;
        } else if ($('.pass-new').val().length  < 8 || $('.pass-old').val().length  > 32) {
            $('.checkpass-new').html('Nhập từ 8 đến 32 kí tự')
            $('.pass-new').css('border', 'red 1px solid');
            check = 0;
        } else {
            $('.checkpass-new').html('')
            check = 1;
            $('.pass-new').css('border', 'green 1px solid');
        }

        if ($('.re-pass-new').val() == '') {
            $('.checkrepass-new').html('Không được để trống')
            $('.re-pass-new').css('border', 'red 1px solid');
            check = 0;
        } else if ($('.re-pass-new').val() == $('.pass-new').val()) {
            $('.checkrepass-new').html('')
            check = 1;
            $('.re-pass-new').css('border', 'green 1px solid');
        } else {
            $('.checkrepass-new').html('Không giống mật khẩu đã nhập')
            $('.re-pass-new').css('border', 'red 1px solid');
            check = 0;
        }
    })


    $('.gui-form-doi-mat-khau').click(function() {

        console.log(check)
        if (check == 1) {
            $.ajax({
                url: '../tai_khoan/index.php?doi_mat_khau',
                type: 'POST',
                data: {
                    ma_kh: $('.ma_kh').val(),
                    pass_old: $('.pass-old').val(),
                    pass_new: $(".pass-new").val(),
                    re_pass_new: $('.re-pass-new').val()
                },
                success: function(result) {
                    $('.check-doi-mat-khau').html(result)
                    $('.pass-old').val(''),
                        $(".pass-new").val(''),
                        $('.re-pass-new').val('')
                }
            })
        }

    })
    $('.quen-mat-khau').click(function() {
        $.ajax({
            url: "../tai_khoan/index.php?quen_mat_khau",
            type: "post",
            data: {},
            success: function(result) {
                $('.form').html(result)
            }
        });
    })
</script>