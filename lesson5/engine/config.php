<?php
    const PHOTO = '../../public/images/';
    const PHOTO_SMALL = '../../public/images_small/';

    const SERVER = "localhost";
    const DB = "mygallery";
    const LOGIN = "root";
    const PASS = "";

    $message = "";
    $connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка подключения к базе данных");


