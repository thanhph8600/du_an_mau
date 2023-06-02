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

function exist_parma($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}

function save_file($fieldname, $target_dir)
{
    $file_upload = $_FILES[$fieldname];
    $file_name = basename($file_upload['name']);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_upload['tmp_name'], $target_path);
    return $file_name;
}

function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), '/');
}

function delete_cookie($name)
{
    setcookie($name, '', time() - (3600), '/');
}


function slugify($str)
{
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    return $str;
}

function regex_name()
{
    return '/^([a-zA-Z ]){3,20}$/';
}
function regex_phone()
{
    return '/^[0]([0-9]){9}$/';
}

function checkDateFormat($date)
{
    if (preg_match("/[0-31]{2}\/[0-12]{2}\/[0-9]{4}/", $date)) {
        if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
            return true;
        else
            return false;
    } else {
        return false;
    }
}
?>

