<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        
        echo "<script>alert('Cadastro Atualizado com Sucesso!');</script>";
        echo "<script>window.location.href = '../dashboard.php?r=telaFuncionarios';</script>";
    } else {
       
        echo "<script>alert('Houve um erro ao atualizar seu cadastro.');</script>";
    }
}

?>