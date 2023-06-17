<section>
    <div class="container m-auto pt-1 lg:pt-6 pb-2 min-h-screen">
        <div class="w-full mb-2 lg:w-4/5 lg:mb-4 m-auto ">
            <?php
            if (!empty($MESS)) {
                echo $MESS;
            } ?>
        </div>

        <form action="../tai_khoan/cap_nhat_tk.php?cap_nhat_tk" class="w-full p-2 m-auto border rounded-md lg:w-4/5 lg:p-4" enctype="multipart/form-data" method="post" id="cap_nhat_tk">
            <h2 class=" text-base lg:text-xl font-bold uppercase pb-2 border-b">Thông tin tài khoản</h2>
            <div class=" lg:flex gap-4 py-2 texts">
                <div class="mb-2 lg:mb-4 lg:w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Tên đăng nhập <span class="checkMakh-re text-red-600"></span></label>
                    <input name="ma_kh" type="text" class=" border-none bg-gray-300 focus:border-none active:border-none  ten-dang-nhap shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" readonly value="<?= $user['ma_kh'] ?>">

                </div>
                <div class="mb-2 lg:mb-4 lg:w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Họ và tên <span class="checkName-re text-red-600"></span></label>
                    <input  type="text" class="name-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="name"  value="<?= $newuser['ho_ten'] ?>">
                    <?php
                        if (!empty($name_err)) echo $name_err;
                    ?>
                </div>
            </div>
            <div class="lg:flex gap-4">
                <div class="mb-2 lg:mb-4  lg:w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Email <span class="checkEmail-re text-red-600"></span></label>
                    <input type="text" class="email-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="email" value="<?= $newuser['email'] ?>">
                    <?php
                        if (!empty($email_err)) echo $email_err;
                    ?>
                </div>
                <div class="mb-2 lg:mb-4  lg:w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Số điện thoại <span class="checkPhone-re text-red-600"></span></label>
                    <input type="text" class="phone-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="phone"  value="<?= $newuser['sdt'] ?>">
                    <?php
                        if (!empty($phone_err)) echo $phone_err;
                    ?>
                </div>
            </div>

            <div class="mb-2 lg:mb-4  ">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Hình ảnh</label>
                <input type="file" name="upload" id="imgUpload" accept="image/*">
            </div>
            <div class="img-product w-1/5">
                <img style="display: block;" src="../../uploaded/user/<?= $newuser['hinh'] ?>" alt="" id="imgSrc">
            </div>
            <input type="hidden" name="hinh_cu" value="<?= $newuser['hinh'] ?>">
            <input type="hidden" name="ma_kh" value="<?= $newuser['ma_kh'] ?>">
            <input name="cap_nhat" type="submit" value="Cập nhật" class=" cursor-pointer mt-4 rounded text-center px-3 py-2  m-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:bg-blue-600 text-white">

        </form>
    </div>
</section>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgSrc').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgUpload").change(function() {
        readURL(this);
    });


    $.validator.addMethod('yourRule_ten_kh', function(value, element, param) {
        value = removeAscent(value)
        if ((/^([a-zA-Z ]){3,20}$/).test(value)) {
            return true
        }
        return false;
    }, '<div class="text-red-500">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div> ');

    $(function() {
        $("#cap_nhat_tk").validate({
            rules: {
                name: {
                    yourRule_ten_kh: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                upload: {
                    required: false,
                    accept: "jpg,png,gif,jpeg,pjpeg,avif,jfif",
                }
            },
            messages: {

                email: {
                    required: '<div class="text-red-500">Không để trống email</div>',
                    email: '<div class="text-red-500">Phải đúng định dạng email</div>'
                },
                phone: {
                    required: '<div class="text-red-500">Không để trống số điện thoại</div>',
                    digits: '<div class="text-red-500">Phải là số</div>',
                    minlength: '<div class="text-red-500">Phải 10 kí tự</div>',
                    maxlength: '<div class="text-red-500">Phải 10 kí tự</div>',
                },
                upload: {
                    accept: '<div class="text-red-500">Không đúng định dạng file </div>',
                }
            }
        });
    });
</script>