<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <h2 class=" font-bold text-2xl text-center pb-2">Đổi mật khẩu</h2>

    <div class="check-doi-mat-khau my-2">

    </div>
    <div class="mb-4">
        <form action="../tai_khoan/index.php?tim_mk">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Tên đăng nhập <span class="checkMakh text-red-600"></span>
            </label>
            <input class="ma_kh shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" type="text" placeholder="Mã đăng nhập của bạn">
    </div>
    <div class="mb-3">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Mật khẩu cũ
        </label>
        <input class="pass-old shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" placeholder="">
        <p class=" text-red-700 text-xs italic"></p>
    </div>
    <div class="mb-3">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Mật khẩu mới
        </label>
        <input class="pass-new shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" type="password" placeholder="">
        <p class=" text-red-700 text-xs italic"></p>
    </div>
    <div class="mb-3">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Nhập lại mật khẩu mới
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

<script>
    $('.gui-form-doi-mat-khau').click(function() {
        $.ajax({
            url: '../tai_khoan/index.php?doi_mat_khau',
            type : 'POST',
            data:{
                ma_kh : $('.ma_kh').val(),
                pass_old : $('.pass-old').val(),
                pass_new : $(".pass-new").val(),
                re_pass_new : $('.re-pass-new').val()
            },
            success: function(result) {
                $('.check-doi-mat-khau').html(result)
                $('.pass-old').val(''),
                $(".pass-new").val(''),
                $('.re-pass-new').val('')
            }
        })
    })
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

</script>