
<?php

function dadosFunc(){
    include "config.php";
    $rs = "SELECT * FROM funcionarios ";
    $query = $mysqli->query($rs);

    return ($query);

}

function processosAtivos(){
    include "config.php";

    $rs = "SELECT * FROM processos WHERE status = 'Ativo'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return ($total);

}

function tarefasAtivos(){
    include "config.php";

    $rs = "SELECT * FROM tarefas WHERE status = 'Ativo'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return ($total);

}

function funcionariosAtivos(){
    include "config.php";

    $rs = "SELECT * FROM funcionarios WHERE status = 'Ativo'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return ($total);

}

function clienteAtivos(){
    include "config.php";

    $rs = "SELECT * FROM clientes WHERE status = 'Ativo'";
    $query = $mysqli->query($rs);
    $total = $query->num_rows;

    return ($total);

}




?>