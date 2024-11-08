<?php
session_start();
$perfil = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : 'Visitante';
$id_user = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; 
include('config.php');

if ($perfil === 'advogado' && $id_user !== null) {
    
    $query = "SELECT ag.id, ag.titulo AS title, ag.cor AS color, CONCAT(ag.dataInicio, ' ', ag.horarioInicio) AS start, 
              CONCAT(ag.dataFinal, ' ', ag.horarioFinal) AS end, ag.descricao,ag.cliente,ag.status, ag.id_usuario, f.nome AS nome_usuario
              FROM tarefas ag
              LEFT JOIN funcionarios f ON ag.id_usuario = f.id  
              WHERE f.perfil = 'advogado' AND f.id = ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_user); 
} else {
    
    $query = "SELECT ag.id, ag.titulo AS title, ag.cor AS color, CONCAT(ag.dataInicio, ' ', ag.horarioInicio) AS start, 
              CONCAT(ag.dataFinal, ' ', ag.horarioFinal) AS end, ag.descricao,ag.cliente ,ag.status, ag.id_usuario, f.nome AS nome_usuario
              FROM tarefas ag
              LEFT JOIN funcionarios f ON ag.id_usuario = f.id";
    
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
            'color' => $row['color'],
            'start' => $startFormatted,  
            'end' => $endFormatted,   
            'descricao' => $row['descricao'],
            'cliente'=> $row['cliente'],
            'id_usuario' => $row['nome_usuario'],
            'status' => $row['status'],
        ];
    }
    echo json_encode($events);
} else {
    echo "Erro na consulta: " . $mysqli->error;
}
?>
