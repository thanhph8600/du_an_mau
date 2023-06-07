<?php
require_once "../../global.php";
require_once "../../Dao/hang_hoa.php";
require_once "../../Dao/don_hang.php";
?>
<style>
    .oder-item {
        background-color: #eee;
        box-shadow: 0 0 3px .1px black;
        border-radius: 7px;
        padding: 10px 0;
    }

    .name-sp {
        width: 60%;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow-y: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 1;

    }

    .total-p {
        padding: 5px 0;
    }

    .btn-xacnhan {
        background-color: #ddd;
    }

    .btn-xacnhan:hover {
        background: green;
        color: #fff;
    }

    .btn-xacnhanhuy {
        background-color: #ddd;
    }

    .btn-xacnhanhuy:hover {
        background: black;
        color: #fff;
    }
</style>


<?php
if (!empty($MESS)) echo $MESS;
?>
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Đơn hàng</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group ">
                        <?php
                        echo '
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm"><span class="">Mã đơn hàng: </span>' . $order['ma_order'] . '</h6>
                                    <span class="mb-2 ">Tên khách hàng: <span class="text-dark font-weight-bold ms-sm-2">' . $order['ten_kh'] . '</span></span>
                                    <span class="mb-2 ">Số điện thoại: <span class="text-dark font-weight-bold ms-sm-2">' . $order['sdt'] . '</span></span>
                                    <span class="mb-2 ">Địa chỉ email: <span class="text-dark ms-sm-2 font-weight-bold">' . $order['email'] . '</span></span>
                                    <span class="mb-2 ">Địa chỉ: <span class="text-dark ms-sm-2 font-weight-bold">' . $order['address'] . '</span></span>
                                    <span class="mb-2 ">Ngày tạo đơn hàng: <span class="text-dark ms-sm-2 font-weight-bold">' . $order['ngay_mua'] . '</span></span>
                                    <span class="">Tổng số tiền: <span class="text-dark ms-sm-2 font-weight-bold">' . currency_format($order['tong_tien']) . ' đ</span></span>

                                </div>
                                </li>
                                ';
                        ?>



                    </ul>
                </div>
            </div>

            <div style="margin-top: 20px;" class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Sản phẩm

                    </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <?php
                        foreach ($order_detail as $item) {
                            $product = hang_hoa_select_by_id($item['id_hang_hoa']);
                            echo '
                                <div class=" d-flex justify-content-between align-items-center">
                                <p class="name-sp">' . $product['ten_hh'] . '</p>
                                <p>x ' . $item['so_luong'] . '</p>
                                    <p class="">
                                        ' . currency_format($item['so_luong'] * ($product['don_gia'] - $product['don_gia'] * $product['giam_gia'])) . '
                                    </p>
                                </div>
                                ';
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Tình trạng đơn hàng</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                            <i class="material-icons me-2 text-lg">date_range</i>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Xác nhận đơn hàng</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">

                                <form action="index.php?xac_nhan" method="post">
                                    <input type="hidden" name="active" value="2">
                                    <input type="hidden" name="ma_order" value="<?=$order['ma_order']?>">
                                    <input <?=($order['tinh_trang']>1)?'style="background:green;color:white;"':''?> class="btn-xacnhan  btn d-flex align-items-center justify-content-center" name="xacNhan" type="submit" value="xác nhận">
                                </form>
                            </div>
                        </li>
                    </ul>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Xác nhận lấy hàng</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">

                                <form action="index.php?xac_nhan" method="post">
                                    <input type="hidden" name="active" value="3">
                                    <input type="hidden" name="ma_order" value="<?=$order['ma_order']?>">
                                    <input <?=($order['tinh_trang']>2)?'style="background:green;color:white;"':''?> class="btn-xacnhan  btn d-flex align-items-center justify-content-center" name="xacNhan" type="submit" value="Đã lấy hàng">
                                </form>
                            </div>
                        </li>
                    </ul>

                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Đơn hàng đã được gửi</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <form action="index.php?xac_nhan" method="post">
                                    <input type="hidden" name="active" value="3">
                                    <input type="hidden" name="ma_order" value="<?=$order['ma_order']?>">

                                    <input <?=($order['tinh_trang']>=3)?'style="background:green;color:white;"':''?> class="btn-xacnhan btn  d-flex align-items-center justify-content-center" name="xacNhan" type="submit" value="xác nhận đã gửi">
                                </form>
                            </div>
                        </li>
                    </ul>

                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Đơn hàng đã đến tay khách hàng</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <form action="index.php?xac_nhan" method="post">
                                    <input type="hidden" name="active" value="4">
                                    <input type="hidden" name="ma_order" value="<?=$order['ma_order']?>">

                                    <input <?=($order['tinh_trang']>=4)?'style="background:green;color:white;"':''?> class="btn btn-xacnhan d-flex align-items-center justify-content-center" name="xacNhan" type="submit" value="xác nhận đã gửi thành công">
                                </form>
                            </div>
                        </li>
                    </ul>

                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Từ chối đơn hàng</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <form action="index.php?xac_nhan" method="post">
                                <input type="hidden" name="active" value="0">
                                    <input type="hidden" name="ma_order" value="<?=$order['ma_order']?>">

                                    <input <?=($order['tinh_trang']==0)?'style="background:black;color:white;"':''?> class="btn btn-xacnhanhuy d-flex align-items-center justify-content-center" name="xacNhan" type="submit" value="Hủy đơn">
                                </form>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

</div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../../public/admin/assets/js/core/popper.min.js"></script>
<script src="../../public/admin/assets/js/core/bootstrap.min.js"></script>
<script src="../../public/admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../public/admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function deletecategory() {
        var result = confirm('Bạn có chắc chắn không!')
        if (result != true) {
            return false
        }
    }
    $('.order').addClass('active')
    $('.order').addClass('bg-gradient-primary')
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../public/admin/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>