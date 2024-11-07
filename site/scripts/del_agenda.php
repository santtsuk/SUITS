<?php
include('config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id']; 

    
    $query = "DELETE FROM agendamentos WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $id); 

    if ($stmt->execute()) {
        echo "Evento excluído com sucesso!";
    } else {
        echo "Erro ao excluir evento!";
    }
}
?>
