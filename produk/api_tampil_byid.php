<?php
    require_once('../config/koneksi_db.php');

    $myArray = array();
    if(isset($_GET['kode_barang'])){
        $id=$_GET['kode_barang'];

        if($result = $conn->query("SELECT * FROM tabel_barang WHERE kode_barang='$id'")){
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
            echo json_encode($myArray);
        }
    }
    $conn->close();
?>
