<?php
    require_once('../config/koneksi_db.php');
    $myArray = array();
    if ($result = $conn->query('SELECT * FROM laporan_transaksi ORDER BY tanggal ASC')){
        while($row = $result->fetch_assoc()){
            $myArray[] = $row;
        }
        echo json_encode($myArray);
    }
    $conn->close();
?>