<?php
    const PHOTO = '../../../public/images/images_big/';
    const PHOTO_SMALL = '../../../public/images/images_small/';
    global $PHOTO;
    global $PHOTO_SMALL;

    const GOODS_BIG = "../../public/photoGoods/photoGoods_big/";
    const GOODS_SMALL = '../../public/photoGoods/photoGoods_small/';
    global $GOODS_BIG;
    global $GOODS_SMALL;

    const SERVER = "localhost";
    const DB = "websitebasicphp";
    const LOGIN = "root";
    const PASS = "";

    $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка подключения к базе данных");


