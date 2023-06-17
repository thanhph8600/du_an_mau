<?php
include '../../Dao/PDO.php';

$user = false;
if (!empty($_COOKIE['user'])) {
    $sql = "SELECT * from `khach_hang` where `email` = '" . $_COOKIE['user'] . "'";
    $user = pdo_query_one($sql);
}

$sql = "SELECT * from `loai`";
$category = pdo_query($sql);
// setcookie('user','', time() - (86400 * 30), "/");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../controller/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/assets/owl.theme.green.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
</head>

<body>
    <header>
        <nav class=" bg-white">
            <div class="container m-auto  py-3 ">
                <div class="flex justify-between items-center">
                    <div class="logo">
                        <a class=" text-blue-700 italic text-5xl font-bold text-center" href="../pages/home.php">X-shop</a>
                    </div>
                    <form action="" class="flex items-center bg-white border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:ring-1 sm:text-sm">
                        <input class="placeholder:italic placeholder:text-slate-400 w-56 block focus:outline-none focus:border-sky-500 focus:ring-sky-500 " placeholder="tìm kiếm" type="text" name="search" />
                        <button><i class="fa fa-search text-slate-400" aria-hidden="true"></i></button>
                    </form>
                    <div class="flex items-center relative">
                        <a href="" class=" bg-blue-500 text-white py-2 px-4 mr-2 rounded-md hover:bg-blue-700  "><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a>
                        <a href="" class=" bg-blue-500 text-white py-2 px-4  mr-2 rounded-md hover:bg-blue-700 "><i class="fa fa-truck" aria-hidden="true"></i> Đơn hàng</a>
                        <p class="  op-popup show cursor-pointer bg-blue-500 text-white py-2 px-4  mr-2 rounded-md hover:bg-blue-700 "><i class="fa fa-user-circle-o pr-3 " aria-hidden="true"></i><?= (empty($user)) ? 'Đăng nhập' : $user['ho_ten'] ?> </p>
                        <?php
                        if (!empty($user)) {
                            echo '
                                <div style=" display:none" class="panel text-center absolute top-full mt-3 p-4 rounded-xl shadow-xl right-0  z-40 bg-white border flex flex-col gap-3">
                                ';

                            if ($user['vai_tro'] == 1) {
                                echo '
                                    <a href="../../admin/index.php" target="_blank" class=" py-2 px-3 hover:bg-zinc-400 hover:text-white border rounded-xl"><i class="fa fa-cogs" aria-hidden="true"></i> Quản lý trang web</a>
                                    ';
                            }
                            echo '
                                    <a href="../pages/user.php" class=" py-2 px-3 hover:bg-zinc-400 hover:text-white border rounded-xl"><i class="fa fa-wrench" aria-hidden="true"></i> Quản lý tài khoản</a>
                                    <p class=" cursor-pointer dangXuat py-2 px-3 bg-zinc-300 hover:bg-zinc-400 hover:text-white border rounded-xl">Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i></p>
                                </div>
                                ';
                        }
                        ?>


                    </div>
                </div>
                <div style="display: none;" class="nenpopup fixed w-full h-full top-0 left-0 z-10"></div>
                <div class="flex gap-10 pt-4 justify-center">
                    <?php
                    foreach ($category as $key => $value) {
                        echo '<a href="../pages/product.php?id=' . $value['ma_loai'] . '">' . $value['ten_loai'] . '</a>';
                    }
                    ?>

                </div>
            </div>
        </nav>
    </header>

    <?php
    if (empty($user)) {
    ?>
        <section class="popup" style="display: none;">
            <div class="close-popup fixed w-full h-full bg-slate-900 opacity-60 top-0 left-0 z-20">

            </div>
            <div class="popup fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  z-30 w-1/3">
                <i class="fa fa-close absolute top-2 right-2 cursor-pointer close-popup "></i>
                <div class="login">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                        <h2 class=" font-bold text-2xl text-center pb-2">Đăng nhập</h2>

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                                Email <span class="checkEmail text-red-600"></span>
                            </label>
                            <input class="email shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Email">
                        </div>
                        <div class="mb-6">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                                Password
                            </label>
                            <input class="pass shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">
                            <p class="check-login text-red-700 text-xs italic"></p>
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="dangNhap bg-blue-600 hover:bg-blue-dark font-bold py-2 px-4 rounded text-white hover:bg-blue-700" type="button">
                                Đăng nhập
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                                Forgot Password?
                            </a>
                        </div>
                        <div class="pt-4">
                            <p>Bạn chưa có tài khoản <span class=" text-blue-700 cursor-pointer op-dangky"> Đăng ký</span></p>
                        </div>
                    </div>
                </div>
                <div class="signup bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col" style="display:none">
                    <form action="" class="signup">
                        <h2 class=" font-bold text-2xl text-center pb-2">Đăng kí</h2>

                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="">Tên <span class="checkName-re text-red-600"></span></label>
                            <input type="text" class="name-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập tên">
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="">Email <span class="checkEmail-re text-red-600"></span></label>
                            <input type="text" class="email-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập email">
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="">Số điện thoại <span class="checkPhone-re text-red-600"></span></label>
                            <input type="text" class="phone-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="">Mật khẩu <span class="checkPass-re text-red-600"></span></label>
                            <input type="password" class="pass-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="mb-4">
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="">Nhập lại mật khẩu <span class="checkRepass-re text-red-600"></span></label>
                            <input type="password" class="repass-re shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" placeholder="Nhập lại mật khẩu">
                        </div>
                        <p class=" cursor-pointer dangky rounded-xl text-center px-3 py-2 w-2/3 m-auto bg-blue-700 hover:bg-blue-600 text-white">Đăng Ký</p>
                        <p>Bạn đã tài khoản <span class="op-dangnhap cursor-pointer text-blue-600">Đăng nhập</span></p>

                    </form>
                </div>
            </div>
        </section>
    <?php
    }
    ?>




    <script>
        $('.show').click(function() {
            $(".panel").slideDown("slow");
            $('.panel').css('z-index', '30');
            $('.nenpopup').css('display', 'block')
            $(".nenpopup").click(function() {
                $('.nenpopup').css('display', 'none')
                $(".panel").slideUp("slow");
                $('.panel').css('z-index', '0');
            })
        })
        $('.close-popup').click(function() {
            $('.popup').css('display', 'none')
            $(this).css('display', 'none')
        })
        $('.op-popup').click(function() {
            $('.popup').css('display', 'block')
            $('.close-popup').css('display', 'block')
        })
        $('.op-dangky').click(function() {
            $('.login').css('display', 'none')
            $('.signup').css('display', 'block')
        })
        $('.op-dangnhap').click(function() {
            $('.login').css('display', 'block')
            $('.signup').css('display', 'none')
        })

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

            if (check == 1) {
                $.ajax({
                    url: "../../Public/login.php",
                    type: "post",
                    data: {
                        name: 'dangky',
                        ten: $('.name-re').val(),
                        email: $('.email-re').val(),
                        sdt: $('.phone-re').val(),
                        pass: $('.pass-re').val(),
                    },
                    success: function(result) {
                        if (result == 'ok') {
                            $('.name-re').val('')
                            $('.email-re').val('')
                            $('.phone-re').val('')
                            $('.pass-re').val('')
                            alert('Đăng kí thành công')
                            setTimeout(() => {
                                // $(location).attr("href", './home.php');
                                // $(location).attr("href", pageURL);
                                window.location.reload(true)


                            }, 0);

                        } else {
                            $('.checkEmail-re').html(result)
                        }
                        // $(location).attr("href", pageURL);

                    }
                });
            }
        })

        $('.dangNhap').click(function() {
            var regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
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
                    url: "../../Public/login.php",
                    type: "post",
                    data: {
                        name: 'dangnhap',
                        email: $('.email').val(),
                        pass: $('.pass').val(),
                    },
                    success: function(result) {
                        if (result == 'ok') {
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

        $('.dangXuat').click(function() {
            $.ajax({
                url: "../../Public/login.php",
                type: "post",
                data: {
                    name: 'dangXuat',
                },
                success: function(result) {
                    window.location.reload(true)
                }
            });
        })
    </script>