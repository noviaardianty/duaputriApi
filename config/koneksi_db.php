<?php
    define('HOST','localhost');
    define('USER','root');
    define('DB','dua_putri');
    //password disesuaikan dengan akses ke database masing-masing
    define('PASS','');
    $conn = new mysqli(HOST,USER,PASS,DB) or die ('Koneksi error untuk mengakses database');
?>