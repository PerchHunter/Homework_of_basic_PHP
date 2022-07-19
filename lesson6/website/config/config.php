<?php
    const PHOTO = '../../../public/images/images_big/';
    const PHOTO_SMALL = '../../../public/images/images_small/';

    const GOODS_BIG = "../../public/photoGoods/photoGoods_big/";
    const GOODS_SMALL = '../../public/photoGoods/photoGoods_small/';


    const SERVER = "localhost";
    const DB = "mygallery";
    const LOGIN = "root";
    const PASS = "";

    $message = "";
    $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка подключения к базе данных");


