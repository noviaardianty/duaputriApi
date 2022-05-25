<?php
    require_once('../config/koneksi_db.php');
    $id = $_GET['kode_barang'];

    if (@$id != null){
            $sql = $conn->prepare("DELETE FROM tabel_barang WHERE kode_barang=?");
            $sql->bind_param('s', $id);
            $sql->execute();
            if ($sql) {
                echo json_encode(array('response' => 'SUCCESS'));
            }else {
                echo json_encode(array('response' => 'FAILED', 'message' => 'Query error!!'));
            }
    } else {
        echo json_encode(array('response' => 'FAILED', 'message' => 'Params error!!'));
    }
?>