<style>
    .input_Addproduct {
        background-color: #04AA6D;
        border: none;
        border-radius: 5px;
        color: white;
        padding: 5px 15px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }

    .edit {
        color: #EACD11;
    }

    .delete {
        color: #FF0000;
    }

    .text-xs {
        border-radius: 8px;
        border: none;
        font-weight: bold;
        /* font-size: 14px !important; */
        background: none;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type=text],
    .input,
    input[type=datetime],
    input[type=date],

    select {
        outline: none;
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100px;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .pst-re {
        position: relative;
    }

    .pst-ab {
        position: absolute;
        top: 50%;
        right: 10%;
        transform: translate(100%, -50%);
        color: #fff;
        font-size: 25px;
    }

    a {
        color: #fff;
        text-decoration: none;
        transition: all .2s ease-in-out;
    }

    .pst-ab a:hover {
        color: #4CAF50;
        font-size: 30px;

    }

    .img-product {
        width: 300px;
        padding: 15px 0;
    }

    .img-product img {
        width: 100%;
        display: none;
    }

    input[type=file] {
        border: none;
        background: none;
    }
</style>


<div class="container-fluid py-4">
    <div class="ket-qua ">
        <?php
        if (!empty($MESS)) echo $MESS;
        ?>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Sửa sản phẩm</h6>
                    </div>
                    <div class="pst-ab">
                        <a href="./index.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form action="./index.php?btn_update" enctype="multipart/form-data" method="post" style="display:flex;width:95%;margin:auto">
                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="">Tên hàng hóa</label>
                                    <input name="name" type="text" id="nameproduct" value="<?= $item['ten_hh'] ?>" onkeydown="checkproduct()" onkeypress="checkproduct()" onkeyup="checkproduct()">
                                    <?php
                                    if (!empty($name_err)) echo $name_err;
                                    ?>
                                </div>
                                <div class="col-6">
                                    <label for="">Đơn giá</label>
                                    <input name="price" type="text" id="priceproduct" value="<?= $item['don_gia'] ?>">
                                    <?php
                                    if (!empty($price_err)) echo $price_err;
                                    ?>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-6">
                                    <label for="">Mức giảm giá</label>
                                    <input name="sale" type="text" id="saleproduct" value="<?= $item['giam_gia'] ?>">
                                    <?php
                                    if (!empty($sale_err)) echo $sale_err;
                                    ?>
                                </div>
                                <div class="col-6">
                                    <label for="">Loại sản phẩm</label>
                                    <select name="category" id="category" require>
                                        <?php
                                        echo $item['ma_loai'];
                                        foreach ($category as $value) {
                                            if ($value['ma_loai'] == $item['ma_loai']) {
                                                echo '<option selected value="' . $value['ma_loai'] . '">' . $value['ten_loai'] . '</option>';
                                            } else {
                                                echo '<option value="' . $value['ma_loai'] . '">' . $value['ten_loai'] . '</option>';
                                            }
                                        }
                                        ?>
                                                                            <?php
                                    if (!empty($category_err)) echo $category_err;
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-4 ">
                                    <label for="">Trạng thái</label>
                                    <div class="input d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dacbiet" id="flexRadioDefault1" <?= ($item['dac_biet'] == 1) ? 'checked' : '' ?> value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Đặc biệt
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dacbiet" id="flexRadioDefault2" <?= ($item['dac_biet'] == 0) ? 'checked' : '' ?> value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Không đặc biệt
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="">Ngày nhập</label>
                                    <input name="date" type="date" id="" value="<?= $item['ngay_nhap'] ?>">
                                    <?php
                                    if (!empty($date_err)) echo $date_err;
                                    ?>
                                </div>
                                <div class="col-4">
                                    <label for="">Lượt xem</label>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled>
                                        <label for="floatingInputDisabled"><?= $item['so_luot_xem'] ?></label>
                                    </div>
                                </div>
                            </div>
                            <label for="">Mô tả</label>
                            <textarea name="content" id="" cols="30" rows="10" value="<?= $item['mo_ta'] ?>"></textarea>

                            <label for="">Hình ảnh</label>
                            <input type="file" name="upload" id="file-input" accept="image/*">
                            <?php
                            if (!empty($file_err)) echo $file_err;
                            ?>
                            <input type="hidden" name="hinh_cu" value="<?= $item['hinh'] ?>">
                            <input type="hidden" name="id_hh" value="<?= $item['ma_hh'] ?>">
                            <div class="img-product">
                                <img style="display: block;" src="../../uploaded/product/<?= $item['hinh'] ?>" alt="" id="img-preview">
                            </div>
                            <input name="edit" type="submit" value="Sửa">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        CKEDITOR.replace('content');
    </script>

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


    $.validator.addMethod('yourRule_ten_kh', function(value, element, param) {
        value = removeAscent(value)
        if ((/^([a-zA-Z0-9./- ]){3,100}$/).test(value)) {
            return true
        }
        return false;
    }, '<div class="text-danger">Bạn phải nhập từ 3 đến 30 kí tự, không có kí tự đặt biệt</div> ');

    $.validator.addMethod('yourRule_date', function(value, element, param) {
        return kiem_tra_ngay()
    }, '<div class="text-danger">Bạn không được nhập ngày tương lai</div> ');


    $(function() {
        $("form").validate({
            rules: {
                name: {
                    yourRule_ten_kh: true
                },
                price: {
                    required: true,
                    digits: true
                },
                sale: {
                    range:[0,1],
                },
                category: {
                    required: true,
                },
                date: {
                    required: true,
                    date:true,
                    yourRule_date: true

                },
                upload: {
                    required:false,
                    accept: "jpg,png,gif,jpeg,pjpeg,avif,jfif",
                }
            },
            messages: {

                price: {
                    required:  '<div class="text-danger">Không để trống giá tiền</div>',
                    digits: '<div class="text-danger">phải là số dương</div>',
                },
                sale: {
                    range:'<div class="text-danger">Từ 0 đến 1</div>',
                },
                category: {
                    required: '<div class="text-danger">Không để trống loại hàng</div>',
                },
                date: {
                    required: '<div class="text-danger">Không để trống ngày nhập</div>',
                    date:'<div class="text-danger">Phải đúng định dạng (ngày/tháng/năm)</div>',
                },
                upload: {
                    required: '<div class="text-danger">Chưa chọn ảnh</div>',
                    accept: '<div class="text-danger">Phải đúng định dạng ảnh/div>',
                }
            }

        });
    });

    function kiem_tra_ngay() {
        let ngay_nhap = $('.date').val().split('-')
        let d = new Date();
        if (ngay_nhap.length < 2) {
            console.log('Bạn chưa điền phần này')
            return false
        } else {
            if (ngay_nhap[0] > d.getFullYear()) {
                console.log('Bạn không được nhập ngày tương lai')
                return false
            } else {
                if (ngay_nhap[1] > (d.getMonth() + 1)) {
                    console.log('Bạn không được nhập ngày tương lais')
                    return false
                } else {
                    if (ngay_nhap[2] > d.getDate()) {
                        console.log('Bạn không được nhập ngày tương lai ss')
                        return false
                    }
                }
            }
        }
        return true;
    }

    const input = document.getElementById('file-input');
    const image = document.getElementById('img-preview');



    input.addEventListener('change', (e) => {
        if (e.target.files.length) {

            if (window.File && window.FileReader && window.FileList && window.Blob) {
                // lay dung luong va kieu file tu the input file
                var fsize = e.target.files[0].size;
                var ftype = e.target.files[0].type;
                var fname = e.target.files[0].name;


                if (fsize > 1048576) //thuc hien dieu gi do neu dung luong file vuot qua 1MB
                {

                    alert(fsize + " bites\nToo big!");
                } else {
                    switch (ftype) {
                        case 'image/png':
                        case 'image/gif':
                        case 'image/jpeg':
                        case 'image/jpg':
                        case 'image/pjpeg':
                            break;
                        default:
                    }

                    image.style.display = 'block'
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            }

        }
    });

    $('.product').addClass('active')
    $('.product').addClass('bg-gradient-primary')
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../public/admin/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>