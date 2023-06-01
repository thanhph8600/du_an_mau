<?php
$user = false;
if (!empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
}


$sql = "SELECT * from `loai`";
$category = query($sql);

?>
<header>
    <nav class=" bg-white border-b-2">
        <div class="container m-auto  pt-3 ">
            <div class="flex justify-between items-center">
                <div class="logo">
                    <a class=" text-blue-700 italic text-5xl font-bold text-center" href="../trang_chinh/">X-shop</a>
                </div>
                <form action="../hang_hoa/liet_ke.php?keyword" class=" relative flex items-center bg-white border border-slate-300 rounded-md py-2 pl-3 pr-3 shadow-sm focus:outline-none focus:ring-1 sm:text-sm">
                    <input class="seach placeholder:italic placeholder:text-slate-400 w-56 block focus:outline-none focus:border-sky-500 focus:ring-sky-500 " placeholder="tìm kiếm" type="text" name="keyword" />
                    <button><i class="fa fa-search text-slate-400" aria-hidden="true"></i></button>
                    <div class="show-seach absolute top-10 z-20 w-full left-0">

                    </div>
                </form>
                <div class="flex items-center relative">
                    <a href="" class=" bg-blue-500 text-white py-2 px-4 mr-2 rounded-md hover:bg-blue-700  "><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a>
                    <a href="" class=" bg-blue-500 text-white py-2 px-4  mr-2 rounded-md hover:bg-blue-700 "><i class="fa fa-truck" aria-hidden="true"></i> Đơn hàng</a>
                    <p class="<?= (empty($user)) ? 'op-dangnhap' : 'show' ?> cursor-pointer bg-blue-500 text-white py-2 px-4  mr-2 rounded-md hover:bg-blue-700 "><i class="fa fa-user-circle-o pr-3 " aria-hidden="true"></i><?= (empty($user)) ? 'Đăng nhập' : $user['ho_ten'] ?> </p>


                    <div style=" display:none" class="panel text-center absolute top-full mt-3 p-4 rounded-xl shadow-xl right-0  z-40 bg-white border flex flex-col gap-3">

                        <?php
                        if ($user['vai_tro'] == 0) {
                        ?>
                            <a href="../../admin/index.php" target="_blank" class=" py-2 px-3 hover:bg-zinc-400 hover:text-white border rounded-xl"><i class="fa fa-cogs" aria-hidden="true"></i> Quản lý trang web</a>
                        <?php
                        }
                        ?>

                        <a href="../tai_khoan/cap_nhat_tk.php" class=" py-2 px-3 hover:bg-zinc-400 hover:text-white border rounded-xl"><i class="fa fa-wrench" aria-hidden="true"></i> Quản lý tài khoản</a>
                        <p class="doi-mat-khau cursor-pointer py-2 px-3 hover:bg-zinc-400 hover:text-white border rounded-xl"><i class="fa fa-key" aria-hidden="true"></i> Đổi mật khẩu</p>
                        <a href="../tai_khoan/index.php?dang_xuat" class=" cursor-pointer dangXuat py-2 px-3 bg-zinc-300 hover:bg-zinc-400 hover:text-white border rounded-xl">Đăng xuất <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                    </div>
                    <div style="display: none;" class="nenpopup fixed w-full h-full top-0 left-0 z-10"></div>


                </div>
            </div>

        </div>
        <div class="flex w-4/5 pt-4 m-auto ">
            <div class=" relative">
                <h2 class=" font-bold text-xl py-2 w-60 text-center rounded-t-md cursor-pointer bg-blue-400 text-white show-cate">Danh mục sản phẩm <i class="fa fa-caret-down" aria-hidden="true"></i>
                </h2>
                <div style="display:none" class="cate absolute flex flex-col z-10 w-60 bg-white justify-center border">
                    <?php
                    foreach ($category as $key => $value) {
                        echo '<a class="py-2 px-4 border-b hover:bg-blue-400 hover:text-white" href="../hang_hoa/liet_ke.php?ma_loai=' . $value['ma_loai'] . '">' . $value['ten_loai'] . '</a>';
                    }
                    ?>

                </div>
            </div>
        </div>

        </div>
    </nav>
</header>
<section class="popup" style="display:none">
    <div class="close-popup fixed w-full h-full bg-slate-900 opacity-60 top-0 left-0 z-20">

    </div>
    <div class=" popup fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2  z-30 w-2/4">
        <i class="fa fa-close absolute top-2 right-2 cursor-pointer close-popup "></i>
        <div class="form">

        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $(".show-cate").click(function() {
            $(".cate").slideToggle("slow");
        });
    });
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
        $('.nenpopup').css('display', 'none')
    })


    $(document).on('click', '.op-dangnhap', function() {
        $('.popup').css('display', 'block')
        $.ajax({
            url: "../tai_khoan/index.php",
            type: "post",
            data: {
                btn_dang_nhap: 'btn_dang_nhap',
            },
            success: function(result) {
                $('.form').html(result)
            }
        });
    })
    $(document).on('click', '.op-dangky', function() {
        $.ajax({
            url: "../tai_khoan/index.php",
            type: "post",
            data: {
                btn_dang_ky: 'btn_dang_ky',
            },
            success: function(result) {
                $('.form').html(result)
            }
        });
    })

    $(document).on('click', ' .doi-mat-khau', function() {
        $('.popup').css('display', 'block')
        $('.close-popup').css('display', 'block')
        $.ajax({
            url: "../tai_khoan/index.php?btn_doi_mat_khau",
            type: "post",
            data: {
                doi_mat_khau: 'doi_mat_khau',
            },
            success: function(result) {
                $('.form').html(result)
                $(".panel").slideUp("slow");
            }
        });
    })

    $('.dangXuat').click(function() {
        $.ajax({
            url: "../tai_khoan/index.php",
            type: "post",
            data: {
                dang_xuat: 'dang_xuat',
            },
            success: function(result) {
                window.location.reload(true)
            }
        });
    })

    $(document).on('input keyup  paste' , '.seach',function() {
        $.ajax({
            url: "../hang_hoa/show_seach.php?seach_keyword",
            type: "post",
            data: {
                seach_keyword : 'seach_keyword',
                keyword: $('.seach').val(),
            },
            success: function(result) {
                $('.show-seach').html(result)
            }
        });

    })
</script>