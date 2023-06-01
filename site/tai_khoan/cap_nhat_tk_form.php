<section>
    <div class="container m-auto pt-6 pb-2 min-h-screen">
        <div class="w-4/5 mb-4 m-auto ">
            <?php
            if (!empty($MESS)) {
                echo $MESS;
            } ?>
        </div>

        <form action="../tai_khoan/cap_nhat_tk.php?cap_nhat_tk" class=" w-4/5 m-auto border rounded-md p-4" enctype="multipart/form-data" method="post">
            <h2 class=" text-xl font-bold uppercase pb-2 border-b">Thông tin tài khoản</h2>
            <div class=" flex gap-4 py-2">
                <div class="mb-4 w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Tên đăng nhập <span class="checkMakh-re text-red-600"></span></label>
                    <input type="text" class=" border-none bg-gray-300 focus:border-none active:border-none  ten-dang-nhap shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" readonly value="<?= $user['ma_kh'] ?>">
                </div>
                <div class="mb-4  w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Họ và tên <span class="checkName-re text-red-600"></span></label>
                    <input type="text" class="name-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="name" placeholder="Nhập tên" value="<?= $newuser['ho_ten'] ?>">
                </div>
            </div>
            <div class="flex gap-4">
                <div class="mb-4  w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Email <span class="checkEmail-re text-red-600"></span></label>
                    <input type="text" class="email-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="email" placeholder="Nhập email" value="<?= $newuser['email'] ?>">
                </div>
                <div class="mb-4  w-1/2">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="">Số điện thoại <span class="checkPhone-re text-red-600"></span></label>
                    <input type="text" class="phone-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" name="phone" placeholder="Nhập số điện thoại" value="<?= $newuser['sdt'] ?>">
                </div>
            </div>

            <div class="mb-4  ">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="">Hình ảnh</label>
                <input type="file" name="upload" id="imgUpload" accept="image/*">
            </div>
            <div class="img-product w-1/5">
                <img style="display: block;" src="../../uploaded/user/<?= $newuser['hinh'] ?>" alt="" id="imgSrc">
            </div>
            <input type="hidden" name="hinh_cu" value="<?= $newuser['hinh'] ?>">
            <input type="hidden" name="ma_kh" value="<?= $newuser['ma_kh'] ?>">
            <button class="mt-4 rounded text-center px-3 py-2  m-auto bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:bg-blue-600 text-white">
                Cập nhật
            </button>
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
</script>