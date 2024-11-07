<?php
session_start();
$perfil = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : 'Visitante';
$id_user = isset($_SESSION['user_id']); 
include('config.php');


if ($perfil === 'advogado') {
    $query = "SELECT ag.id, ag.title, ag.color, ag.start, ag.end, ag.descricao, ag.id_usuario, f.nome AS nome_usuario
          FROM agendamentos ag
          LEFT JOIN funcionarios f ON ag.id_usuario = f.id  WHERE f.perfil = 'advogado' AND f.id = $id_user";
    $results_agenda = $mysqli->query($query);
} else {
    $query = "SELECT ag.id, ag.title, ag.color, ag.start, ag.end, ag.descricao, ag.id_usuario, f.nome AS nome_usuario
    FROM agendamentos ag
    LEFT JOIN funcionarios f ON ag.id_usuario = f.id";
    $results_agenda = $mysqli->query($query);
}


if ($results_agenda) {
    $events = [];
    while ($row = $results_agenda->fetch_assoc()) {
        extract($row);
        $events[] = [
            'id' => $id,
            'title' => $title,
            'color' => $color,
            'start' => $start,
            'end' => $end,
            'descricao' => $descricao,
            'id_usuario' => $nome_usuario,

        ];
    }
} else {
    echo "Erro na consulta: " . $mysqli->error;
}

echo json_encode($events);
