<?php
include "head.php";
include "menu.php";
include "navbar.php";
?>
<div class="content">
    <?php 
    include "card.php"; 
    include "reviews.php"; 
    
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
            case 'Agendamento':
                  include "template/Agendamento.php";
                  break;
            case 'minhaAgenda':
              include "template/minhaAgenda.php";
              break;                  
            default:
                
                break;
        }
    }
    ?>
</div>
<?php  
include "footer.php";
include "js.php"; 
?>