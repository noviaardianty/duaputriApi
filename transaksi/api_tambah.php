<?php
    require_once('../config/koneksi_db.php');
    if (isset($_POST['nota']) && isset($_POST['tanggal']) && isset($_POST['kode_barang']) && isset($_POST['qty']) && isset($_POST['harga']) && isset($_POST['tipe'])){
        // input
            $nota = $_POST['nota'];
            $tanggal = $_POST['tanggal'];
            $kode_barang = $_POST['kode_barang'];
            $qty = $_POST['qty'];
            $harga = $_POST['harga'];
            $tipe = $_POST['tipe'];
            // insert to db
            $sql = $conn->prepare("INSERT INTO tabel_transaksi (nota, tanggal, kode_barang, qty, harga, tipe) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param('sssdds', $nota, $tanggal, $kode_barang, $qty, $harga, $tipe);
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