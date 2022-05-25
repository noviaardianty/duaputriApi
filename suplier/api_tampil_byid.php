<?php
    require_once('../config/koneksi_db.php');

    $myArray = array();
    if(isset($_GET['kode_suplier'])){
        $id=$_GET['kode_suplier'];

        if($result = $conn->query("SELECT * FROM tabel_suplier WHERE kode_suplier='$id'")){
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
            echo json_encode($myArray);
        }
    }
    $conn->close();
?>
