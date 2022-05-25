<?php
    require_once('../config/koneksi_db.php');

    $myArray = array();
    if(isset($_GET['nota'])){
        $id=$_GET['nota'];

        if($result = $conn->query("SELECT * FROM tabel_transaksi WHERE nota='$id'")){
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
            echo json_encode($myArray);
        }
    }
    $conn->close();
?>
