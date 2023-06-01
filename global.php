<?php
if (!session_start()) {
    session_start();
}
?>
<?php
    $ROOT_URL = "/xshop";
    $CONTENT_URL = "$ROOT_URL/content";
    $ADMIN_URL = "$ROOT_URL/admin";
    $SITE_URL = "$ROOT_URL/site";
    $UPLOAD_PRODUCT_URL = "../../uploaded/product/";
    $UPLOAD_USER_URL = "../../uploaded/user/";

    function exist_parma($fieldname) {
        return array_key_exists($fieldname, $_REQUEST);
    }

    function save_file($fieldname,$target_dir){
        $file_upload = $_FILES[$fieldname];
        $file_name = basename($file_upload['name']);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_upload['tmp_name'], $target_path);
        return $file_name;
    }

    function add_cookie($name, $value, $day) {
        setcookie($name, $value, time() + (86400 * $day), '/');
    }

    function delete_cookie($name){
        setcookie($name, '', time() - (3600), '/');
    }
?>