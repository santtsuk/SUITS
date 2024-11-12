<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Atualizar Processo</title>
</head>

<body>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('config.php'); 

    
    $id = $_POST['id'];
    $numero_processo = mysqli_real_escape_string($mysqli, $_POST['numero_processo']);
    $data = mysqli_real_escape_string($mysqli, $_POST['data']);
    $horario = mysqli_real_escape_string($mysqli, $_POST['horario']);
    $vara = mysqli_real_escape_string($mysqli, $_POST['vara']);
    
    $sql = "UPDATE processos SET 
            numero_processo = '$numero_processo', 
            data = '$data', 
            horario = '$horario', 
            vara = '$vara'
            WHERE id = $id";

    
    $query = $mysqli->query($sql);

    
    if ($query) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Processo atualizado com sucesso!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../dashboard.php?r=telaProcessos'; // Redireciona após sucesso
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Erro ao atualizar o processo!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../dashboard.php?r=telaProcessos'; // Redireciona em caso de erro
                }
            });
        </script>";
    }
}
?>
