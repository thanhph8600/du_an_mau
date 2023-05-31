<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h2 class=" font-bold text-2xl text-center pb-2">Quên mật khẩu</h2>

        <div class="check-tim-mk my-2">

        </div>
        <div class="mb-4">
<form action="../tai_khoan/index.php?tim_mk">
<label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Tên đăng nhập <span class="checkMakh text-red-600"></span>
            </label>
            <input class="ma_kh shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"  type="text" placeholder="Mã đăng nhập của bạn" >
        </div>
        <div class="mb-3">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Địa chỉ email
            </label>
            <input class="email shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="email" type="text" placeholder="Địa chỉ email của bạn">
            <p class=" text-red-700 text-xs italic"></p>
        </div>

        <div class="flex items-center justify-between">
            <button class="tim-mk bg-blue-600 hover:bg-blue-dark font-bold py-2 px-4 rounded text-white hover:bg-blue-700" type="button">
                Tìm lại mật khẩu
            </button>
            <p class=" cursor-pointer op-dangnhap inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                from đăng nhập
            </p>
        </div>
</form>
    </div>
    <script>
        $('.tim-mk').click(function() {
            $.ajax({
                url: "../tai_khoan/index.php?tim_mk",
                type: "post",
                data: {
                    email : $('.email').val(),
                    ma_kh : $('.ma_kh').val()
                },
                success: function(result) {
                    $('.check-tim-mk').html(result)
                    if(result == '<div class="border  p-2 bg-green-200"><h2 class=" text-xl font-semibold">Thông tin đã được xác nhận</h2>Mật khẩu mới được gửi trong email của bạn</div>'){
                        $.ajax({
                            url: "../tai_khoan/sendemail.php",
                            type: "POST",
                            data: {
                                email : $('.email').val(),
                                ma_kh : $('.ma_kh').val()
                            },
                            success: function(result) {
                                $('.ma_kh').val('')
                                $('.email').val('')
                            }
                        })

                    }

                }
            })
        })
    </script>