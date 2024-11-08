<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tarefa de Processos</h4>
                <a href="dashboard.php?r=minhaAgenda">Ver Agenda</a>
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="">
                    <div class="col-md-12">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" required name="titulo" id="titulo" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="dataInicio" class="form-label">Data Início</label>
                        <input type="date" required name="dataInicio" id="dataInicio" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="horarioInicio" class="form-label">Horário Início</label>
                        <input type="time" required name="horarioInicio" id="horarioInicio" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="dataFinal" class="form-label">Data Final</label>
                        <input type="date" required name="dataFinal" id="dataFinal" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="horarioFinal" class="form-label">Horário Final</label>
                        <input type="time" required name="horarioFinal" id="horarioFinal" class="form-control">
                    </div>
                    <div class="col-md-11">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" required name="cliente" id="cliente" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <label for="cor" class="form-label">Color picker</label>
                        <input type="color" name="cor" id="cor" class="form-control form-control-color" value="#563d7c" title="Escolha uma cor">
                    </div>
                    <div class="col-md-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
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

    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $dataInicio = $mysqli->real_escape_string($_POST['dataInicio']);
    $horarioInicio = $mysqli->real_escape_string($_POST['horarioInicio']);
    $dataFinal = $mysqli->real_escape_string($_POST['dataFinal']);
    $horarioFinal = $mysqli->real_escape_string($_POST['horarioFinal']);
    $cliente = $mysqli->real_escape_string($_POST['cliente']);
    $descricao = $mysqli->real_escape_string($_POST['descricao']);
    $cor = $mysqli->real_escape_string($_POST['cor']);

    $sql = "INSERT INTO tarefas (titulo, dataInicio, horarioInicio, dataFinal, horarioFinal, cliente, descricao, cor)
            VALUES ('$titulo', '$dataInicio', '$horarioInicio', '$dataFinal', '$horarioFinal', '$cliente', '$descricao', '$cor')";
    
    $query = $mysqli->query($sql);

    if ($query) { ?>
        <script language='javascript'>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Tarefa cadastrada com sucesso!',
                confirmButtonText: 'OK',
                backdrop: true
            }).then(okay => {
                if (okay) {
                    window.location.href = 'dashboard.php?r=cadTarefa';
                }
            });
        </script>
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
        </script>
    <?php }
}
?>
