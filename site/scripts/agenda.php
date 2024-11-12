<?php
session_start();
$perfil = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : 'Visitante';
$id_user = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
include('config.php');

if ($perfil === 'advogado') {

    $query = "SELECT t.id, t.titulo AS title, t.cor, CONCAT(t.dataInicio, ' ', t.horarioInicio) AS start, CONCAT(t.dataFinal, ' ', t.horarioFinal) AS end, t.descricao, 
    p.numero_processo, c.nome AS nome_cliente, t.status, f.nome AS nome_usuario
    FROM tarefas t
    LEFT JOIN processos p ON t.processo = p.id
    LEFT JOIN clientes c ON p.cliente = c.id
    LEFT JOIN funcionarios f ON t.id_usuario = f.id
    WHERE f.perfil = 'advogado' AND f.id = ?";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_user);
} else {

    $query = "SELECT t.id, t.titulo AS title, t.cor, CONCAT(t.dataInicio, ' ', t.horarioInicio) AS start, CONCAT(t.dataFinal, ' ', t.horarioFinal) AS end, t.descricao, 
    p.numero_processo, c.nome AS nome_cliente, t.status, f.nome AS nome_usuario
    FROM tarefas t
    LEFT JOIN processos p ON t.processo = p.id
    LEFT JOIN clientes c ON p.cliente = c.id
    LEFT JOIN funcionarios f ON t.id_usuario = f.id";
    $stmt = $mysqli->prepare($query);
}

$stmt->execute();
$results_agenda = $stmt->get_result();

if ($results_agenda) {
    $events = [];
    while ($row = $results_agenda->fetch_assoc()) {

        $start = DateTime::createFromFormat('Y-m-d H:i:s', $row['start']);
        $end = DateTime::createFromFormat('Y-m-d H:i:s', $row['end']);


        $startFormatted = $start->format('Y-m-d H:i:s');
        $endFormatted = $end->format('Y-m-d H:i:s');

        $events[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'color' => $row['cor'],
            'start' => $startFormatted,
            'end' => $endFormatted,
            'descricao' => $row['descricao'],
            'processo' => $row['numero_processo'],
            'cliente' => $row['nome_cliente'],
            'usuario' => $row['nome_usuario'],
            'status' => $row['status'],
        ];
    }
    echo json_encode($events);
} else {
    echo "Erro na consulta: " . $mysqli->error;
}
