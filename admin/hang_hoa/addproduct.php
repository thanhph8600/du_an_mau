<?php
require '../../Dao/hangHoa.php';
require '../../Dao/loai.php';

$category = loai_select_all();

$id = 0;

if (isset($_GET['slug']) && $_GET['slug']) {
    $id = $_GET['slug'];
    $id = hang_hoa_select_by_id($id);
}

$checkfile = false;
if (isset($_POST['addproduct']) && $_POST['addproduct']) {
   $name = $_POST['name'];
     $price = $_POST['price'];
     $sale = $_POST['sale'];
     $content = $_POST['content'];
     $categoryID = $_POST['category'];
    $date = date('Y-m-d H:i:s');

    if (!empty($_FILES["upload"]["name"])) {
        
        $nameFile = $_FILES["upload"]["name"];

        //check file
        //file
        $target_dir = "thumb/";
        $target_file = $target_dir . $nameFile;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["upload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["upload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            die;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
                die;
            }
        }
    }

    //ktr xem co phai sua khong
    if (empty($id)) {
        if (!empty($_FILES["upload"]["name"])) {

            // move_uploaded_file($_FILES['upload']["tmp_name"], 'files/' . $_FILES['upload']['name']);
            hang_hoa_insert($name,$price,$sale,$nameFile,$date,$categoryID,$dacbiet,$content);
            header('location: ./product.php');
        } else {
            $checkfile = 'Bạn chưa chọn ảnh';
        }
    } else {
        $id_hh = $id['ma_hh'];
        if (empty($_FILES["upload"]["name"])) {
            $check =1;
            hang_hoa_update($check,$name,$price,$sale,$nameFile,$date,$categoryID,$dacbiet,$content,$id_hh);
        } else {
            $check =2;
            hang_hoa_update($check,$name,$price,$sale,$nameFile,$date,$categoryID,$dacbiet,$content,$id_hh);
        }
        header('location: ./product.php');
    }
}

include '../header.php';
?>



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
    select {
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
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Thêm hàng hóa</h6>
                        </div>
                        <div class="pst-ab">
                            <a href="./product.php"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <form action="" enctype="multipart/form-data" method="post" onsubmit="return checkproduct()" style="display:flex;width:95%;margin:auto">
                                <label for="">Tên hàng hóa</label>
                                <input name="name" type="text" id="nameproduct" value="<?php echo (!empty($id)) ? $id['ten_hh'] : ''; ?>" onkeydown="checkproduct()" onkeypress="checkproduct()" onkeyup="checkproduct()">

                                <label for="">Đơn giá</label>
                                <input name="price" type="text" id="priceproduct" value="<?php echo (!empty($id)) ? $id['don_gia'] : ''; ?>">

                                <label for="">Mức giảm giá</label>
                                <input name="sale" type="text" id="saleproduct" value="<?php echo (!empty($id)) ? $id['giam_gia'] : ''; ?>">

                                <label for="">Loại sản phẩm</label>
                                <select name="category" id="category" require>
                                    <option value="0">- - Loại sản phẩm - -</option>
                                    <?php
                                    foreach ($category as $value) {
                                        echo '<option ' ?><?php if (!empty($id)) echo ($id['ma_loai'] == $value['ma_loai']) ? 'selected' : ''; ?><?php echo ' value="' . $value['ma_loai'] . '">' . $value['ten_loai'] . '</option>';
                                                                                                                                                }
                                                                                                                                                    ?>

                                </select>

                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem] pt-2">
                                    <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="radio" name="dacbiet" id="radioDefault01" value="0" />
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="radioDefault01">
                                        Đặc biệt
                                    </label>
                                </div>
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem] pb-2">
                                    <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="radio" name="dacbiet" id="radioDefault02" checked value="1" />
                                    <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="radioDefault02">
                                        Không đặc biệt
                                    </label>
                                </div>
                                <label for="">Mô tả</label>
                                <textarea name="content" id="" cols="30" rows="10" value=""><?php echo (!empty($id)) ? $id['mo_ta'] : ''; ?></textarea>

                                <label for="">Hình ảnh</label>
                                <input type="file" name="upload" id="file-input" accept="image/*">
                                <div class="img-product">
                                    <img style="display: block;" src="./thumb/<?php echo (!empty($id)) ? $id['hinh'] : ''; ?>" alt="" id="img-preview">
                                </div>

                                <label style="color:red;" for=""><?= $checkfile ?></label>
                                <input name="addproduct" type="submit" value="Add">
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

    function checkproduct() {
        var lf = 0;
        var name = document.getElementById('nameproduct')
        var price = document.getElementById('priceproduct')
        var category = document.getElementById('category')

        if (name.value == '') {
            name.style.border = '1px solid red'
            lf = 1;
        } else {
            name.style.border = '1px solid green'
        }

        var priceRegex = /^\w([0-9.,]{1,13})$/;
        if (!price.value.match(priceRegex)) {
            price.style.border = '1px solid red'
            lf = 1;
        } else {
            price.style.border = '1px solid green'
        }


        if (category.value == 0) {
            category.style.border = '1px solid red'
            lf = 1;
        } else {
            category.style.border = '1px solid green'
        }

        if (!lf == 0) {
            return false
        }
    }
    //preview img


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