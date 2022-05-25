<?php
    require_once('../config/koneksi_db.php');
    if (isset($_POST['username']) && isset($_POST['password'])){
        // input
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            // insert to db
            $sql = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
            $sql->bind_param('ss', $username, $password);
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