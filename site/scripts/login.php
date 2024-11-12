<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suits</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
session_start();
include "config.php";


if (isset($_POST['email']) && isset($_POST['senha'])) {
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id FROM funcionarios WHERE email = '$login'";
    $query = $mysqli->query($sql);
    $total_login = $query->num_rows;

    if ($total_login == 1) {
        $sql2 = "SELECT id, nome, perfil FROM funcionarios WHERE email = '$login' AND senha = '$senha'";
        $query2 = $mysqli->query($sql2);
        $total_senha = $query2->num_rows;

        if ($total_senha == 1) {
            $row = $query2->fetch_assoc();
            $_SESSION['login'] = $login;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['perfil'] = $row['perfil'];
            echo "<script>window.location.href=('../dashboard.php');</script>";
        } else {
            echo "<script>
                swal.fire({
                    icon: 'error',
                    text: 'Dados incorretos. Tente novamente :/',
                    type: 'error'
                }).then((okay) => {
                    if (okay) {
                        window.location.href = '../index.php';
                    }
                });
            </script>";
        }
    } else {
        echo "<script>
            swal.fire({
                icon: 'error',
                text: 'Dados incorretos. Tente novamente :/',
                type: 'error'
            }).then((okay) => {
                if (okay) {
                    window.location.href = '../index.php';
                }
            });
        </script>";
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
