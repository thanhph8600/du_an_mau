<?php
require_once "../../global.php";
require_once "../../Dao/PDO.php";

extract($_REQUEST);
if(exist_parma('liet_ke',extract($_REQUEST))){

}else {
    $VIEW_NAME = 'home.php';
}

require "../layout.php";
