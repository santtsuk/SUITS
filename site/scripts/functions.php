<?php

$perfil = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : null;
$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'Visitante';

function dadosFunc()
{
    include "config.php";
    $rs = "SELECT * FROM funcionarios";
    $query = $mysqli->query($rs);

    return $query;
}

function dadosProcessos()
{
    include "config.php";

    
    $rs = "SELECT p.id, p.numero_processo, p.data, p.horario, p.vara, 
            c.nome AS cliente_nome, c.cpf AS cliente_cpf,
            IF(p.status = 0, 'Arquivado', 'Ativo') AS status_process
            FROM processos p
            LEFT JOIN clientes c ON p.cliente = c.id";

    
    $query = $mysqli->query($rs);

    
    if (!$query) {
        die("Erro na consulta SQL: " . $mysqli->error);
    }

    return $query;
}


function processosAtivos()
{
    include "config.php";

    $rs = "SELECT * FROM processos WHERE status = '1'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return $total;
}

function tarefasPendentes()
{
    include "config.php";

    $rs = "SELECT * FROM tarefas WHERE status = 0";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return $total;
}

function funcionariosAtivos()
{
    include "config.php";

    $rs = "SELECT * FROM funcionarios WHERE status = 'Ativo'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return $total;
}

function clienteAtivos()
{
    include "config.php";

    $rs = "SELECT * FROM clientes WHERE status = 'Ativo'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return $total;
}

function tarefasPendentesbyID()
{
    include "config.php";
    global $perfil, $id;


    if ($perfil === 'advogado') {
        $rs = "SELECT * FROM tarefas WHERE status = 0 AND id_usuario = $id";
    } else {
        $rs = "SELECT * FROM tarefas WHERE status = 0";
    }

    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return $total;
}

function tarefasConcluidasbyID()
{
    include "config.php";
    global $perfil, $id;


    if ($perfil === 'advogado') {
        $rs = "SELECT * FROM tarefas WHERE status = 1 AND id_usuario = $id";
    } else {
        $rs = "SELECT * FROM tarefas WHERE status = 1";
    }

    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return $total;
}

function calcularEficiencia()
{
    $pendentes = tarefasPendentesbyID();
    $concluidas = tarefasConcluidasbyID();
    $totalTarefas = $pendentes + $concluidas;
    if ($totalTarefas === 0) {
        return 0;
    }
    $eficiencia = ($concluidas / $totalTarefas) * 100;
    return number_format($eficiencia, 2);
}


function tarefasAtrasadas()
{
    include "config.php";
    global $perfil, $id;
    $dataAtual = date('Y-m-d');
    if ($perfil === 'advogado') {
        $rs = "SELECT * FROM tarefas WHERE status = 0 AND dataFinal < '$dataAtual' AND id_usuario = $id";
    } else {
        $rs = "SELECT * FROM tarefas WHERE status = 0 AND dataFinal < '$dataAtual'";
    }
    $query = $mysqli->query($rs);
    $total = $query->num_rows;
    return $total;
}

function buscarProcessos()
{
    include "config.php";
    $sql = "SELECT p.id,p.numero_processo, c.nome AS nome_cliente
        FROM processos p
        LEFT JOIN clientes c ON p.cliente = c.id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

        $processos = [];
        while ($row = $result->fetch_assoc()) {
            $processos[] = $row;
        }
        return $processos;
    } else {
        return [];
    }
}

function buscarFuncionarios()
{
    include "config.php";
    global $perfil, $id;

    if ($perfil === 'advogado') {
        $rs = "SELECT * FROM funcionarios WHERE id = $id";
    } else {
        $rs = "SELECT * FROM funcionarios ";
    }
    $result = $mysqli->query($rs);

    if ($result->num_rows > 0) {

        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios;
    } else {
        return [];
    }
}

function buscarCliente()
{
    include "config.php";
    $sql = "SELECT * FROM clientes";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

        $clientes = [];
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
        return $clientes;
    } else {
        return [];
    }
}


$totalTarefas = tarefasPendentesbyID() + tarefasConcluidasbyID();
$pendentesPercent = $totalTarefas > 0 ? (tarefasPendentesbyID() / $totalTarefas) * 100 : 0;
$concluidasPercent = $totalTarefas > 0 ? (tarefasConcluidasbyID() / $totalTarefas) * 100 : 0;
$atrasadasPercent = $totalTarefas > 0 ? (tarefasAtrasadas() / $totalTarefas) * 100 : 0;
$eficienciaPercent = calcularEficiencia();

