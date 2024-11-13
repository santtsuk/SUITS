<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Cadastro de Processos</h4>
            </div>
            <div class="card-body">
                <form id="formProcesso" class="row g-3" method="post" action="javascript:void(0);">
                    <label for="cliente" class="form-label">Cliente</label>
                    <select required name="cliente" class="form-control" id="cliente">
                        <option value="">Selecione um cliente</option>
                        <?php
                        $clientes = buscarCliente();
                        foreach ($clientes as $cliente) {
                            echo "<option value='" . $cliente['id'] . "'>" . $cliente['nome'] . " - " . $cliente['cpf'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="col-md-6">
                        <label for="dataInicio" class="form-label">Data</label>
                        <input type="date" required name="data" id="data" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="horarioInicio" class="form-label">Horário</label>
                        <input type="time" required name="horario" id="horario" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="numero_processo" class="form-label">Número do Processo</label>
                        <input type="text" id="numero_processo" required name="numero_processo" class="form-control" placeholder="00000000000000-00.000.00" maxlength="22">
                    </div>
                    <div class="col-md-6">
                        <label for="vara" class="form-label">Vara</label>
                        <input type="text" id="vara" required name="vara" class="form-control" placeholder="0000000-00.0000.0.00.0000" maxlength="24">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#formProcesso").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "../site/scripts/salvarProcesso.php",
            type: "POST",
            data: formData,
            success: function(response) {
                if (response == "success") {
                    Swal.fire({
                        icon: "success",
                        text: "Dados Salvos com Sucesso!"
                    }).then(() => {
                        window.location.href = "../site/dashboard.php?r=cadProcesso";
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        text: "Erro ao salvar o processo!"
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: "error",
                    text: "Ocorreu um erro inesperado!"
                });
            }
        });
    });
</script>