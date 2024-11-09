<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Atualizar Funcionário</title>
</head>

<body>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('config.php');

    $status = isset($_POST['status']) && in_array($_POST['status'], ['Ativo', 'Inativo']) ? $_POST['status'] : 'Ativo';

    $id = $_POST['id'];
    $nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
    $cpf = mysqli_real_escape_string($mysqli, $_POST['cpf']);
    $perfil = mysqli_real_escape_string($mysqli, $_POST['perfil']);
    $numeroOAB = mysqli_real_escape_string($mysqli, $_POST['numeroOAB']);
    $especializacao = mysqli_real_escape_string($mysqli, $_POST['especializacao']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
    $cep = mysqli_real_escape_string($mysqli, $_POST['cep']);
    $numero = mysqli_real_escape_string($mysqli, $_POST['numero']);
    $rua = mysqli_real_escape_string($mysqli, $_POST['rua']);
    $bairro = mysqli_real_escape_string($mysqli, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);
    $estado = mysqli_real_escape_string($mysqli, $_POST['estado']);

    $sql = "UPDATE funcionarios SET 
        nome = '$nome',
        cpf = '$cpf',
        perfil = '$perfil',
        numero_oab = '$numeroOAB',
        especializacao = '$especializacao',
        email = '$email',
        telefone = '$telefone',
        cep = '$cep',
        numero = '$numero',
        rua = '$rua',
        bairro = '$bairro',
        cidade = '$cidade',
        estado = '$estado',
        status = '$status'
        WHERE id = $id";

    $query = $mysqli->query($sql);

    if ($query) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                text: 'Funcionário atualizado com sucesso!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../dashboard.php?r=telaFuncionarios';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                text: 'Erro ao atualizar o funcionário!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../dashboard.php?r=telaFuncionarios';
                }
            });
        </script>";
    }
}
?>
