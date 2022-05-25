<?php
    require_once('../config/koneksi_db.php');

    $myArray = array();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=sha1($_POST['password']);

        if($result = $conn->query("SELECT username FROM user WHERE username='$username' and password = '$password'")){
            while ($row = $result->fetch_assoc()) {
                $myArray[] = $row;
            }
            if (count($myArray)) {
                echo json_encode([
                    'response' => 'success',
                    'data' => $myArray,
                ]);
            } else {
                echo json_encode([
                    'response' => 'error',
                    'message' => 'username or password not found!',
                ]);
            }
        }
    }
    $conn->close();
?>
