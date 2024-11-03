<html>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

    include "config.php";

    $cliente = $_POST['cliente'];
    $horario = $_POST['horario'];
    $numeroProcesso = $_POST['numeroProcesso'];
    $vara = $_POST['vara'];
    $data = $_POST['data'];

    $sql = "INSERT INTO cadprof VALUES (NULL,CURRENT_TIMESTAMP(),'$cliente','$horario','$numeroProcesso','$vara','$data')";
    $query = $mysqli->query($sql);

    if ($query) { ?>
    <script language="JavaScript">
        swal.fire({
            icon:"success",
            text:"Dados Salvos com Sucesso"
        }).then(okay=>{
            if(okay){
                window.location.href="../pages/dashboard.php?r=cadprocesso";
            }
        })
    </script>
    <?php } else { ?>

    <script language="JavaScript">
        swal.fire({
            icon:"warning",
            text:"Erro!"
        }).then(okay=>{
            if(okay){
                window.location.href="../pages/dashboard.php?r=cadprocesso";
            }
        })
    </script>

    <?php }

?>

    </body>
</html>