<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    var_dump($_POST);  

    $evento_id = (int)$_POST['evento_id'];  
    $status = (int)$_POST['status'];        

    $sql = "UPDATE tarefas SET status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $mysqli->error);
    }

    $stmt->bind_param("ii", $status, $evento_id); 

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

    $stmt->close();
    $mysqli->close();
}
?>
