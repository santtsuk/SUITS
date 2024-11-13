<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Atualizar Cliente</title>
</head>
<body>
</body>
</html>

<?php
include('config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $data_Update = date('Y-m-d', strtotime($data_nascimento));
    $estado_civil = $_POST['estado_civil'];
    $profissao = $_POST['profissao'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $query = "UPDATE clientes 
              SET nome = ?, cpf = ?, email = ?, telefone = ?, data_nascimento = ?, estado_civil = ?, profissao = ?, cep = ?, rua = ?, bairro = ?, cidade = ?, estado = ? 
              WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param(
        "ssssssssssssi",
        $nome,
        $cpf,
        $email,
        $telefone,
        $data_Update,
        $estado_civil,
        $profissao,
        $cep,
        $rua,
        $bairro,
        $cidade,
        $estado,
        $id
    );

    if ($stmt->execute()) {
        echo "<script>
                        Swal.fire({
                            icon: 'success',
                            text: 'Cliente atualizado com sucesso!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../dashboard.php?r=telaCliente'; 
                            }
                        });
                    </script>";
    } else {
        echo "<script>
                        Swal.fire({
                            icon: 'error',
                            text: 'Erro ao atualizar o cliente!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '../dashboard.php?r=telaCliente'; 
                            }
                        });
                    </script>";
    }
}

?>