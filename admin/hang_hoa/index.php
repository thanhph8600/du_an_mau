<?php
require_once "../../global.php";
require_once "../../Dao/loai.php";  
require_once "../../Dao/hang_hoa.php";
extract($_REQUEST);

if (exist_parma("btn_add")) {

    $category = loai_select_all();
    $VIEW_NAME = "add.php";
}
// thêm
elseif (exist_parma("btn_insert")) {
    extract($_REQUEST);
    // $dacbiet = (empty($dacbiet)) ? 0 : 1 ;
    $hinh = save_file('upload',$UPLOAD_URL);
    hang_hoa_insert($name,$price,$sale,$hinh,$date,$category,$dacbiet,$content);
    $products= hang_hoa_select_all();
    $VIEW_NAME = "list.php";
}
//sửa
elseif(exist_parma("btn_edit")){

    $item = hang_hoa_select_by_id($ma_hh);
    $category = loai_select_all();
    $VIEW_NAME = "edit.php";
}
elseif(exist_parma("btn_update")){
    extract($_REQUEST);
    if(!empty($_FILES["upload"]["name"])){
        // if(unlink($UPLOAD_URL.$hinh_cu));
        $hinh = save_file('upload',$UPLOAD_PRODUCT_URL);
    }else{
        $hinh = $hinh_cu;
    }

    hang_hoa_update($name,$price,$sale,$hinh,$date,$category,$dacbiet,$content,$id_hh);
    $products= hang_hoa_select_all();
    $VIEW_NAME = "list.php";
} 
//xóa
elseif (exist_parma("btn_delete")) {
    extract($_REQUEST);
    hang_hoa_delete($ma_hh);
    $products= hang_hoa_select_all();
    $VIEW_NAME = "list.php";
} else {
    $products= hang_hoa_select_all();
    $VIEW_NAME = "list.php";
}

require '../layout.php';
