<?php
session_start();
include "head.php";
include "menu.php";
include "navbar.php";
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante';
?>
<div class="row"><?php
echo "<h1> Bem-vindo, $nome!</h1>";
?>
</div>
<div class="content">
    <?php
    include "card.php";
    include "reviews.php";
    ?>
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <?php
                    if (isset($_GET['r'])) {
                        switch ($_GET['r']) {
                            case 'cadCliente':
                                include "template/cadCliente.php";
                                break;
                            case 'cadFuncionario':
                                include "template/cadFuncionario.php";
                                break;
                            case 'cadProcesso':
                                include "template/cadProcesso.php";
                                break;
                            case 'cadTarefa':
                                include "template/cadTarefa.php";
                                break;
                            case 'minhaAgenda':
                                include "template/minhaAgenda.php";
                                break;
                            case 'telaFuncionarios':
                                include "template/telaFuncionarios.php";
                                break;
                            default:
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
include "js.php";
?>
