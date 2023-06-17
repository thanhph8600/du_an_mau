<section class="bg-gray-100 pt-4">
    <div class="container m-auto min-h-screen gio-hang-trong ">
        <form action="index.php?don_hang" method="post" id="form_check_out">
            <div class="  flex py-6 gap-4">
                <div class="w-3/5 bg-white border rounded-xl p-4">
                    <h2 class=" text-2xl font-semibold pb-4">Thông tin mua hàng</h2>
                    <form action="" method="post">
                        <div class=" flex gap-4">
                            <div class="mb-4  w-1/2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="">Họ và tên <span class="checkName-re text-red-600"></span></label>
                                <input name="name" type="text" class="name shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="<?= (!empty($user)) ? $user['ho_ten'] : '' ?>">
                            </div>
                            <div class="mb-4  w-1/2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="">Email <span class="checkEmail-re text-red-600"></span></label>
                                <input name="email" type="text" class=" email shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="<?= (!empty($user)) ? $user['email'] : '' ?>">
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class=" mb-4  w-1/2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="">Số điện thoại <span class="checkPhone-re text-red-600"></span></label>
                                <input name="phone" type="text" class="phone shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" value="<?= (!empty($user)) ? $user['sdt'] : '' ?>">
                            </div>
                            <div class="mb-4  w-1/2">
                                <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tỉnh/ Thành phố</label>
                                <select name="tinh" id="default" class="tinh bg-white border shadow border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">-- Chọn tỉnh/thành phố --</option>
                                    <?php
                                    foreach ($tinh as $key => $value) {
                                        echo '<option value="' . $value['id'] . '">' . $value['_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class=" flex gap-4">
                            <div class="mb-4  w-1/2 show_quan_huyen">
                                <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quận/ Huyện</label>
                                <select name="quan" disabled id="countries_disabled" class=" quan_huyen bg-white border shadow border-gray-300 text-gray-900  text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="">--Chọn Quận/ Huyện --</option>

                                </select>
                            </div>
                            <div class="mb-4  w-1/2 show-phuong_xa">
                                <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phường/ Xã</label>
                                <select name="xa" disabled class=" bg-white border shadow border-gray-300 text-gray-900  text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>--Chọn Phường/Xã --</option>

                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="mb-4   w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="">Địa chỉ <span class="checkPhone-re text-red-600"></span></label>
                                <input name="address" type="text" class="address shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker">
                            </div>

                        </div>

                </div>
                <div class="w-2/5 bg-white  border rounded-xl p-4">
                    <h2 class=" text-xl font-semibold pb-3  border-b-gray-400">Đơn hàng <span class=" text-lg">( <span class="so-luong"></span> sản phẩm)</span></h2>
                    <div class="san-pham">

                    </div>
                    <div class="  border-t-gray-400 py-2">
                        <div class="mb-2 flex justify-between">
                            <p class="text-gray-700">Tạm tính</p>
                            <p class="tong-tien text-gray-700"></p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-700">Shipping</p>
                            <p class="text-gray-700">0</p>
                        </div>
                        <hr class="my-4" />
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">Tổng</p>
                            <div class="">
                                <p class="tong-tien mb-1 text-lg font-bold"></p>
                            </div>
                        </div>

                    </div>
                    <div class="  flex justify-between items-center py-4">
                        <a href="../gio_hang/index.php?gio_hang" class=" text-blue-500 hover:text-blue-600"><i class="fa fa-chevron-left" aria-hidden="true"></i> Giỏ hàng</a>
                        <input type="hidden" class="ma_kh" name="ma_kh" value="<?= (!empty($_SESSION['user']['ma_kh'])) ? $_SESSION['user']['ma_kh'] : '' ?>">
                        <input type="submit" name="thanh-toan" value="Thanh toán" class="thanh-toan ml-auto text-lg block cursor-pointer rounded-xl text-center  w-2/6 bg-blue-700 hover:bg-blue-600 py-2 text-white">
                    </div>

                </div>
            </div>
            <div class="showw"></div>
        </form>
    </div>
</section>

<script>
    renderCheckOut()
    $('.tinh').change(function() {
        $(".loading").css('display', 'block')
        $.ajax({
            url: "../gio_hang/quan_huyen.php",
            type: "post",
            data: {
                quan_huyen: 'quan_huyen',
                ma_tinh: $('.tinh option:selected').val()
            },
            success: function(result) {
                $('.show_quan_huyen').html(result)
                $(".loading").css('display', 'none')

            }
        });
    })

    $(document).on('change', '.quan_huyen', function() {
        $(".loading").css('display', 'block')
        $.ajax({
            url: "../gio_hang/phuong_xa.php",
            type: "post",
            data: {
                phuong_xa: 'phuong_xa',
                ma_phuong_xa: $('.quan_huyen option:selected').val()
            },
            success: function(result) {
                $('.show-phuong_xa').html(result)
                $(".loading").css('display', 'none')
            }
        });
    })


    $.validator.addMethod('yourRule_select', function(value, element, param) {
        if (value.length != 0) {
            return true
        }
        return false;
    }, );

    $(function() {

        $("#form_check_out").validate({
            submitHandler: function(form) {
                $(".loading").css('display', 'block')
                $.ajax({
                    url: '../gio_hang/hoang_thanh.php',
                    data: {
                        don_hang: 'don_hang',
                        thanh_toan: 'thanh_toan',
                        ma_kh: $('.ma_kh').val(),
                        name: $('.name').val(),
                        email: $('.email').val(),
                        phone: $('.phone').val(),
                        tong_tien: $('.tong_tien').val(),
                        tinh: $('.tinh option:selected').val(),
                        quan: $('.quan_huyen option:selected').val(),
                        xa: $('.phuong_xa option:selected').val(),
                        address: $('.address').val(),
                        favorites: JSON.parse(localStorage.getItem('favorites'))
                    }

                }).done(function(data) {
                    $.ajax({
                        url: "../tai_khoan/sendemail.php?gui_email_don_hang",
                        type: "POST",
                        data: {
                            name: $('.name').val(),
                            email: $('.email').val(),
                            phone: $('.phone').val(),
                            tong_tien: $('.tong_tien').val(),
                            favorites: JSON.parse(localStorage.getItem('favorites')),
                            ma_order: data
                        }
                    }).done(function(datass) {
                        $(".loading").css('display', 'none')
                        localStorage.setItem('favorites', JSON.stringify([]));
                        // deleteShopCart();
                        // $(location).attr("href", '../gio_hang/chi_tiet_don_hang.php?ma_order=' + data)
                        window.location.href = '../gio_hang/chi_tiet_don_hang.php?ma_order=' + data + '&thanh_cong';
                    })


                })
            },
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    maxlength: 10,
                    minlength: 10,
                },
                tinh: {
                    yourRule_select: true
                },
                quan: {
                    yourRule_select: true
                },
                xa: {
                    yourRule_select: true
                },
                address: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: '<div class=" text-red-400">Không để trống tên</div>',
                },
                email: {
                    required: '<div class=" text-red-400">Không để trống email</div>',
                    email: '<div class=" text-red-400">Email không đúng định dạng</div>',
                },
                phone: {
                    required: '<div class=" text-red-400">Không để trống số điện thoại</div>',
                    maxlength: '<div class=" text-red-400">Nhập đúng số điện thoại</div>',
                    minlength: '<div class=" text-red-400">Nhập đúng số điện thoại</div>',
                },
                tinh: {
                    yourRule_select: '<div class=" text-red-400">Bạn chưa chọn tỉnh</div>',
                },
                quan: {
                    yourRule_select: '<div class=" text-red-400">Bạn chưa chọn huyện</div>',
                },
                xa: {
                    yourRule_select: '<div class=" text-red-400">Bạn chưa chọn xã</div>',
                },
                address: {
                    required: '<div class=" text-red-400">Không để trống địa chỉ</div>',
                }
            }

        });
    });
</script>