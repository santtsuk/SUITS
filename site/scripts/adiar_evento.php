<?php
include "config.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $novaDataInicio = $_POST['nova_dataInicio'];
    $novaHoraInicio = $_POST['nova_horaInicio'];
    $novaDataFinal = $_POST['nova_dataFim'];
    $novaHoraFinal = $_POST['nova_horaFim'];

    
    $stmt = $mysqli->prepare("UPDATE tarefas SET dataInicio = ?, horarioInicio = ?, dataFinal = ?, horarioFinal = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $novaDataInicio, $novaHoraInicio, $novaDataFinal, $novaHoraFinal, $id);

    if ($stmt->execute()) {
        echo "Evento adiado com sucesso!";
    } else {
        echo "Erro ao adiar o evento.";
    }

    $stmt->close();
    $mysqli->close();
}
?>
