<?php
    require_once('../config/koneksi_db.php');
    if (isset($_POST['kode_barang']) && isset($_POST['nama_barang']) && isset($_POST['kode_suplier']) && isset($_POST['stok']) && isset($_POST['harga_beli']) && isset($_POST['harga_jual'])){
        // input
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $kode_suplier = $_POST['kode_suplier'];
            $stok = $_POST['stok'];
            $harga_beli = $_POST['harga_beli'];
            $harga_jual = $_POST['harga_jual'];
            // insert to db
            $sql = $conn->prepare("INSERT INTO tabel_barang (kode_barang, nama_barang, kode_suplier, stok, harga_beli, harga_jual) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param('sssddd', $kode_barang, $nama_barang, $kode_suplier, $stok, $harga_beli, $harga_jual);
            $sql->execute();
            if ($sql) {
                //echo json_encode(array('RESPONSE' =&gt; 'FAILED'));
                echo json_encode(array('response' => 'SUCCESS'));
                //header("location:../teadiapi/tampil.php");
        } else {
            echo json_encode(array('response' => 'GAGAL', 'message' => 'Query error!!!'));
        }
    } else {
        echo json_encode(array('response' => 'GAGAL', 'message' => 'Param not found!!'));
    }
?>