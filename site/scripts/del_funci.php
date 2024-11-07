<html>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
        include "config.php";

        $id = $_GET['id'];
        
            $sql = "DELETE FROM funcionarios WHERE id = $id"; 
            $sql = $mysqli->query($sql);


            if ($sql) { ?>
                <script language='javascript'>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Deletado com Sucesso!',
                        confirmButtonText: 'OK',
                        backdrop: true
                    }).then(okay => {
                        if (okay) {
                            window.location.href = '../dashboard.php?r=telaFuncionarios';
                        }
                    });
                </script>
            <?php } else { ?>
                <script language='javascript'>
                    Swal.fire({
                        position: 'center',
                        title: 'Error!',
                        text: 'Houve um erro ao deletar.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        backdrop: true
                    });
                </script>
    <?php }
    ?>
    </body>
</html>