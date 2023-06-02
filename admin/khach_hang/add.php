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
    input[type=password],
    select,
    .input {
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
                        <h6 class="text-white text-capitalize ps-3">Thêm khách hàng</h6>
                    </div>
                    <div class="pst-ab">
                        <a href="./index.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <form action="./index.php?btn_insert" enctype="multipart/form-data" method="post" onsubmit="return checkproduct()" style="display:flex;width:95%;margin:auto">
                            <div class="row pb-4  ">
                                <div class="col-6">
                                    <label for="">Mã đăng nhập</label>
                                    <input name="ma_kh" type="text" value="" onkeydown="checkproduct()" onkeypress="checkproduct()" onkeyup="checkproduct()">
                                    <?php
                                    if (!empty($ma_kh_err)) echo $ma_kh_err;
                                    ?>
                                </div>
                                <div class="col-6">
                                    <label for="">Tên khách hàng</label>
                                    <input name="name" type="text" id="nameproduct" value="" onkeydown="checkproduct()" onkeypress="checkproduct()" onkeyup="checkproduct()">
                                    <?php
                                    if (!empty($name_err)) echo $name_err;
                                    ?>
                                </div>
                            </div>
                            <div class="row pb-4  ">
                                <div class="col-6">
                                    <label for="">Email</label>
                                    <input name="email" type="text" id="email" value="">
                                    <?php
                                    if (!empty($email_err)) echo $email_err;
                                    ?>
                                </div>
                                <div class="col-6">
                                    <label for="">Số điện thoại</label>
                                    <input name="phone" type="text" id="phone" value="" onkeydown="checkproduct()" onkeypress="checkproduct()" onkeyup="checkproduct()">
                                    <?php
                                    if (!empty($phone_err)) echo $phone_err;
                                    ?>
                                </div>
                            </div>
                            <div class="row pb-4  ">
                                <div class="col-6">
                                    <label for="">Mật khẩu</label>
                                    <input name="pass" type="password" id="pass" value="">
                                    <?php
                                    if (!empty($pass_err)) echo $pass_err;
                                    ?>
                                </div>
                                <div class="col-6">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input name="repass" type="password" id="repass" value="">
                                    <?php
                                    if (!empty($repass_err)) echo $repass_err;
                                    ?>
                                </div>
                            </div>

                            <div class="col-4 pb-4">
                                <label for="">Vai trò</label>
                                <div class="input d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="vai_tro" id="flexRadioDefault1" value="0">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Nhân viên
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="vai_tro" id="flexRadioDefault2" checked value="1">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Khách hàng
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch pb-4 ">
                                <input class="form-check-input bg-primary" type="checkbox" name="trang_thai" role="switch" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Kích hoạt</label>
                            </div>
                            <label for="">Hình ảnh</label>
                            <input type="file" name="upload" id="file-input" accept="image/*">
                            <div class="img-product">
                                <img style="display: block;" src="./thumb/<?php echo (!empty($id)) ? $id['hinh'] : ''; ?>" alt="" id="img-preview">
                            </div>
                            <label style="color:red;" for=""></label>
                            <input name="addproduct" type="submit" value="Thêm">
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


    const input = document.getElementById('file-input');
    const image = document.getElementById('img-preview');


    $.validator.addMethod('yourRule_ma_kh', function(value, element, param) {
        if ((/^([a-zA-Z0-9]){3,20}$/).test(value)) {
            return true
        }
        return false;
    }, '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt, không có dấu</div>');

    $.validator.addMethod('yourRule_ten_kh', function(value, element, param) {
        value = removeAscent(value)
        if ((/^([a-zA-Z ]){3,20}$/).test(value)) {
            return true
        }
        return false;
    }, '<div class="text-danger">Bạn phải nhập từ 3 đến 20 kí tự, không có kí tự đặt biệt</div> ');

    $(function() {
        $("form").validate({
            rules: {
                ma_kh: {

                    yourRule_ma_kh: true
                },
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
                pass: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                repass: {
                    equalTo: '#pass',
                    minlength: 8,

                },
                upload: {
                    required: false,
                    accept: "jpg,png,gif,jpeg,pjpeg,avif,jfif",
                }
            },
            messages: {

                email: {
                    required: '<div class="text-danger">Không để trống email</div>',
                    email: '<div class="text-danger">Phải đúng định dạng email</div>'
                },
                phone: {
                    required: '<div class="text-danger">Không để trống số điện thoại</div>',
                    digits: '<div class="text-danger">Phải là số</div>',
                    minlength: '<div class="text-danger">Phải 10 kí tự</div>',
                    maxlength: '<div class="text-danger">Phải 10 kí tự</div>',
                },
                pass: {
                    required: '<div class="text-danger">Không để trống mật khẩu</div>',
                    minlength: '<div class="text-danger">Ít nhất 8 kí tự</div>',
                    maxlength: '<div class="text-danger">Ít nhất 32 kí tự</div>'
                },
                repass: {
                    equalTo: '<div class="text-danger">Không giống mật khẩu đã nhập </div>',
                    minlength: '<div class="text-danger">Ít nhất 8 kí tự</div>',
                },
                upload: {
                    accept: '<div class="text-danger">Không đúng định dạng file </div>',
                }
            }

        });
    });




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

    $('.user').addClass('active')
    $('.user').addClass('bg-gradient-primary')
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../public/admin/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>