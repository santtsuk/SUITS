<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar os valores recebidos
    var_dump($_POST);  // Isso vai mostrar os valores recebidos no POST
    die();

    $eventoId = $_POST['evento_id'];
    $status = (bool)$_POST['status'];  // Garantir que seja booleano
    var_dump($status);  // Verificar o valor de $status

    // Verificar se a conexão com o banco de dados foi bem-sucedida
    if ($mysqli->connect_error) {
        die("Conexão falhou: " . $mysqli->connect_error);
    }

    // Preparar a consulta
    $sql = "UPDATE tarefas SET status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $mysqli->error);
    }

    // Vincular os parâmetros
    $stmt->bind_param("ii", $status, $eventoId);  // 1 - Concluído, 0 - Não Concluído

    // Executar a consulta
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Status atualizado com sucesso!";
        } else {
            echo "Nenhuma linha foi afetada. Verifique se o evento ID está correto.";
        }
    } else {
        echo "Erro na execução do SQL: " . $stmt->error;
        echo "Erro do MySQL: " . $mysqli->error;
    }
    

    // Fechar a declaração e a conexão
    $stmt->close();
    $mysqli->close();
}
?>
