<?php
    require_once('../config/koneksi_db.php');
    if (isset($_POST['kode_suplier']) && isset($_POST['nama_suplier']) && isset($_POST['no_tlp']) && isset($_POST['alamat'])){
        // input
            $kode_suplier = $_POST['kode_suplier'];
            $nama_suplier = $_POST['nama_suplier'];
            $no_tlp = $_POST['no_tlp'];
            $alamat = $_POST['alamat'];
            // insert to db
            $sql = $conn->prepare("INSERT INTO tabel_suplier (kode_suplier, nama_suplier, no_tlp, alamat) VALUES (?, ?, ?, ?)");
            $sql->bind_param('ssds', $kode_suplier, $nama_suplier, $no_tlp, $alamat);
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