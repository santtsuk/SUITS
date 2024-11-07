<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title></title>
</head>
<body>
    
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('config.php');


    $id = $_POST['id'];
    $perfil = $_POST['perfil'];
    $numeroOAB = $_POST['numeroOAB'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];


    $sql = $sql = "UPDATE funcionarios SET 
        perfil = '$perfil', 
        numero_oab = '$numeroOAB', 
        email = '$email', 
        telefone = '$telefone', 
        cep = '$cep', 
        numero = '$numero' 
    WHERE id = $id";


    $query = $mysqli->query($sql);

    if ($query) {
        
        echo "<script>
        swal.fire({
            icon: 'sucess',
            text: 'Funcionario atualizado com sucesso!',
            type: 'sucess'
        }).then((okay) => {
            if (okay) {
                window.location.href = '../dashboard.php?r=telaFuncionarios';
            }
        });
    </script>"; 
    } else {
        echo "<script>
            swal.fire({
                icon: 'error',
                text: 'Erro ao atualizar o funcionario!',
                type: 'error'
            }).then((okay) => {
                if (okay) {
                    window.location.href = '../dashboard.php?r=telaFuncionarios';
                }
            });
        </script>";
    }
}

?>