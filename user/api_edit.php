<?php
    require_once('../config/koneksi_db.php');
    $data = $_POST;

    $id = $_GET['password'];

    if (@$id != null) {
        $sql = "UPDATE user set ";
        $inputs = [];
        foreach ($_POST as $name => $value) {
            $r = [];
            $r['name'] = $name;
            $r['value'] = $value;
            $inputs[] = $r;
        }

        for ($i=0; $i < count($inputs); $i++) { 
            $sql .= $inputs[$i]['name'] . '=' . "'".$inputs[$i]['value']."'";
            if ($i + 1 != count($inputs)) $sql .= ",";
            else $sql .= " "; 
        }

        $sql .= "WHERE id = '$id'";

        $return = $conn->query($sql);
        if ($return) {
            echo json_encode(array('response' => 'SUCCESS'));
        }else{
            echo json_encode(array('response' => 'FAILED', 'message' => 'Query error!', 'sql' => $sql));
        }
    } else {
        echo json_encode(array('response' => 'FAILED', 'message' => 'Methode Error!'));
    }
?>