<?php
    require_once('../config/koneksi_db.php');

    $myArray = array();
    if(isset($_GET['id'])){
        $id=$_GET['id'];

        if($result = $conn->query("SELECT * FROM user WHERE id='$id'")){
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
            echo json_encode($myArray);
        }
    }
    $conn->close();
?>
