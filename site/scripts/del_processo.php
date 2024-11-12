<html>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
        include "config.php";
        $id = $_GET['id'];
        
            $sql = "UPDATE processos SET status = 0 WHERE id = $id";
            $sql = $mysqli->query($sql);
            if ($sql) { ?>
                <script language='javascript'>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Processo Arquivado com Sucesso!',
                        confirmButtonText: 'OK',
                        backdrop: true
                    }).then(okay => {
                        if (okay) {
                            window.location.href = '../dashboard.php?r=telaProcessos';
                        }
                    });
                </script>
            <?php } else { ?>
                <script language='javascript'>
                    Swal.fire({
                        position: 'center',
                        title: 'Error!',
                        text: 'Houve um erro ao arquivar.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        backdrop: true
                    });
                </script>
    <?php }
    ?>
    </body>
</html>