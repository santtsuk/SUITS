<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cadastro de Processos</h4>
                <a href="dashboard.php?r=minhaAgenda">Ver Agenda</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="">
                    <div class="col-md-12">
                        <label for="nomeProcesso" class="form-label">Número do Processo</label>
                        <input type="text" required name="numero_processo" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="data" class="form-label">Data</label>
                        <input type="date" required name="data" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="horario" class="form-label">Horário</label>
                        <input type="time" required name="horario" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="vara" class="form-label">Vara</label>
                        <input type="text" required name="vara" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" required name="cliente" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Salvar Processo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (!empty($_POST)) {
    include "../site/scripts/config.php";

    $numero_processo = $mysqli->real_escape_string($_POST['numero_processo']);
    $data = $mysqli->real_escape_string($_POST['data']);
    $horario = $mysqli->real_escape_string($_POST['horario']);
    $vara = $mysqli->real_escape_string($_POST['vara']);
    $cliente = $mysqli->real_escape_string($_POST['cliente']);

    $sql = "INSERT INTO processos (numero_processo, data, horario, vara, cliente)
            VALUES ('$numero_processo', '$data', '$horario', '$vara', '$cliente')";
    $query = $mysqli->query($sql);

    if ($query) { ?>
        <script language='javascript'>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Processo cadastrado com sucesso!',
                confirmButtonText: 'OK',
                backdrop: true
            }).then(okay => {
                if (okay) {
                    window.location.href = 'dashboard.php?r=cadProcesso';
                }
            });
        </script>";
    <?php } else { ?>
        <script language='javascript'>
            Swal.fire({
                position: 'center',
                title: 'Erro!',
                text: 'Houve um erro ao cadastrar o processo.',
                icon: 'error',
                confirmButtonText: 'OK',
                backdrop: true
            });
        </script>";
<?php }
}
?>
