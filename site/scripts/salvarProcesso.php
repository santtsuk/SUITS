<?php
if (!empty($_POST)) {
    include "config.php";

    $cliente = $_POST['cliente'];
    $horario = $_POST['horario'];
    $numero_processo = $_POST['numero_processo'];
    $vara = $_POST['vara'];
    $data = $_POST['data'];


    $sql = "INSERT INTO processos (cliente, horario, numero_processo, vara, data)
    VALUES ('$cliente','$horario','$numero_processo','$vara','$data')";
    $query = $mysqli->query($sql);

    if ($query) {
        echo "success";
    } else {
        echo "error";
    }
}
?>