<?php
    require_once('../config/koneksi_db.php');

    $myArray = array();
    if(isset($_GET['tanggal'])){
        $id=$_GET['tanggal'];

        if($result = $conn->query("SELECT * FROM user WHERE tanggal='$id'")){
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
            echo json_encode($myArray);
        }
    }
    $conn->close();
?>
