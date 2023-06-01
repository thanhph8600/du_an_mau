<div class="signup bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <form action="" class="signup">
        <h2 class=" font-bold text-2xl text-center pb-2">Đăng kí</h2>
        <div class=" flex gap-4">
            <div class="mb-4 w-1/2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Tên đăng nhập <span class="checkMakh-re text-red-600"></span></label>
                <input type="text" class="ten-dang-nhap shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập tên đăng nhâp">
            </div>
            <div class="mb-4  w-1/2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Họ và tên <span class="checkName-re text-red-600"></span></label>
                <input type="text" class="name-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập tên">
            </div>
        </div>
        <div class="flex gap-4">
            <div class="mb-4  w-1/2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Email <span class="checkEmail-re text-red-600"></span></label>
                <input type="text" class="email-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập email">
            </div>
            <div class="mb-4  w-1/2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Số điện thoại <span class="checkPhone-re text-red-600"></span></label>
                <input type="text" class="phone-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập số điện thoại">
            </div>
        </div>
        <div class="flex gap-4">
            <div class="mb-4  w-1/2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Mật khẩu <span class="checkPass-re text-red-600"></span></label>
                <input type="password" class="pass-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập mật khẩu">
            </div>
            <div class="mb-4 w-1/2 ">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Nhập lại mật khẩu <span class="checkRepass-re text-red-600"></span></label>
                <input type="password" class="repass-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập lại mật khẩu">
            </div>
        </div>

        <div class="mb-4  ">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="">Hình ảnh</label>
            <input type="file" name="upload" id="sortpicture" accept="image/*">
        </div>
        <input type="hidden" name="" class="vai-tro-re" value="1">
        <input type="hidden" name="" class="trang-thai-re" value="1">
        <p class=" cursor-pointer dangky rounded-xl text-center px-3 py-2 w-2/3 m-auto bg-blue-700 hover:bg-blue-600 text-white">Đăng Ký</p>
        <p>Bạn đã tài khoản <span class="op-dangnhap cursor-pointer text-blue-600">Đăng nhập</span></p>
    </form>
</div>

<script>
    $('.dangky').click(function() {

        var regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
        var regexName = /^[0-9a-zA-ZàáạãảầấậồốộổỗớờỡởợơẩẫằắặẳẵăêèẹẻẽếềểệễửữừứựơớờợởỡđéâäãåąáấâăčćęèéêëėįỉịíìĩìíîïłńòóôöõøùúûüươứớựųūÿỳýỷỹỵýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{1,30}$/
        var regexPhone = /[0][0-9]{9}/
        var regexPass = /[A-Za-z0-9.!#$%&'*+/=?^_`{|}~-]{6,30}/
        var check = 1

        if ($('.email-re').val() != '') {
            if (!regexEmail.test($('.email-re').val())) {
                $('.email-re').css('border', '1px solid red')
                $('.checkEmail-re').html(' không đúng định dạng')
                check = 0
            } else {
                $('.checkEmail-re').html('')
                $('.email-re').css('border', '1px solid green')
            }
        } else {
            $('.email-re').css('border', '1px solid red')
            check = 0

        }

        if ($('.name-re').val() != '') {
            if (!regexName.test($('.name-re').val())) {
                $('.name-re').css('border', '1px solid red')
                $('.checkName-re').html(' không được có kí tự đặt biệt')
                check = 0
            } else {
                $('.checkName-re').html('')
                $('.name-re').css('border', '1px solid green')
            }
        } else {
            check = 0
            $('.name-re').css('border', '1px solid red')
        }

        if ($('.phone-re').val() != '') {
            if (!regexPhone.test($('.phone-re').val())) {
                $('.phone-re').css('border', '1px solid red')
                $('.checkPhone-re').html(' phải có 10 số')
                check = 0
            } else {
                $('.checkPhone-re').html('')
                $('.phone-re').css('border', '1px solid green')
            }
        } else {
            check = 0
            $('.phone-re').css('border', '1px solid red')
        }

        if ($('.pass-re').val() != '') {
            if (!regexPass.test($('.pass-re').val())) {
                $('.pass-re').css('border', '1px solid red')
                $('.checkPass-re').html(' 6 - 30 kí tự')
                check = 0
            } else {
                $('.checkPass-re').html('')
                $('.pass-re').css('border', '1px solid green')
            }
        } else {
            check = 0
            $('.pass-re').css('border', '1px solid red')
        }

        if ($('.repass-re').val() != '') {
            if ($('.repass-re').val() != $('.pass-re').val()) {
                $('.repass-re').css('border', '1px solid red')
                $('.checkRepass-re').html(' không giống mật khẩu đã nhập')
                check = 0
            } else {
                $('.checkRepass-re').html('')
                $('.repass-re').css('border', '1px solid green')
            }
        } else {
            check = 0
            $('.repass-re').css('border', '1px solid red')
        }

        if (true) {
            var file_data = $('#sortpicture').prop('files')[0];
            var form_data = new FormData();
            form_data.append('hinh', file_data);
            form_data.append('name', $('.name-re').val());
            form_data.append('email', $('.email-re').val());
            form_data.append('phone', $('.phone-re').val());
            form_data.append('pass', $('.pass-re').val());
            form_data.append('ma_kh', $('.ten-dang-nhap').val());
            form_data.append('vai_tro', $('.vai-tro-re').val());
            form_data.append('trang_thai', $('.trang-thai-re').val());

            $.ajax({
                url: '../tai_khoan/index.php?dang_ky', // <-- point to server-side PHP script 
                dataType: 'text', // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                success: function(php_script_response) {
                    if (php_script_response == 'ok') {
                        alert('đăng kí thành công')
                        setTimeout(() => {
                            window.location.reload(true)
                        }, 0);
                    } else {
                        $('.checkMakh-re').html(php_script_response)
                    }
                }
            });
        }
    })
</script>